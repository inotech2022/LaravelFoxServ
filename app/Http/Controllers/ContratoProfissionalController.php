<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Contract;

class ContratoProfissionalController extends Controller
{
    public function index()
    {
        $contratos = Contract::all(); 
        return view('contratoProfissional', compact('contratos')); 
    }
}
