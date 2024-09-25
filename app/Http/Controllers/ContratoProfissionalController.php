<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContratoProfissionalController extends Controller
{
    public function index()
    {
        return view('contratoProfissional'); // View para o formulário de cadastro
    }
}
