<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Suggestion;

class IndexController extends Controller
{
    public function index(Request $request)
    {

        $searchTerm = $request->input('nomeServico'); // termo de pesquisa
    $serviceId = $request->input('serviceId');
        return view('index', compact('searchTerm', 'serviceId'));
    }

    public function store(Request $request)
{
    // Valida a entrada
    $request->validate([
        'sugestao' => 'required|string|max:255',
    ]);

    // Obtém o ID do usuário logado
    $userId = Auth::id();

    // Cria um novo registro na tabela "suggestions"
    $suggestion = new Suggestion();
    $suggestion->suggestion = $request->input('sugestao');
    $suggestion->userId = $userId;
    $suggestion->suggestionDate = now();
    $suggestion->save();

    // Retorna uma resposta, como uma mensagem de sucesso ou redirecionamento
    return redirect()->route('index')->with('success', 'Sugestão recebida com sucesso!');
}
}
