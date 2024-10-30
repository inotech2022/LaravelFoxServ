<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 
use App\Models\Contract; 
use App\Models\Service; 
use App\Models\Professional; 
use App\Models\vw_contracts;

class ContratoProfissionalController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();

        $professional = Professional::where('userId', $userId)->first();
        
        if (!$professional) {
            return view('contratoProfissional', ['contratos' => collect()]);
        }

        $professionalId = $professional->professionalId;

        $filtro = $request->get('filtro');
        $contratos = vw_contracts::where('professionalId', $professionalId);

        if ($filtro === 'name') {
            $contratos->orderBy('name');
        } elseif ($filtro === 'startDate') {
            $contratos->orderBy('startDate');
        }

        $contratos = $contratos->get();
        $dataAtual = now();

        // lógica pra ver o status do contrato
        foreach ($contratos as $contrato) {
            if ($contrato->endDate < $dataAtual) {
                $contrato->statusContrato = 'Finalizado';
            } elseif ($contrato->startDate <= $dataAtual && $contrato->endDate >= $dataAtual) {
                $contrato->statusContrato = 'Em Andamento';
            } else {
                $contrato->statusContrato = 'Não Iniciado';
            }
        }

        return view('contratoProfissional', compact('contratos'));
    }
}
