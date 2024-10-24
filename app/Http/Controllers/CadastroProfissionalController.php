<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ServiceType;
use App\Models\Professional;
use App\Models\User;

class CadastroProfissionalController extends Controller
{
    public function create()
    {
        $serviceTypes = ServiceType::orderBy('serviceTypeName')->get();
        return view('cadastroProfissional', compact('serviceTypes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'serviceId' => 'required|array', 
            'description' => 'required|max:100',
        ]);

       
        $userId = Auth::id(); 

        $professional = Professional::create([
            'description' => $request->description,
            'userId' => $userId, 
        ]);

        $user = User::find($userId);
        $user->update(['type' => 'profissional']);

        $professional->services()->attach($request->serviceId);

        return redirect()->route('homeProfissional')->with('success', 'Parabéns, agora você é um profissional em nossa plataforma!');    }

    public function getSubcategories($id)
    {
        $subcategories = \App\Models\Service::where('serviceTypeId', $id)->get(['serviceId', 'serviceName']);
        return response()->json($subcategories);
    }
}


