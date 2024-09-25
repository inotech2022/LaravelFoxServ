<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilProfissionalController extends Controller
{
    public function index()
    {
        return view('perfilProfissional'); // View para o formulário de cadastro
    }
}
