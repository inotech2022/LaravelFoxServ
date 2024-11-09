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

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('image/upload'), $imageName);
            $imagePath = $imageName;
        } else {
            return redirect()->back()->withErrors('Erro ao carregar a imagem.');
        }

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
