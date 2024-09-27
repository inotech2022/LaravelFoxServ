<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CadastroProfissionalController extends Controller
{
    public function create()
    {
        $servicesTypes = serviceType::orderBy('serviceTypeName')->get();
        return view('cadastroProfissional.create', compact('serviceType'));
    }

    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'idTipoServico' => 'required|array',
            'idServico' => 'required|array',
            'descricao' => 'required|max:100',
            'idUsuario' => 'required|exists:users,userId',
        ]);

       
        $professional = Professional::create([
            'description' => $request->descricao,
            'userId' => $request->idUsuario,
        ]);

        
        $user = User::find($request->userId);
        $user->update(['type' => 'profissional']);

        
        foreach ($request->typeServiceId as $index => $typeServiceId) {
            $professional->services()->create([
                'serviceId' => $request->serviceId[$index],
                'typeServiceId' => $typeServiceId,
            ]);
        }

        return redirect()->route('index')->with('success', 'Parabéns, agora você é um profissional em nossa plataforma!');
    }
}
