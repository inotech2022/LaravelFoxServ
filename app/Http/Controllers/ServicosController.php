<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceType;
use App\Models\Service;


class ServicosController extends Controller
{
    public function index($id)
    {
        // Obtém a categoria pelo ID fornecido
        $serviceType = ServiceType::findOrFail($id);
    
        // Obtém os serviços relacionados à categoria
        $services = Service::where('serviceTypeId', $id)->get();
    
        // Passa o nome da categoria e os serviços para a view
        return view('servicos', [
            'category' => $serviceType,
            'services' => $services,
        ]);
    }
}
