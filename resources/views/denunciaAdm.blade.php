@extends('layouts.header')

@section('title', 'Central do Administrador')
@section('css')
<link href="https://fonts.googleapis.com/css?family=Baloo+Thambi+2&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('/css/denunciaAdm.css') }}">
<link rel="icon" href="logo/lilas-2.PNG">
@endsection

@section('content')
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
        window.location.href = "/centralAdministrador";
    }
});

</script>
@endif
<div class="denuncias">
    <h1 class="tit-denuncia">Denúncias</h1>
    <div class="conteudo">
        <div class="left">
            <!-- Dados do profissional -->
            <div class="card-prof">
                <div class="header-prof">
                    <img src="/{{ $professional->profilePic }}" alt="Foto do Profissional">
                    <h1>{{ $professional->name }} {{ $professional->lastName }}</h1>
                </div>
                <div class="info-prof">
                    <div class="pessoais">
                        <p>Idade: {{ $professional->age }}</p>
                        <p>Telefone: {{ $professional->phone }}</p>
                        <p>Email: {{ $professional->email }}</p>
                    </div>
                    <div class="prof">
                        <p>Tipo de Serviço: {{ $professional->serviceTypeName }}</p>
                        <p>Serviço: {{ $professional->serviceName }}</p>
                    </div>
                </div>
            </div>

            <!-- Avaliações recebidas -->
           <h2>Avaliações Recebidas</h2>
                <div class="card-aval">
                @foreach ($ratings as $rating)
                    <div class="header-aval">
                        <img src="/{{ $rating->profilePic }}" alt="Foto do Cliente">
                        <div class="info-aval">
                            <h1>{{ $rating->name }} {{ $rating->lastName }}</h1>
                            <div class="info-2">
                                <p>{{ \Carbon\Carbon::parse($rating->ratingDate)->format('d/m/Y') }}</p>
                                <div class="estrela">
                                    <ul class="estrela-av">
                                        @for ($j = 1; $j <= 5; $j++)
                                            @if ($j <= $rating->starAmount)
                                                <li class="star-icon ativo" data-avaliacao="{{ $j }}"><i class="fa fa-star"></i></li>
                                            @else
                                                <li class="star-icon" data-avaliacao="{{ $j }}"><i class="fa fa-star-o"></i></li>
                                            @endif
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="aval">
                        <p>{{ $rating->comment }}</p>
                    </div>
                    @endforeach

                </div>
        </div>

        <div class="right">
            <h2>Denúncias Recebidas</h2>
            <div class="titulos">
                <label class="txt_codigo">Código</label>
                <label class="txt_usuario">Usuário</label>
                <label class="txt_sugestao">Denúncia</label>
            </div>
            @foreach ($complaints as $complaint)
                <div class="campos">
                    <input class="codigo" type="text" value="{{ $complaint->complaintId }}" disabled>
                    <input class="usuario" type="text" value="{{ $complaint->name }} {{ $complaint->lastName }}" disabled>
                    <input class="denuncia" type="text" value="{{ $complaint->reason }}" disabled>
                </div>
            @endforeach

            <div class="btnDenuncia">
                <button onclick="window.location.href='mailto:{{ $professional->email }}'" 
                class="contato">Comunicar Profissional</button>
                <form action="{{ route('banir.profissional', ['id' => $professional->professionalId]) }}" method="POST" onsubmit="return confirm('Você tem certeza que deseja banir este profissional?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="banir">Banir Profissional</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
@section('footer')
@endsection
