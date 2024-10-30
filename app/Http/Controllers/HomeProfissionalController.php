<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class HomeProfissionalController extends Controller
{
    public function index()
    {
        return view('homeProfissional'); // View para o formulário de cadastro
    }
}
