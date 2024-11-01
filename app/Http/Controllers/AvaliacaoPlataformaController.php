<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AvaliacaoPlataformaController extends Controller
{
    public function create()
    {
        return view('avaliacaoPlataforma');
    }
}
