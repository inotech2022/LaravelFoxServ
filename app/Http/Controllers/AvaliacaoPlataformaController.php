<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WebsiteRating;


class AvaliacaoPlataformaController extends Controller
{
    public function create()
    {
        return view('avaliacaoPlataforma');
    }

    
    public function store(Request $request)
    {
        
        $request->validate([
            'estrela' => 'required|integer|between:1,5',
            'comentario' => 'required|string|max:100',
        ]);

        
        $websiteRating = new WebsiteRating();
        $websiteRating->starAmount = $request->input('estrela');
        $websiteRating->comment = $request->input('comentario');
        $websiteRating->ratingDate = now();
        $websiteRating->userId = Auth::id();  

        
        $websiteRating->save();

        
        return redirect()->route('avaliacaoPlataforma')->with('success', 'Avaliação salva com sucesso!');
    }
}
