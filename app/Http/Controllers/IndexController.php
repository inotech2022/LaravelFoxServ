<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Suggestion;

class IndexController extends Controller
{
    public function index(Request $request)
    {

        $searchTerm = $request->input('nomeServico'); 
    $serviceId = $request->input('serviceId');
        return view('index', compact('searchTerm', 'serviceId'));
    }

    public function store(Request $request)
{
    
    $request->validate([
        'sugestao' => 'required|string|max:255',
    ]);

    
    $userId = Auth::id();

    
    $suggestion = new Suggestion();
    $suggestion->suggestion = $request->input('sugestao');
    $suggestion->userId = $userId;
    $suggestion->suggestionDate = now();
    $suggestion->save();

    
    return redirect()->route('index')->with('success', 'Sugestão recebida com sucesso!');
}
}
