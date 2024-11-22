<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RedefinirSenhaController extends Controller
{
    public function index()
    {
        
        if (!Auth::check()) {
            return redirect()->route('login.form')->with('error', 'Você precisa estar logado para acessar esta página.');
        }

        return view('redefinirSenha'); 
    }

    public function updatePassword(Request $request)
    {
        
        if (!Auth::check()) {
            return redirect()->route('login.form')->with('error', 'Você precisa estar logado para alterar sua senha.');
        }

        
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'A senha atual está incorreta']);
        }

        
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Senha atualizada com sucesso!');
    }
}

