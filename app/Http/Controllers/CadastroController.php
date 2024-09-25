<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class CadastroController extends Controller
{
    public function create()
    {
        return view('cadastro');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:50',
            'sobrenome' => 'required|max:50',
            'dataNasc' => 'required|date',
            'email' => 'required|email|unique:users',
            'telefone' => 'required',
            'cpf' => 'required',
            'cep' => 'required|max:9',
            'uf' => 'required',
            'cidade' => 'required|max:50',
            'bairro' => 'required',
            'endereco' => 'required|max:80',
            'numero' => 'nullable',
            'senha' => 'required|string|min:8|confirmed',
            'fotoPerfil' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $profilePicture = $request->file('fotoPerfil')->store('upload', 'public');

        $user = User::create([
            'name' => $request->nome,
            'lastName' => $request->sobrenome,
            'phone' => $request->telefone,
            'birthDate' => $request->dataNasc,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'password' => Hash::make($request->senha),
            'profilePic' => $profilePicture,
            'token' => bin2hex(random_bytes(50)),
            'type' => 'comum',
        ]);
        $userId = User::orderBy('userId', 'DESC')->first()->userId;


   
        Address::create([
            'userId' => $userId,
            'zipCode' => $request->cep,
            'uf' => $request->uf,
            'city' => $request->cidade,
            'district' => $request->bairro,
            'street' => $request->endereco,
            'number' => $request->numero,
        ]);

        
Auth::login($user);
        return redirect('/')->with('success', 'Registro realizado com sucesso.');
        
    }
    
        function home(Request $request) {
            return view('index');
        }
}
