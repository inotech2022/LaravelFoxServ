<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RedefinirSenhaController extends Controller
{
    public function index()
    {
        // Verifica se o usuário está autenticado antes de exibir a view
        if (!Auth::check()) {
            return redirect()->route('login.form')->with('error', 'Você precisa estar logado para acessar esta página.');
        }

        return view('redefinirSenha'); // Retorna a view redefinirSenha.blade.php
    }

    public function updatePassword(Request $request)
    {
        // Verifica se o usuário está autenticado
        if (!Auth::check()) {
            return redirect()->route('login.form')->with('error', 'Você precisa estar logado para alterar sua senha.');
        }

        // Validação dos campos
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        // Verifica se a senha atual está correta
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'A senha atual está incorreta']);
        }

        // Atualiza a senha
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Senha atualizada com sucesso!');
    }
}

