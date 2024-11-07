<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Suggestion;

class IndexController extends Controller
{
    public function index()
    {

        return view('index');
    }

    public function store(Request $request)
    {
        // Valida a entrada
        $request->validate([
            'sugestao' => 'required|string|max:255',
        ]);

        // Cria um novo registro na tabela "suggestions"
        $suggestion = new Suggestion();
        $suggestion->suggestion = $request->input('sugestao');
        $suggestion->save();

        // Retorna uma resposta, como uma mensagem de sucesso ou redirecionamento
        return back()->with('success', 'Sugestão recebida com sucesso!');
    }
}
