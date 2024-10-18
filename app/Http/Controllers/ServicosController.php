<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceType;

class ServicosController extends Controller
{
    public function index($id)
    {
        // Aqui que procuramos os dados dos serviços
        $service = ServiceType::where('serviceTypeId', $id)->get();
        return $service;
        return view('servicos', ['service' => $service]); // View para o formulário de cadastro
    }
}
