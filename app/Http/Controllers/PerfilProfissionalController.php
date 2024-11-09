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

        return view('perfilProfissional', [
            'profissional' => $profissional,
            'publicacoes' => $publicacoes,
            'avaliacoes' => $avaliacoes,
            'media' => $media,
            'mediaRedonda' => $mediaRedonda,
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