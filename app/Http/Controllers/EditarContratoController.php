<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 
use App\Models\Contract; 
use App\Models\Service; 
use App\Models\vw_feedProf;
use App\Models\Professional;
use App\Models\vw_contracts;




class EditarContratoController extends Controller
{


public function index($protocol)
{
    $email = Auth::user()->email;
    $contract = vw_contracts::where('protocol', $protocol)->first();
    $servicos = vw_feedProf::where('email', $email)->get();



    if (!$contract) {
        return redirect()->back()->with('error', 'Contrato não encontrado.');
    }

    return view('editarContrato', compact('contract', 'servicos'));
}
}