<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Complaint; 
use App\Models\User; 
use App\Models\vw_ratings; 
use App\Models\vw_feedProf; 
use App\Models\Publication; 
use App\Models\Rating;
use App\Models\Contract;
use App\Models\Address; 

class DenunciaAdmController extends Controller
{
    public function index($id)
    {
        $professional = vw_feedProf::where('professionalId', $id)->first();

        $ratings = vw_ratings::where('professionalId', $id)->get();

        $complaints = Complaint::where('professionalId', $id)
        ->get()
        ->map(function ($complaint) {
            $user = User::find($complaint->userId);
            $complaint->name = $user ? $user->name : 'Usuário não encontrado';
            $complaint->lastName = $user ? $user->lastName : '';
            return $complaint;
        });

        return view('denunciaAdm', compact('professional', 'ratings', 'complaints'));
    }

    public function destroyAccount($id)
    {
        \Log::info("Iniciando exclusão do profissional com ID: $id");

        $profissional = vw_feedProf::where('professionalId', $id)->first();

        if (!$profissional) {
            \Log::error("Profissional não encontrado com ID: $id");
            return redirect()->back()->with('error', 'Profissional não encontrado.');
        }

        try {
            \DB::transaction(function () use ($profissional) {
                // Excluir avaliações relacionadas aos contratos
                \Log::info("Excluindo avaliações relacionadas a contratos...");
                \DB::table('ratings')
                    ->whereIn('protocol', function ($query) use ($profissional) {
                        $query->select('protocol')
                            ->from('contracts')
                            ->where('professionalId', $profissional->professionalId)
                            ->orWhere('userId', $profissional->userId);
                    })
                    ->delete();

                // Excluir denúncias
                \Log::info("Excluindo denúncias...");
                \DB::table('complaints')->where('professionalId', $profissional->professionalId)->delete();

                // Excluir publicações e associações na tabela user_publication
                \Log::info("Excluindo publicações e suas associações...");
                \DB::table('user_publication')->whereIn('publicationId', function ($query) use ($profissional) {
                    $query->select('publicationId')
                        ->from('publications')
                        ->where('professionalId', $profissional->professionalId);
                })->delete();

                \DB::table('publications')->where('professionalId', $profissional->professionalId)->delete();

                // Excluir contratos
                \Log::info("Excluindo contratos...");
                \DB::table('contracts')->where('professionalId', $profissional->professionalId)->delete();
                \DB::table('contracts')->where('userId', $profissional->userId)->delete();

                // Excluir serviços
                \Log::info("Excluindo serviços...");
                \DB::table('service_professionals')->where('professionalId', $profissional->professionalId)->delete();

                // Excluir dados do profissional
                \Log::info("Excluindo dados do profissional...");
                \DB::table('professionals')->where('professionalId', $profissional->professionalId)->delete();
                \DB::table('addresses')->where('userId', $profissional->userId)->delete();

                // Excluir usuário
                \Log::info("Excluindo usuário...");
                \DB::table('users')->where('userId', $profissional->userId)->delete();
            });

            \Log::info("Exclusão concluída com sucesso.");
            return redirect()->route('centralAdministrador', ['id' => $profissional->professionalId])
                ->with('success', 'Conta excluída com sucesso!');
        } catch (\Exception $e) {
            \Log::error("Erro durante exclusão: " . $e->getMessage());
            return redirect()->back()->with('error', 'Erro ao excluir a conta.');
        }
    }

   
}
