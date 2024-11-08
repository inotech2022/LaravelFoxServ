<?php
namespace App\Http\Controllers;

use App\Models\Publication;
use App\Models\Professional;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NovaPublicacaoController extends Controller
{
    public function create()
    {
        return view('novaPublicacao');
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->withErrors('Você precisa estar logado para fazer uma publicação.');
        }

        $user = Auth::user();

        $professional = Professional::where('userId', $user->userId)->first();
        if (!$professional) {
            return redirect()->route('index')->withErrors('Somente profissionais podem criar publicações.');
        }
        

        

        $validatedData = $request->validate([
            'image' => 'required|image|max:2048',
            'caption' => 'required|string|max:100'
        ]);

        $imagePath = $request->file('image')->store('public/image/upload');

        Publication::create([
            'image' => $imagePath,
            'caption' => $validatedData['caption'],
            'professionalId' => $professional->professionalId,
            'date' => now(),
        ]);

        return redirect()->route('meuPerfil', ['professionalId' => $professional->professionalId])
            ->with('success', 'Publicação criada com sucesso!');
    }
}

