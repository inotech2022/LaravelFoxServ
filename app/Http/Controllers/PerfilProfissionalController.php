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
    $userId = Auth::id();
   
    $media = $profissional->average ?? 0; 
    $mediaRedonda = round($media);
    
    $publicacoes = Publication::where('professionalId', $profissional->professionalId)
    ->get()
    ->map(function ($publicacao) use ($userId) {
        $publicacao->curtidas = \DB::table('user_publication')
            ->where('publicationId', $publicacao->publicationId)
            ->count();

        $publicacao->curtida = \DB::table('user_publication')
            ->where('userId', $userId)
            ->where('publicationId', $publicacao->publicationId)
            ->exists();

        return $publicacao;
    });
        $avaliacoes = vw_ratings::where('professionalId', $profissional->professionalId)->get();
        $servicos = vw_feedProf::getServicosPorProfissional($profissional->professionalId);
        $tipoServicos = vw_feedProf::getCategoriaPorProfissional($profissional->professionalId);

        return view('perfilProfissional', [
            'profissional' => $profissional,
            'publicacoes' => $publicacoes,
            'avaliacoes' => $avaliacoes,
            'media' => $media,
            'mediaRedonda' => $mediaRedonda,
            'servicos' => $servicos,
            'tipoServicos' => $tipoServicos,
        ]);
}
public function toggleLike(Request $request)
{
    // Valida se os dados necessários foram enviados
    $request->validate([
        'publicationId' => 'required|exists:publications,publicationId',
    ]);

    $userId = Auth::id(); // Obtém o ID do usuário logado
    $publicationId = $request->input('publicationId');

    // Verifica se o usuário já curtiu a publicação
    $curtida = \DB::table('user_publication')
        ->where('userId', $userId)
        ->where('publicationId', $publicationId)
        ->first();

    if ($curtida) {
        // Remover a curtida
        \DB::table('user_publication')
            ->where('userId', $userId)
            ->where('publicationId', $publicationId)
            ->delete();
        $curtido = false;
    } else {
        // Adicionar a curtida
        \DB::table('user_publication')->insert([
            'userId' => $userId,
            'publicationId' => $publicationId
        ]);
        $curtido = true;
    }

    // Contar curtidas após a ação
    $contador = \DB::table('user_publication')
        ->where('publicationId', $publicationId)
        ->count();

    // Retornar a resposta para o JavaScript
    return response()->json([
        'curtidas' => $contador,
        'curtido' => $curtido,
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

