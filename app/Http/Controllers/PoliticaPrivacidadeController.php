<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PoliticaPrivacidadeController extends NotificacaoController
{
    public function index()
    {
        return view('politicaPrivacidade'); 
    }
}
