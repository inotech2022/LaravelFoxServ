<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditarDadosUsuarioController extends Controller
{
    public function index()
    {
        return view('editarDadosUsuario'); // View para o formulário de cadastro
    }
}
