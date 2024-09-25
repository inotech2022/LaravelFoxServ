<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeuPerfilController extends Controller
{
    public function index()
    {
        return view('meu_perfil'); // View para exibir o perfil do usuário
    }
}
