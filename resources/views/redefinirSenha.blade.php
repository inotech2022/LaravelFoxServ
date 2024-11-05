@extends('layouts.cadastro')

    @section('title', 'Novo Contrato')
    
<link rel="stylesheet" href="{{ asset('css/cad_servico.css') }}">
    @section('content')

    @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Exibe a mensagem de sucesso -->
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

      
            <form class="card-form" action="{{ route('redefinirSenha.update') }}" method="POST" enctype="multipart/form-data" >
            @csrf    
            <h1>Redefinir Senha</h1>
                <div class="linha">
                    <div class="textfield">
                        <label for="senha_antiga">Senha Antiga</label>
                        <input type="password" name="current_password" placeholder="digite sua senha antiga" required
                            maxlength="30" minlength="8">
                    </div>
                </div>
                <div class="linha">
                    <div class="textfield">
                        <label for="senha">Nova Senha</label>
                        <input type="password" name="new_password" placeholder="insira sua nova senha" required maxlength="30"
                            minlength="8">
                    </div>
                    <div class="textfield">
                        <label for="senha2">Confirme a senha</label>
                        <input type="password" name="new_password_confirmation" placeholder="confirme sua senha" required maxlength="30"
                            minlength="8">
                    </div>
                </div>
                <div class="botao">
                    <input type="submit" name="submit" class="btn-login" id="submit" value="Redefinir">
                </div>
            </form>
        </div>
        <div class="right">
            <img src="image/senha-modoClaro.png" class="img-right-modoClaro">
            <img src="image/senha-modoEscuro.png" class="img-right-modoEscuro">
        </div>
    </div>
@endsection
