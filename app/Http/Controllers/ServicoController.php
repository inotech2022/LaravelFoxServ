<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServicoController extends Controller
{
    public function getSubcategories($id)
    {
        $subcategories = Subcategory::where('typeServiceId', $id)->get();
        return response()->json($subcategories);
    }
}
