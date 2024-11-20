<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/cad_usuario.css') }}">
    <link rel="icon" href="{{ asset('logo/lilas-2.PNG') }}">
    <link rel="stylesheet" href="{{ asset('css/alert.css') }}">
    <script src="{{ asset('js/modo_escuro.js') }}" defer></script>
    <script src="{{ asset('js/cep.js') }}" defer></script>    
    <script src="{{ asset('js/sweetalert2.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="confirmaSenha.js" defer></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />


    <title>Cadastro</title>
</head>

<body>
@if(session('success'))
    <script>
   Swal.fire({
    title: 'Sucesso!',
    text: "{{ session('success') }}",
    icon: 'success',
    confirmButtonText: 'OK',
    customClass: {
        popup: 'my-swal-popup',
        title: 'my-swal-title',
        text: 'my-swal-text',
        confirmButton: 'my-swal-button',
    }
}).then((result) => {
    if (result.isConfirmed) { // Certifica que o botão foi clicado
        window.location.href = "/login";
    }
});

</script>
@endif
    <div class="main_gradiente">
        <div class="main">
            <div class="left">
                <div class="logo-header">

                    <h1 class="logo"><a href="{{route('index')}}"> Fox<span class="foxserv">Serv</span></a></h1>
                    <div class="modo_escuro">
                        <input type="checkbox" name="change-theme" id="change-theme" />
                        <label for="change-theme">
                            <i class="bi bi-sun"></i>
                            <i class="bi bi-moon"></i></label>
                    </div>
                </div>
                @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                <form class="card-form" action="{{ route('cadastro.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <h1>Cadastro </h1>
                    <div class="linha">
                        <div class="textfield">
                            <label for="nome">Nome <span class="required"> * </span></label>
                            <input type="text" name="nome" id="nome" placeholder="Nome" required maxlength="50">
                        </div>
                        <div class="textfield">
                            <label for="sobrenome">Sobrenome <span class="required"> * </span></label>
                            <input type="text" name="sobrenome" id="sobrenome" placeholder="Sobrenome" required maxlength="50">
                        </div>
                        <div class="textfield">
                            <label for="dataNasc">Nascimento <span class="required"> * </span></label>
                            <input type="date" name="dataNasc" id="dataNasc" placeholder="00/00/0000" max="<?php echo date('Y-m-d',strtotime('-15 year'));?>" required>
                        </div>
                    </div>
                    <div class="linha">
                        <div class="textfield">
                            <label for="cpf">CPF <span class="required"> * </span></label>
                            <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" required>
                        </div>
                        <div class="textfield">
                            <label for="email">E-mail <span class="required"> * </span></label>
                            <input type="email" name="email" id="email" placeholder="Insira seu e-mail" required maxlength="50" autocomplete="off">
                        </div>
                        <div class="textfield">
                            <label for="telefone">Telefone <span class="required"> * </span></label>
                            <input type="tel" id="telefone" name="telefone" placeholder="15 00000-0000" required>
                        </div>
                    </div>
                    <div class="linha">
                        <div class="textfield">
                            <label for="cep">CEP <span class="required"> * </span></label>
                            <input type="text" id="cep" name="cep" placeholder="00000-000">
                        </div>
                        <div class="textfield">
                            <label for="uf">UF <span class="required"> * </span></label>
                            <input type="text" name="uf" id="uf" placeholder="uf">
                        </div>

                        <div class="textfield">
                            <label for="cidade">Cidade <span class="required"> * </span></label>
                            <input type="text" name="cidade" id="cidade" placeholder="Cidade" required maxlength="50">
                        </div>
                        <div class="textfield">
                            <label for="bairro">Bairro <span class="required"> * </span></label>
                            <input type="text" id="bairro" name="bairro" placeholder="Bairro">
                        </div>
                    </div>
                    <div class="linha">



                        <div class="textfield">
                            <label for="endereco">Endereço <span class="required"> * </span></label>
                            <input type="text" id="endereco" name="endereco" placeholder="Endereço"
                                maxlength="80">
                        </div>
                        <div class="textfield">
                            <label for="numero">Número</label>
                            <input type="text" id="numero" name="numero" placeholder="nº">
                        </div>
                        <div class="textfield">
                            <label class="fotoPerfil" for="fotoPerfil">
                                <span class="text">Foto de Perfil <span class="required"> * </span> </span>
                                <span class="material-symbols-outlined">photo_camera
                                </span></label>
                            <input type="file" class="fotoPerfil" id="fotoPerfil" name="fotoPerfil">
                        </div>

                        <script> document.querySelector('#fotoPerfil').addEventListener('change', function () {
                                document.querySelector('.text').textContent = this.files[0].name;
                            }) </script>


                    </div>
                    <div class="linha">
                        <div class="textfield">
                            <label for="senha">Senha <span class="required"> * </span></label>
                            <input type="password" name="senha" id="senha" placeholder="Insira sua senha" required maxlength="30"
                                minlength="8">
                        </div>
                        <div class="textfield">
                            <label for="senha_confirmation">Confirme a senha <span class="required"> * </span></label>
                            <input type="password" name="senha_confirmation" id="senha_confirmation" placeholder="Confirme sua senha" required maxlength="30"
                                minlength="8">
                        </div>
                    </div>

                    <div class="botao">
                        <input  type="submit" name="submit" class="btn-login" id="submit" value="Cadastrar">
                    </div>
                    <div class="cadastro">
                        <label for="cadastro"> Já tem uma conta?</label>
                        <a class="cadastrar_se" href="{{ route('login') }}">Entrar</a>
                    </div>

                </form>
            </div>
            <div class="right">
            <img src="{{ asset('image/cadastro-modoClaro.png') }}" class="img-right-modoClaro">
            <img src="{{ asset('image/cadastro-modoEscuro.png') }}" class="img-right-modoEscuro">
            </div>
        </div>
    </div>
</body>
</html>
