<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 
use App\Models\Contract; 
use App\Models\Service; 
use App\Models\vw_feedProf;

class CadastroContratoController extends Controller
{
    public function create()
    {
        $email = Auth::user()->email;
        
        $servicos = vw_feedProf::where('email', $email)->get();

        return view('cadastroContrato', compact('servicos'));
    }
        
    public function store(Request $request)
    {
        $request->validate([
            'cpf' => 'required|string|max:14', 
            'idServico' => 'required|integer',
            'valor' => 'required|numeric',
            'dataInicial' => 'required|date',
            'dataFinal' => 'required|date',
            'descricao' => 'required|string|max:100',
        ]);


        $user = User::where('cpf', $request->cpf)->first();

        if (!$user) {
            return redirect()->back()->withErrors(['cpf' => 'Cliente não encontrado.']);
        }


        Contract::create([
            'serviceId' => $request->idServico,
            'price' => $request->valor,
            'startDate' => $request->dataInicial,
            'endDate' => $request->dataFinal,
            'description' => $request->descricao,
            'userId' => $user->id,
            'professionalId' => auth()->id(),
        ]);
        

        return redirect()->route('contratoProfissional.index')->with('success', 'Contrato cadastrado com sucesso!');

    }
}
