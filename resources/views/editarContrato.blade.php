@extends('layouts.cadastro')

    @section('title', 'Novo Contrato')
    
    <link rel="stylesheet" href="{{ asset('css/cad_servico.css') }}">
    @section('content')
            <form class="card-form" action="{{ route('editarContrato') }}" method="POST" enctype="multipart/form-data" >
            <h1>Editar Contrato</h1>
                <h2>Altere os campos que você deseja atualizar </h2>
                <div class="linha">
                    <div class="textfield">
                        <label for="nome">Cliente</label>
                        <input type="text" id="nome" name="nome" placeholder="000.000.000-00"value = "" disabled>
                    </div>

                </div>
                <div class="linha">
                   <div class="textfield">
                            <label for="idServico">Serviço Realizado <span class="required"> * </span></label>
                            <select name="idServico" id="idServico" size="1">
                            <option value="" selected disabled>Escolha o serviço</option>
                            
</select>

                        </div>
                    <div class="textfield">
                        <label for="valor">Valor do Serviço</label>
                        <input type="text" name="valor" placeholder="Digite o valor"value = "">
                    </div>
                </div>
                <div class="linha">
                    <div class="textfield">
                        <label for="data_serv">Data inicial</label>
                        <input type="date" name="dataInicial" id="data_serv_inicio"  value = ""required>
                    </div>
                    <div class="textfield">
                        <label for="data_serv">Data final</label>
                        <input type="date" name="dataFinal" id="data_serv_fim"  value = "" required>
                    </div>
                </div>
                <div class="linha">
                    <div class="input-box">
                        <label for="descricao">Descrição</label>
                        <textarea placeholder="Descreva serviço realizado..." name="descricao"required maxlength="100"></textarea>

                        <div class="characters">
                          <span class="min_num">0</span>
                          <span class="limit_num">/100</span>
                        </div>
                      </div>
                </div>

                <div class="linha">

                </div>

                <div class="botao">
                    <input type="submit" name="submit" class="btn-login" id="submit" value="Editar">
                </div>

                <a class="voltar" href="contratos.php">Voltar</a>


                </form>
        </div>
        <div class="right">
            <img src="image/novoServ-modoClaro.png" class="img-right-modoClaro">
            <img src="image/novoServ-modoEscuro.png" class="img-right-modoEscuro">
        </div>
    </div>

    @endsection