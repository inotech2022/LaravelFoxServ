<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Professional;
use App\Models\Publication;
use App\Models\vw_ratings;
use App\Models\User;


class NotificacaoController extends Controller
{
    public function index()
    {
        // Obtém o ID do usuário logado e busca o ID do profissional associado
        $userId = Auth::id();
        $profissional = Professional::where('userId', $userId)->first();

        if (!$profissional) {
            return redirect()->route('home')->with('error', 'Profissional não encontrado.');
        }

        $professionalId = $profissional->professionalId;

        // Buscar avaliações do profissional na view vw_ratings
        $avaliacoes = vw_ratings::where('professionalId', $professionalId)
            ->get(['name', 'lastName', 'profilePic']);

        // Buscar curtidas das publicações do profissional na tabela user_publication (tabela associativa)
        $curtidas = User::join('user_publication', 'users.userId', '=', 'user_publication.userId')
            ->join('publications', 'user_publication.publicationId', '=', 'publications.publicationId')
            ->where('publications.professionalId', $professionalId)
            ->get(['users.name', 'users.lastName', 'users.profilePic']);


        return view('meuPerfil', compact('curtidas', 'avaliacoes'));
    }
}
