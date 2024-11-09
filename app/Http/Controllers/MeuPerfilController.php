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

        return view('meuPerfil', [
            'profissional' => $profissional,
            'publicacoes' => $publicacoes,
            'avaliacoes' => $avaliacoes,
            'media' => $media,
            'mediaRedonda' => $mediaRedonda,
        ]);
    }

}
