@extends('layouts.cadastro')

    @section('title', 'Nova Publicação')
    
<link rel="stylesheet" href="{{ asset('css/novoPost.css') }}">
    @section('content')


    <script src="/js/novoPost.js" defer></script>
    <script src="/js/limiteTexto.js" defer></script>
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
        window.location.href = "/meuPerfil";
    }
});

</script>
@endif
   
    <form action="{{ route('novaPublicacao.store') }}" class="card-form" method="POST" enctype="multipart/form-data">
    @csrf
    <h1>Nova Publicação</h1>
    <div class="foto-publicacao">
        <label class="picture" for="picture__input" tabIndex="0">
            <span class="picture__image"></span>
        </label>
        <input type="file" name="image" id="picture__input">
    </div>
    <div class="linha">
        <div class="input-box">
            <label for="legenda">Descrição</label>
            <textarea name="caption" placeholder="Escreva a sua legenda..." required maxlength="100"></textarea>
            <div class="characters">
                <span class="min_num">0</span>
                <span class="limit_num">/100</span>
            </div>
        </div>
       
    </div>
    <div class="botao">
        <input type="submit" name="submit" class="btn-login" id="submit" value="Publicar">
    </div>
    <a class="voltar" href="{{ route('index') }}">Voltar</a>
</form>
        </div>
        <div class="right">
            <img src="https://foxservbucket.s3.us-east-1.amazonaws.com/novaPub-modoClaro.png" class="img-right-modoClaro">
            <img src="https://foxservbucket.s3.us-east-1.amazonaws.com/novaPub-modoEscuro.png" class="img-right-modoEscuro">
        </div>
    </div>


@endsection