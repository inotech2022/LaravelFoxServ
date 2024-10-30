@extends('layouts.cadastro')

    @section('title', 'Novo Contrato')
    @section('cadastro', 'Editar Contrato')
    @section('content')
            <form class="card-form" action="{{ route('editarContrato') }}" method="POST" enctype="multipart/form-data" >
                
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
                            @foreach($servicos as $servico)
                            <option value="{{ $servico->serviceId }}">{{ $servico->serviceName }}</option>
                        @endforeach
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

    @endsection