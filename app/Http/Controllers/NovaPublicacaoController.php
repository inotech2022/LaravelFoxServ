<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NovaPublicacaoController extends Controller
{
    public function create()
    {
        return view('novaPublicacao'); // View para o formulário de cadastro
    }
}