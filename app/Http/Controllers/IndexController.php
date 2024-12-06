<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use App\Models\Suggestion;

class IndexController extends NotificacaoController
{
    public function index(Request $request)
    {
        $notificacoes = $this->getNotifications();

        $searchTerm = $request->input('nomeServico'); 
    $serviceId = $request->input('serviceId');

    if (auth()->check() && auth()->user()->type === 'profissional') { 
        $notificacoesArray = is_array($notificacoes) ? $notificacoes : $notificacoes->toArray();
        $dados = compact('searchTerm', 'serviceId') + $notificacoesArray;
    } else {
        $dados = compact('searchTerm', 'serviceId');
    }

        return view('index', $dados );
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
