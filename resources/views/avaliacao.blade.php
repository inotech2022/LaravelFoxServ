
@extends('layouts.cadastro')

    @section('title', 'Avaliação do Profissional')
    
<link rel="stylesheet" href="{{ asset('css/avaliacao.css') }}">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    @section('content')
            <form class="card-form" action="{{ route('avaliacao') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h1>Avalie o profissional</h1>
                <p>Sua avaliação estará visível para outras pessoas verem</p>
                <div class="linha">
                    <div class="textfield">
                    <label for="avaliacao">Avaliação <span class="required"> * </span></label>
                <div class="estrelas">
                    <input type="radio" id="vazio" name="estrela" value="" checked>

                    <label for="estrela_um"><i class="fa"></i></label>
                    <input type="radio" id="estrela_um" name="estrela" value="1">

                    <label for="estrela_dois"><i class="fa"></i></label>
                    <input type="radio" id="estrela_dois" name="estrela" value="2">

                    <label for="estrela_tres"><i class="fa"></i></label>
                    <input type="radio" id="estrela_tres" name="estrela" value="3">

                    <label for="estrela_quatro"><i class="fa"></i></label>
                    <input type="radio" id="estrela_quatro" name="estrela" value="4">

                    <label for="estrela_cinco"><i class="fa"></i></label>
                    <input type="radio" id="estrela_cinco" name="estrela" value="5"><br><br>

                </div>
                </div>
                </div>
                <div class="linha">
                    <div class="input-box">
                        <label for="comentario">Comentário <span class="required"> * </span></label>
                        <textarea name="comentario" placeholder="Comentário referente à avaliação" required maxlength="100"></textarea>

                        <div class="characters">
                          <span class="min_num">0</span>
                          <span class="limit_num">/100</span>
                        </div>
                      </div>
               </div>
               <input type="hidden" name="protocol" value="{{ request('protocol') }}">

                <div class="botao">
                    <input type="submit" name="submit" class="btn-login" id="submit" value="Avaliar">
                </div>

                <a class="voltar" href="{{ route('contratoUsuario') }}">Voltar</a>
            </form>
        </div>
        <div class="right">
            <img src="image/avaliaçao-modoClaro.png" class="img-right-modoClaro">
            <img src="image/avaliaçao-modoEscuro.png" class="img-right-modoEscuro">
        </div>
    </div>
@endsection
