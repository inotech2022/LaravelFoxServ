<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DesempenhoProfissionalController extends Controller
{
    public function index()
    {
        return view('desempenhoProfissional'); // View para o formulário de cadastro
    }
}
