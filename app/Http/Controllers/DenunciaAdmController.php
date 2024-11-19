<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Complaint; 
use App\Models\User; 
use App\Models\vw_ratings; 
use App\Models\vw_feedProf; 


class DenunciaAdmController extends Controller
{
    public function index($id)
    {
        // Buscar dados do profissional na view vw_feedProf
        $professional = vw_feedProf::where('professionalId', $id)->first();

        // Buscar avaliações do profissional na view vw_rating
        $ratings = vw_ratings::where('professionalId', $id)->get();

        $complaints = Complaint::where('professionalId', $id)
        ->get()
        ->map(function ($complaint) {
            // Buscar o usuário associado à denúncia
            $user = User::find($complaint->userId);
            $complaint->name = $user ? $user->name : 'Usuário não encontrado';
            $complaint->lastName = $user ? $user->lastName : '';
            return $complaint;
        });

        return view('denunciaAdm', compact('professional', 'ratings', 'complaints'));
    }

    public function destroyAccount($id)
    {
        // Buscar o profissional pela ID
        $profissional = vw_feedProf::where('professionalId', $id)->first();

        if (!$profissional) {
            return redirect()->back()->with('error', 'Profissional não encontrado.');
        }

        try {
            \DB::transaction(function () use ($profissional) {
                // Excluir registros em ordem correta com verificações para contratos
                \DB::table('complaints')->where('professionalId', $profissional->professionalId)->delete();
                \DB::table('publications')->where('professionalId', $profissional->professionalId)->delete();
                \DB::table('ratings')->where('professionalId', $profissional->professionalId)->delete();

                // Excluir contratos como profissional
                \DB::table('contracts')->where('professionalId', $profissional->professionalId)->delete();
                // Excluir contratos como cliente
                \DB::table('contracts')->where('userId', $profissional->userId)->delete();

                \DB::table('service_professionals')->where('professionalId', $profissional->professionalId)->delete();
                \DB::table('professionals')->where('professionalId', $profissional->professionalId)->delete();
                \DB::table('addresses')->where('userId', $profissional->userId)->delete();
                \DB::table('users')->where('userId', $profissional->userId)->delete();
            });

            // Redirecionar para a página inicial com sucesso
            return redirect()->route('denunciaAdm.index', ['id' => $profissional->professionalId])->with('success', 'Conta excluída com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao excluir a conta.');
        }
    }
   
}
