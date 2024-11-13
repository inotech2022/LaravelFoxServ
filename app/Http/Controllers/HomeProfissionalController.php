<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class HomeProfissionalController extends NotificacaoController
{
    public function index()
    {
        $notificacoes = $this->getNotifications();
        
        return view('homeProfissional', $notificacoes);
    }
}
