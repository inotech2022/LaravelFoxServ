<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SejaProfissionalController extends Controller
{
    public function index()
    {
        return view('sejaProfissional'); // View para o formulário de cadastro
    }
}
