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
    
    $request->validate([
        'publicationId' => 'required|exists:publications,publicationId',
        'userId' => 'required|exists:users,userId',
    ]);

    $userId = $request->input('userId');
    $publicationId = $request->input('publicationId');


    $curtida = \DB::table('user_publication')
        ->where('userId', $userId)
        ->where('publicationId', $publicationId)
        ->first();

    if ($curtida) {

        \DB::table('user_publication')
            ->where('userId', $userId)
            ->where('publicationId', $publicationId)
            ->delete();
        $curtido = false;
    } else {

        \DB::table('user_publication')->insert([
            'userId' => $userId,
            'publicationId' => $publicationId
        ]);
        $curtido = true;
    }


    $contador = \DB::table('user_publication')
        ->where('publicationId', $publicationId)
        ->count();


    return response()->json([
        'curtidas' => $contador,
        'curtido' => $curtido,
    ]);
}



public function store(Request $request)
    {
        
        $request->validate([
            'motivo' => 'required_without:outroMotivo',
            'outroMotivo' => 'required_if:motivo,outro',
            'professionalId' => 'required|exists:vw_feedProf,professionalId',
            'userId' => 'required|exists:users,userId',
        ]);

        
        $reason = $request->motivo === 'outro' ? $request->outroMotivo : $request->motivo;

        
        Complaint::create([
            'reason' => $reason,
            'complaintDate' => now(),
            'userId' => $request->userId,
            'professionalId' => $request->professionalId,
        ]);
        
        return redirect()->back()->with('success', 'Denúncia enviada com sucesso.');
    }

}

