<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\vw_feedProf;
use App\Models\User;
use App\Models\Publication;
use App\Models\vw_ratings;

class MeuPerfilController extends Controller
{
    public function index()
    {
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
        ]);
    }

    public function destroy($publicationId)
    {
        // Pega o profissional autenticado
        $userId = Auth::id();
        $profissional = vw_feedProf::where('userId', $userId)->first();
    
        // Verifica se a publicação existe e está associada ao profissional autenticado
        $publicacao = Publication::where('publicationId', $publicationId)
            ->where('professionalId', $profissional->professionalId)
            ->first();
    
        // Se a publicação existir, exclui
        if ($publicacao) {
            $publicacao->delete();
            return redirect()->back()->with('success', 'Publicação excluída com sucesso!');
        }
    
        // Caso contrário, retorna erro
        return redirect()->back()->with('error', 'Publicação não encontrada ou não autorizada.');
    }
}
