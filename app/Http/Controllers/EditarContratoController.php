<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contract; // Certifique-se de que o modelo Contract está importado
use App\Models\vw_feedProf;
use App\Models\vw_contracts;
use Illuminate\Support\Facades\Validator;

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

    public function update(Request $request, $protocol)
    {
        $validated = $request->validate([
            'idServico' => 'required|exists:services,serviceId',
            'valor' => 'required|numeric',
            'dataInicial' => 'required|date',
            'dataFinal' => 'required|date|after_or_equal:dataInicial',
            'descricao' => 'required|max:100',
        ]);

        $contract = Contract::where('protocol', $protocol)->first();

        if (!$contract) {
            return redirect()->back()->with('error', 'Contrato não encontrado.');
        }

        // Atualizar valores forçando o update com atributos "sujos"
        $contract->serviceId = $request->input('idServico');
        $contract->price = $request->input('valor');
        $contract->startDate = date('Y-m-d', strtotime($request->input('dataInicial')));
        $contract->endDate = date('Y-m-d', strtotime($request->input('dataFinal')));
        $contract->description = $request->input('descricao');
        
        // Forçar o update
        $contract->update();

        return redirect()->route('contratoProfissional')->with('success', 'Contrato atualizado com sucesso.');
    }
}