<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 
use App\Models\Contract; 
use App\Models\Service; 
use App\Models\vw_feedProf;
use App\Models\Professional;

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
        $validated_data = $request->validate([
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

        $professional = Professional::where('userId', auth()->id())->first();

        Contract::create([
            'serviceId' => $request->idServico,
            'registrationDate' => now(),
            'price' => $request->valor,
            'startDate' => $request->dataInicial,
            'endDate' => $request->dataFinal,
            'description' => $request->descricao,
            'userId' => $user->userId,
            'professionalId' => $professional->professionalId
        ]);
        

        return redirect()->route('contratoProfissional')->with('success', 'Contrato cadastrado com sucesso!');
    }
}
