<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/cad_prof.css">
    <link rel="icon" href="{{ asset('/image/logo/lilas-2.PNG') }}">
    <link rel="stylesheet" href="{{ asset('css/alert.css') }}">
    <script src="{{ asset('js/sweetalert2.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/modo_escuro.js') }}" defer></script>
    <script src="{{ asset('js/limiteTexto.js') }}" defer></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />
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
                    <h1 class="logo"><a href="{{ route('index') }}"> Fox<span class="foxserv">Serv</span></a></h1>
                    <div class="modo_escuro">
                        <input type="checkbox" name="change-theme" id="change-theme" />
                        <label for="change-theme">
                            <i class="bi bi-sun"></i>
                            <i class="bi bi-moon"></i>
                        </label>
                    </div>
                </div>
                <form class="card-form" action="{{ route('cadastroProfissional.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <h1>Cadastro do Profissional</h1>
                    
                    <!-- Categoria e Subcategoria 1 -->
                    <div class="linha">
                        <div class="textfield">
                            <label for="typeServiceId1">Categoria 1<span class="required"> * </span></label>
                            <select name="typeServiceId[]" id="typeServiceId1">
                                <option value="" selected disabled>Escolha a Categoria</option>
                                @foreach($serviceTypes as $type)
                                    <option value="{{ $type->serviceTypeId }}">{{ $type->serviceTypeName }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="textfield">
    <label for="serviceId1">Subcategoria 1</label>
    <select name="serviceId[]" id="serviceId1">
        <option value="" selected disabled>Escolha a Subcategoria</option>
    </select>
    <span class="carregando1" style="display: none;">Aguarde, carregando...</span>
</div>
                    </div>

                    <!-- Categoria e Subcategoria 2 -->
                    <div class="linha">
                        <div class="textfield">
                            <label for="typeServiceId2">Categoria 2</label>
                            <select name="typeServiceId[]" id="typeServiceId2">
                                <option value="" selected disabled>Escolha a Categoria</option>
                                @foreach($serviceTypes as $type)
                                    <option value="{{ $type->serviceTypeId }}">{{ $type->serviceTypeName }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="textfield">
                            <label for="serviceId2">Subcategoria 2</label>
                            <select name="serviceId[]" id="serviceId2">
                                <option value="" selected disabled>Escolha a Subcategoria</option>
                            </select>
                            <span class="carregando2" style="display: none;">Aguarde, carregando...</span>
                        </div>
                    </div>

                    <!-- Categoria e Subcategoria 3 -->
                    <div class="linha">
                        <div class="textfield">
                            <label for="typeServiceId3">Categoria 3</label>
                            <select name="typeServiceId[]" id="typeServiceId3">
                                <option value="" selected disabled>Escolha a Categoria</option>
                                @foreach($serviceTypes as $type)
                                    <option value="{{ $type->serviceTypeId }}">{{ $type->serviceTypeName }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="textfield">
                            <label for="serviceId3">Subcategoria 3</label>
                            <select name="serviceId[]" id="serviceId3">
                                <option value="" selected disabled>Escolha a Subcategoria</option>
                            </select>
                            <span class="carregando3" style="display: none;">Aguarde, carregando...</span>
                        </div>
                    </div>
                    
                    
                    <div class="linha">
                        <div class="input-box">
                            <label for="description">Descrição <span class="required"> * </span></label>
                            <textarea id="description" name="description" placeholder="Descrição dos serviços, habilidades, idiomas..." required maxlength="100"></textarea>
                            <div class="characters">
                                <span class="min_num">0</span>
                                <span class="limit_num">/100</span>
                            </div>
                        </div>
                    </div>

                    <!-- Botão de envio -->
                    <div class="botao">
                        <input type="submit" name="submit" class="btn-login" id="submit" value="Cadastrar">
                    </div>

                    <!-- Link para login -->
                    <div class="cadastro">
                        <label for="cadastro"> Já é profissional?</label>
                        <a class="cadastrar_se" href="login.php">Entrar</a>
                    </div>

                </form>

            </div>

            <div class="right">
                <img src="https://foxservbucket.s3.us-east-1.amazonaws.com/cadastro-modoClaro.png" class="img-right-modoClaro">
                <img src="https://foxservbucket.s3.us-east-1.amazonaws.com/cadastro-modoEscuro.png" class="img-right-modoEscuro">
            </div>
        </div>
    </div>

    <script src="/js/subcategoria.js"></script>
</body>

</html>