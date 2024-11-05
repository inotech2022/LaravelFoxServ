@extends('layouts.cadastro')

    @section('title', 'Editar Dados')
    
    <link rel="stylesheet" href="{{ asset('css/editarDados.css') }}">
    @section('content')

            <form class="card-form" action="{{ route('editarContrato') }}" method="POST" enctype="multipart/form-data" >

                <h1>Editar Dados</h1>
                <div class="linha">
                    <div class="textfield">
                        <label class="foto_perfil" for="foto_perfil">
                            <span class="text">Selecione uma imagem</span>
                            <span class="material-symbols-outlined">photo_camera
                                </span></label>
                        <input type="file" class="foto_perfil" id="foto_perfil" name="foto_perfil">
                    </div>

                    <script> document.querySelector('#foto_perfil').addEventListener('change', function(){
                        document.querySelector('.text').textContent = this.files[0].name;
                    }) </script>
                    <div class="textfield">
                        <label for="telefone">Telefone</label>
                        <input type="tel" id="phone" name="telefone" placeholder="+55 | 15 00000-0000" value="" >
                    </div>
                </div>
                <div class="linha">
                    <div class="textfield">
                        <label for="cep">CEP</label>
                        <input type="text" id="cep" name="cep" placeholder="00000-000" value="">
                    </div>
                    <div class="textfield">
                        <label for="uf">UF</label>
                        <input type="text" name="uf" id="uf" placeholder="uf" value="">
                    </div>
                    <div class="textfield">
                        <label for="cidade">Cidade</label>
                        <input type="text" name="cidade" id="cidade" placeholder="Cidade" required maxlength="50" value="">
                    </div>


                </div>
                <div class="linha">
                    <div class="textfield">
                        <label for="endereco">Bairro</label>
                        <input type="text" name="bairro" id="bairro"placeholder="Bairro" required maxlength="80" value="">
                    </div>
                    <div class="textfield">
                        <label for="endereco">Endereço</label>
                        <input type="text" name="endereco"id="endereco" placeholder="Endereço" required maxlength="80" value="" >
                    </div>
                    <div class="textfield">
                        <label for="bairro">Número</label>
                        <input type="text"  id="numero" name="numero" placeholder="00" value="">
                    </div>
                </div>
                <div class="linha">
                    <div class="input-box">
                        <label for="descricao">Descrição</label>
                        <textarea name="descricao" placeholder="Descrição dos serviços, habilidades, idiomas..." required maxlength="100"></textarea>

                        <div class="characters">
                          <span class="min_num">0</span>
                          <span class="limit_num">/100</span>
                        </div>
                      </div>
                </div>
                <div class="botao">
                    <input type="submit" name="submit" class="btn-login" id="submit" value="Editar">
                </div>

                <a class="voltar" href="FeedProf.php">Voltar</a>
            </form>
        </div>
        <div class="right">
            <img src="image/editarDados-modoClaro.png" class="img-right-modoClaro">
            <img src="image/editarDados-modoEscuro.png" class="img-right-modoEscuro">
        </div>
    </div>
    @endsection
