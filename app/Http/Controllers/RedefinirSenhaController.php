<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedefinirSenhaController extends Controller
{
    public function index()
    {
        return view('redefinirSenha'); // View para o formulário de cadastro
    }
}
