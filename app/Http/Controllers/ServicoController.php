<?php

namespace App\Http\Controllers;

use App\Models\Service; 
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    public function getSubcategorias($typeServiceId)
    {
        $subcategorias = Subcategoria::where('typeServiceId', $typeServiceId)->get();
        return response()->json($subcategorias);
    }
}
