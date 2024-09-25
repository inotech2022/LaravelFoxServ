<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfissionaisController extends Controller
{
    public function index()
    {
        return view('profissionais'); // View para o formulário de cadastro
    }
}
