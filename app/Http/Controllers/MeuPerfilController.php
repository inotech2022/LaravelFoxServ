<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\vw_feedProf;
use App\Models\User;

class MeuPerfilController extends Controller
{
    public function index()
    {

        return view('meuPerfil');

    }

}
