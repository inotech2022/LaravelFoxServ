<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvaliacaoController extends Controller
{
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'estrela' => 'required|integer|min:1|max:5',
            'comentario' => 'required|string|max:100',
        ]);

        // Obtenha o ID do usuário logado
        $userId = Auth::id();

        // Obtenha o protocolo enviado no formulário
        $protocolo = $request->input('protocolo');

        // Crie a avaliação
        $rating = new Rating();
        $rating->starAmount = $request->input('estrela');
        $rating->comment = $request->input('comentario');
        $rating->ratingDate = now(); // Armazena a data atual
        $rating->userId = $userId; // Armazena o ID do usuário logado
        $rating->protocol = $protocolo; // Armazena o protocolo
        $rating->save();

        return redirect()->route('contrato_cliente')->with('success', 'Avaliação realizada com sucesso.');
    }
}
