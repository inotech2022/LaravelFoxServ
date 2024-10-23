<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ServiceType;
use App\Models\Professional;
use App\Models\User;

class CadastroProfissionalController extends Controller
{
    public function create()
    {
        $serviceTypes = ServiceType::orderBy('serviceTypeName')->get();
        return view('cadastroProfissional', compact('serviceTypes'));
    }

    public function store(Request $request)
    {
        // Validação dos dados enviados
        $validated = $request->validate([
            'serviceId' => 'required|array', // Apenas array de serviços
            'description' => 'required|max:100',
        ]);

        // Obter o ID do usuário logado diretamente no backend
        $userId = Auth::id(); // Captura o ID do usuário logado

        if (!$userId) {
            return redirect()->route('index')->with('error', 'Você precisa estar logado para se cadastrar como profissional.');
        }

        // Criação de um novo profissional
        $professional = Professional::create([
            'description' => $request->description,
            'userId' => $userId, // Usa o ID do usuário logado
        ]);

        // Atualizar o usuário para "profissional"
        $user = User::find($userId);
        $user->update(['type' => 'profissional']);

        // Associar os serviços ao profissional
        $professional->services()->attach($request->serviceId);

        // Redirecionar com mensagem de sucesso
        return redirect()->route('homeProfissional')->with('success', 'Parabéns, agora você é um profissional em nossa plataforma!');
    }

    public function getSubcategories($id)
    {
        $subcategories = \App\Models\Service::where('serviceTypeId', $id)->get(['serviceId', 'serviceName']);
        return response()->json($subcategories);
    }
}
