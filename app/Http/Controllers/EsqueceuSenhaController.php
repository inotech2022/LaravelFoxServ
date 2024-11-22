<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EsqueceuSenhaController extends Controller
{
    public function index()
    {
        return view('esqueceuSenha'); 
    }
}
