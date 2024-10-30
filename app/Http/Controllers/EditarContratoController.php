<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 
use App\Models\Contract; 
use App\Models\Service; 
use App\Models\vw_feedProf;

class EditarContratoController extends Controller
{
    public function index()
    {
        $email = Auth::user()->email;
        
        $servicos = vw_feedProf::where('email', $email)->get();

        return view('editarContrato', compact('servicos'));
    }
}
