<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/cad_prof.css') }}">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="icon" href="{{ asset('logo/lilas-2.PNG') }}">
	<script src="{{ asset('js/modo_escuro.js') }}" defer></script>
    <script src="{{ asset('js/limiteTexto.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <title>Cadastro</title>
</head>

<body>

    <div class="main_gradiente">
        <div class="main">
            <div class="left">
                <div class="logo-header">

                    <h1 class="logo"><a href="{{ route('index') }}"> Fox<span class="foxserv">Serv</span></a></h1>
                    <div class="modo_escuro">
                        <input type="checkbox" name="change-theme" id="change-theme" />
                        <label for="change-theme">
                            <i class="bi bi-sun"></i>
                            <i class="bi bi-moon"></i></label>
                    </div>
                </div>
                <form action="{{ route('cadastro.store') }}" method="POST">
    @csrf
    <label for="typeServiceId">Categoria</label>
    <select name="typeServiceId[]" id="typeServiceId">
        <option value="" selected disabled>Escolha a Categoria</option>
        @foreach($serviceType as $type)
            <option value="{{ $type->serviceType }}">{{ $type->serviceTypeName }}</option>
        @endforeach
    </select>

    <label for="serviceId">Subcategoria</label>
    <select name="serviceid[]" id="serviceId">
        <option value="" selected disabled>Escolha a Subcategoria</option>
        
    </select>

    <label for="description">Descrição</label>
    <textarea name="description" maxlength="100"></textarea>

    <input type="hidden" name="userId" value="{{ auth()->user()->id }}">

    <button type="submit" class="btn-login">Cadastrar</button>
</form>
                
            </div>
            <div class="right">
                <img src="image/cadastro-modoClaro.png" class="img-right-modoClaro"> <!-- mudar a imagem em 'src' -->
                <img src="image/cadastro-modoEscuro.png" class="img-right-modoEscuro">
            </div>
        </div>
    </div>
	<script src="{{ asset('js/subcategorias.js') }}"></script>
</body>
</html>