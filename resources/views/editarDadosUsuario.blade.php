@extends('layouts.cadastro')

@section('title', 'Editar Dados')

<link rel="stylesheet" href="{{ asset('css/editarCliente.css') }}">

@section('content')
<form class="card-form" action="{{ route('editarDadosUsuario.update', $user->userId) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <h1>Editar Dados</h1>

    <!-- Dados do Usuário -->
    <div class="linha">
        <div class="textfield">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" disabled value="{{ old('name', $user->name) }} {{ old('lastName', $user->lastName) }}" required>
        </div>
        
    </div>

    <div class="linha">
        <div class="textfield">
            <label for="phone">Telefone</label>
            <input type="text" name="phone" id="phone" value="{{ old('phone', $user->phone) }}" required>
        </div>
        <div class="textfield">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" required>
        </div>
    </div>

    

    <div class="linha">
        <div class="textfield">
            <label for="zipCode">CEP</label>
            <input type="text" name="zipCode" id="zipCode" value="{{ old('zipCode', $user->address->zipCode ?? '') }}">
        </div>
        <div class="textfield">
            <label for="uf">UF</label>
            <input type="text" name="uf" id="uf" value="{{ old('uf', $user->address->uf ?? '') }}">
        </div>
        <div class="textfield">
            <label for="number">Número</label>
            <input type="text" name="number" id="number" value="{{ old('number', $user->address->number ?? '') }}">
        </div>
    </div>

    <div class="linha">
        <div class="textfield">
            <label for="city">Cidade</label>
            <input type="text" name="city" id="city" value="{{ old('city', $user->address->city ?? '') }}">
        </div>
        <div class="textfield">
            <label for="district">Bairro</label>
            <input type="text" name="district" id="district" value="{{ old('district', $user->address->district ?? '') }}">
        </div>
    </div>

    <div class="linha">
        <div class="textfield">
            <label for="street">Endereço</label>
            <input type="text" name="street" id="street" value="{{ old('street', $user->address->street ?? '') }}">
        </div>
        
    </div>

    <!-- Botão de Envio -->
    <div class="botao">
        <input type="submit" class="btn-login" value="Editar">
    </div>
</form>

</div>
        <div class="right">
            <img src="image/avaliaçao-modoClaro.png" class="img-right-modoClaro">
            <img src="image/avaliaçao-modoEscuro.png" class="img-right-modoEscuro">
        </div>
    </div>
@endsection
