<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class EditarDadosUsuarioController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $user = User::with('address')->findOrFail($userId);

        return view('editarDadosUsuario', compact('user'));
    }


    public function update($userId, Request $request)
    {
        // Validação dos dados do formulário
        $request->validate([
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'cpf' => 'required|string|max:14',
            'birthDate' => 'required|date',
            'email' => 'required|email|max:255|unique:users,email,' . $userId . ',userId',
            'zipCode' => 'nullable|string|max:10',
            'uf' => 'nullable|string|max:2',
            'city' => 'nullable|string|max:50',
            'district' => 'nullable|string|max:80',
            'street' => 'nullable|string|max:80', 
            'number' => 'nullable|string|max:10',
        ]);
    
        
        $user = User::findOrFail($userId);
    
     
        $user->update([
            'name' => $request->name,
            'lastName' => $request->lastName,
            'phone' => $request->phone,
            'cpf' => $request->cpf,
            'birthDate' => $request->birthDate,
            'email' => $request->email,
        ]);
    
        // Atualiza ou cria o endereço associado
        $user->address()->updateOrCreate(
            ['userId' => $user->userId], 
            [
                'zipCode' => $request->zipCode,
                'uf' => $request->uf,
                'city' => $request->city,
                'district' => $request->district,
                'street' => $request->street,
                'number' => $request->number,
            ]
        );
    
        return redirect()->route('editarDadosUsuario.edit', $userId)->with('success', 'Dados atualizados com sucesso!');
    }    
}
