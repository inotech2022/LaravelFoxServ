<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\vw_feedProf;
use App\Models\User;
use App\Models\Publication;
use App\Models\Rating;
use App\Models\vw_ratings;
use App\Models\Complaint;

class PerfilProfissionalController extends Controller
{
    public function index($professionalId)
{
    $profissional = vw_feedProf::where('professionalId', $professionalId)->first(); 
    if (!$profissional) {
        return redirect()->back()->with('error', 'Profissional não encontrado.');
    }

   
    $media = $profissional->average ?? 0; 
    $mediaRedonda = round($media);
    
    $publicacoes = Publication::where('professionalId', $profissional->professionalId)->get();
        $avaliacoes = vw_ratings::where('professionalId', $profissional->professionalId)->get();
        $servicos = vw_feedProf::getServicosPorProfissional($profissional->professionalId);
        $tipoServicos = vw_feedProf::getCategoriaPorProfissional($profissional->professionalId);
        
        $publicationIds = $publicacoes->pluck('publicationId')->toArray();

        $isFavorite = Auth::user()
            ->user_publication() // supondo que esta é a relação de favoritos
            ->whereIn('user_publication.publicationId', $publicationIds) // especificando a tabela 'user_publication'
            ->pluck('user_publication.publicationId') // especificando a tabela na coluna do pluck
            ->toArray();

        return view('perfilProfissional', [
            'profissional' => $profissional,
            'publicacoes' => $publicacoes,
            'avaliacoes' => $avaliacoes,
            'media' => $media,
            'mediaRedonda' => $mediaRedonda,
            'servicos' => $servicos,
            'tipoServicos' => $tipoServicos,
            'isFavorite'=>$isFavorite,
        ]);
}
public function addFavorite(Request $request)
{
    $user = Auth::user(); // Pegando o usuário autenticado

    if (!$user) {
        return response()->json([
            'success' => false,
            'message' => 'Usuário não autenticado. Por favor, faça login para favoritar publicações.'
        ], 401);
    }

    $publicationId = $request->input('publicationId'); // ID da publicação a ser favoritada

    // Verificar se a publicação existe
    $publication = Publication::find($publicationId);

    if (!$publication) {
        return response()->json([
            'success' => false,
            'message' => 'Publicação não encontrada.'
        ], 404);
    }

    // Verificar se já está favoritado
    $isFavorite = $user->user_publication()->where('publicationId', $publicationId)->exists();

    if ($isFavorite) {
        // Se já for favorito, remover
        $user->user_publication()->detach($publicationId); // Remove o favorito
        $message = 'Publicação removida dos favoritos.';
    } else {
        // Se não for favorito, adicionar
        $user->user_publication()->attach($publicationId); // Adiciona o favorito
        $message = 'Publicação adicionada aos favoritos.';
    }

    return response()->json([
        'success' => true,
        'message' => $message
    ]);
}


public function store(Request $request)
    {
        // Validar os dados
        $request->validate([
            'motivo' => 'required_without:outroMotivo',
            'outroMotivo' => 'required_if:motivo,outro',
            'professionalId' => 'required|exists:vw_feedProf,professionalId',
            'userId' => 'required|exists:users,userId',
        ]);

        // Definir o motivo
        $reason = $request->motivo === 'outro' ? $request->outroMotivo : $request->motivo;

        // Criar a denúncia
        Complaint::create([
            'reason' => $reason,
            'complaintDate' => now(),
            'userId' => $request->userId,
            'professionalId' => $request->professionalId,
        ]);
        
        return redirect()->back()->with('success', 'Denúncia enviada com sucesso.');
    }

}

