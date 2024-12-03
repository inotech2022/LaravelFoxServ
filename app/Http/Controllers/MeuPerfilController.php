<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Models\vw_feedProf;
use App\Models\vw_ratings;
use App\Models\User;
use App\Models\Publication;
use App\Models\Professional;
use App\Models\Adress;
use App\Models\Complaint;
use App\Models\Contract;
use App\Models\Service_Professional;
use App\Models\Rating;

class MeuPerfilController extends NotificacaoController
{
    public function index()
    {
        $notificacoes = $this->getNotifications();

        $userId = Auth::id(); 

        $profissional = vw_feedProf::where('userId', $userId)->first();
        

        if (!$profissional) {
            return redirect()->back()->with('error', 'Profissional não encontrado.');
        }

        $media = $profissional->average ?? 0;
        $mediaRedonda = round($media);

        $publicacoes = Publication::where('professionalId', $profissional->professionalId)->get();
        $avaliacoes = vw_ratings::where('professionalId', $profissional->professionalId)->get();
        $servicos = vw_feedProf::getServicosPorProfissional($profissional->professionalId);
        $tipoServicos = vw_feedProf::getCategoriaPorProfissional($profissional->professionalId);

        return view('meuPerfil', [
            'profissional' => $profissional,
            'publicacoes' => $publicacoes,
            'avaliacoes' => $avaliacoes,
            'media' => $media,
            'mediaRedonda' => $mediaRedonda,
            'servicos' => $servicos,
            'tipoServicos' => $tipoServicos,
        ] + $notificacoes);
    }

    public function destroy($publicationId)
    {
        
        $userId = Auth::id();
        $profissional = vw_feedProf::where('userId', $userId)->first();
    
        
        $publicacao = Publication::where('publicationId', $publicationId)
            ->where('professionalId', $profissional->professionalId)
            ->first();
    
        
        if ($publicacao) {
            $publicacao->delete();
            return redirect()->back()->with('success', 'Publicação excluída com sucesso!');
        }
    
        
        return redirect()->back()->with('error', 'Publicação não encontrada ou não autorizada.');
    }

    public function destroyAccount()
    {
        $userId = Auth::id();
        $profissional = vw_feedProf::where('userId', $userId)->first();

        if (!$profissional) {
            return redirect()->back()->with('error', 'Profissional não encontrado.');
        }

        try {
            \DB::transaction(function () use ($profissional, $userId) {
                
                \DB::table('complaints')->where('professionalId', $profissional->professionalId)->delete();
                \DB::table('publications')->where('professionalId', $profissional->professionalId)->delete();
                \DB::table('ratings')->where('professionalId', $profissional->professionalId)->delete();
                
                
                \DB::table('contracts')->where('professionalId', $profissional->professionalId)->delete();
                
                \DB::table('contracts')->where('userId', $userId)->delete();

                \DB::table('service_professionals')->where('professionalId', $profissional->professionalId)->delete();
                \DB::table('professionals')->where('professionalId', $profissional->professionalId)->delete();
                \DB::table('addresses')->where('userId', $userId)->delete();
                \DB::table('users')->where('userId', $userId)->delete();
            });

            Auth::logout(); 
            return redirect('/')->with('success', 'Conta excluída com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Erro ao excluir a conta.');
        }
    }

}
