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

        // Define o status do contrato
        foreach ($contratos as $contrato) {
            if ($contrato->endDate < $dataAtual) {
                $contrato->statusContrato = 'Finalizado';
            } elseif ($contrato->startDate <= $dataAtual && $contrato->endDate >= $dataAtual) {
                $contrato->statusContrato = 'Em Andamento';
            } else {
                $contrato->statusContrato = 'Não Iniciado';
            }
        }

        if ($request->has('filtro')) {
            $filtro = $request->input('filtro');
            
            if ($filtro === 'name') {
                $contratos = $contratos->sortBy('name')->values();
            } elseif ($filtro === 'startDate') {
                $contratos = $contratos->sortBy('startDate')->values();
            }
        }

        return view('contratoProfissional', compact('contratos'));
    }

    public function destroy($protocol)
    {
        // Busca o contrato usando o 'protocol'
        $contrato = Contract::where('protocol', $protocol)->first();

        if ($contrato) {
            // Desassociar as avaliações do contrato (não excluir as avaliações, apenas remover a associação)
            \DB::table('ratings')
                ->where('protocol', $protocol)
                ->update(['protocol' => null]);

            // Excluir o contrato
            $contrato->delete();

            return redirect()->route('contratoProfissional')->with('success', 'Contrato excluído com sucesso!');
        }

        return redirect()->route('contratoProfissional')->with('error', 'Contrato não encontrado.');
    }
}
