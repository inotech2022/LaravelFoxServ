<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WebsiteRating;


class AvaliacaoPlataformaController extends Controller
{
    public function create()
    {
        return view('avaliacaoPlataforma');
    }

    // Processa e salva a avaliação
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'estrela' => 'required|integer|between:1,5',
            'comentario' => 'required|string|max:100',
        ]);

        // Criação da avaliação
        $websiteRating = new WebsiteRating();
        $websiteRating->starAmount = $request->input('estrela');
        $websiteRating->comment = $request->input('comentario');
        $websiteRating->ratingDate = now();
        $websiteRating->userId = Auth::id();  // Salvando o ID do usuário logado

        // Salva no banco de dados
        $websiteRating->save();

        // Redireciona com sucesso
        return redirect()->route('index')->with('success', 'Avaliação salva com sucesso!');
    }
}
