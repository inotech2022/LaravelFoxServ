@extends('layouts.cadastro')

@section('title', 'Editar Dados')

<link rel="stylesheet" href="{{ asset('css/editarCliente.css') }}">
@section('content')

<form class="card-form" action="{{ route('editarDadosUsuario.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h1>Editar Dados</h1>

        <div class="linha">
            <div class="textfield">
                <label class="foto_perfil" for="foto_perfil">
                    <span class="text">{{ $user->profilePic ? basename($user->profilePic) : 'Selecione uma imagem' }}</span>
                    <span class="material-symbols-outlined">photo_camera</span>
                </label>
                <input type="file" class="foto_perfil" id="foto_perfil" name="foto_perfil">
            </div>

            <script> 
                document.querySelector('#foto_perfil').addEventListener('change', function() {
                    document.querySelector('.text').textContent = this.files[0].name;
                });
            </script>

            <div class="textfield">
                <label for="telefone">Telefone</label>
                <input type="tel" id="telefone" name="telefone" placeholder="+55 | 15 00000-0000" value="{{ old('telefone', $user->phone) }}">
            </div>
        </div>

        <div class="linha">
            <div class="textfield">
                <label for="cep">CEP</label>
                <input type="text" id="cep" name="cep" placeholder="00000-000" value="{{ old('cep', $address->zipCode ?? '') }}">
            </div>
            <div class="textfield">
                <label for="uf">UF</label>
                <input type="text" name="uf" id="uf" placeholder="UF" value="{{ old('uf', $address->uf ?? '') }}">
            </div>
            <div class="textfield">
                <label for="cidade">Cidade</label>
                <input type="text" name="cidade" id="cidade" placeholder="Cidade" required maxlength="50" value="{{ old('cidade', $address->city ?? '') }}">
            </div>
        </div>

        <div class="linha">
            <div class="textfield">
                <label for="bairro">Bairro</label>
                <input type="text" name="bairro" id="bairro" placeholder="Bairro" required maxlength="80" value="{{ old('bairro', $address->district ?? '') }}">
            </div>
            <div class="textfield">
                <label for="endereco">Endereço</label>
                <input type="text" name="endereco" id="endereco" placeholder="Endereço" required maxlength="80" value="{{ old('endereco', $address->street ?? '') }}">
            </div>
            <div class="textfield">
                <label for="numero">Número</label>
                <input type="text" id="numero" name="numero" placeholder="00" value="{{ old('numero', $address->number ?? '') }}">
            </div>
        </div>

        <div class="botao">
            <input type="submit" name="submit" class="btn-login" id="submit" value="Editar">
        </div>

        <a class="voltar" href="{{ route('index') }}">Voltar</a>
    </form>
            </div>

        <div class="right">
            <img src="image/editarDados-modoClaro.png" class="img-right-modoClaro">
            <img src="image/editarDados-modoEscuro.png" class="img-right-modoEscuro">
        </div>
    </div>
@endsection
