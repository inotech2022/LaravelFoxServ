<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ServiceType;
use App\Models\Service;


class ServicosController extends Controller
{
    public function index($id)
    {
        $serviceType = ServiceType::findOrFail($id);
    
        $services = Service::where('serviceTypeId', $id)->get();
    
        return view('servicos', [
            'category' => $serviceType,
            'services' => $services,
        ]);
    }
  
}
