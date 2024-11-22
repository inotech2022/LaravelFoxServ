<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;
use App\Models\vw_contracts;
use App\Models\Contract;


class AvaliacaoController extends Controller
{
    public function create()
    {
        return view('avaliacao'); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'estrela' => 'required|integer|min:1|max:5',
            'comentario' => 'required|string|max:100',
        ]);

        $userId = Auth::id();
        $user = auth()->user();
        $protocolo = $request->input('protocol');

        $contract = Contract::where('protocol', $protocolo)->first();

        if (!$contract) {
            
            return redirect()->route('contratoUsuario')->with('error', 'Protocolo não encontrado.');
        }

        // Criando a avaliação
        $rating = new Rating();
        $rating->starAmount = $request->input('estrela');
        $rating->comment = $request->input('comentario');
        $rating->ratingDate = now(); 
        $rating->userId = $userId; 
        $rating->protocol = $protocolo; 
        $rating->professionalId = $contract->professionalId; 
        $rating->save();

        return redirect()->route('avaliacao', ['protocol' => $contract->protocol])
                 ->with('success', 'Avaliação realizada com sucesso.')
                 ->with('type', $user->type);
    }
}
