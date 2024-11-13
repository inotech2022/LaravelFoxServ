<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Address;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Mail\ConfirmacaoCadastro;
use Illuminate\Support\Facades\Mail;


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

        if ($request->hasFile('fotoPerfil') && $request->file('fotoPerfil')->isValid()) {
            $image = $request->file('fotoPerfil');
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->move(public_path('image/upload'), $imageName);
            $imagePath = 'image/upload/' . $imageName;
        }else {
            return redirect()->back()->withErrors('Erro ao carregar a imagem.');
        }


        $user = User::create([
            'name' => $request->nome,
            'lastName' => $request->sobrenome,
            'phone' => $request->telefone,
            'birthDate' => $request->dataNasc,
            'cpf' => $request->cpf,
            'email' => $request->email,
            'password' => Hash::make($request->senha),
            'profilePic' => $imagePath,
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


        //Mail::to($user->email)->send(new ConfirmacaoCadastro($user));

        Auth::login($user);
        return redirect('/login')->with('success', 'Registro realizado com sucesso. Por favor, confirme seu e-mail.');
    }}
