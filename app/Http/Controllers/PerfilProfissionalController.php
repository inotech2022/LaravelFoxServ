<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\vw_feedProf;
use App\Models\User;

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

    return view('perfilProfissional', compact('profissional', 'media', 'mediaRedonda'));
}

}