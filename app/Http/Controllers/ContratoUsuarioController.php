<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 
use App\Models\Contract; 
use App\Models\Service; 
use App\Models\vw_contracts;
use App\Models\Rating;

class ContratoUsuarioController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();
        $dataAtual = now();
    
        $contratos = vw_contracts::where('userId', $userId)->get();
    
        foreach ($contratos as $contrato) {
            if ($contrato->endDate < $dataAtual) {
                $contrato->statusContrato = 'Finalizado';
            } elseif ($contrato->startDate <= $dataAtual && $contrato->endDate >= $dataAtual) {
                $contrato->statusContrato = 'Em Andamento';
            } else {
                $contrato->statusContrato = 'Não Iniciado';
            }
    
            $contrato->avaliado = Rating::where('protocol', $contrato->protocol)->exists();
        }
    
        if ($request->has('filtro')) {
            $filtro = $request->input('filtro');
            
            if ($filtro === 'nomeProf') {
                $contratos = $contratos->sortBy('professionalName')->values();
            } elseif ($filtro === 'dataInicial') {
                $contratos = $contratos->sortBy('startDate')->values();
            }
        }
    
        return view('contratoUsuario', compact('contratos'));
    }

}
