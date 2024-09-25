<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContratoUsuarioController extends Controller
{
    public function index()
    {
        return view('contratoUsuario'); // View para o formulário de cadastro
    }
}
