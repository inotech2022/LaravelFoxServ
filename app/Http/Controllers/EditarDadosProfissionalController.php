<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditarDadosProfissionalController extends Controller
{
    public function index()
    {
        return view('editarDadosProfissional'); // View para o formulário de cadastro
    }
}
