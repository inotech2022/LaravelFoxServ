@extends('layouts.cadastro')

@section('title', 'Novo Contrato')
@section('cadastro', 'Cadastro de Contrato')
@section('content')
                <h2>Preencha os campos para gerar o contrato do serviço</h2>
                <div class="linha">
                    <div class="textfield">
                        <label for="cpf">CPF do Cliente <span class="required"> * </span></label>
                        <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00">
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
                        <label for="valor">Valor do Serviço </label>
                        <input type="text" name="valor" id="valor" placeholder="Digite o valor">
                    </div>
                </div>
                <div class="linha">
                    <div class="textfield">
                        <label for="dataInicial">Data inicial <span class="required"> * </span></label>
                        <input type="date" name="dataInicial" id="dataInicial" placeholder="00/00/0000" required>
                    </div>
                    <div class="textfield">
                        <label for="dataFinal">Data final <span class="required"> * </span></label>
                        <input type="date" name="dataFinal" id="dataFinal" placeholder="00/00/0000" required>
                    </div>
                </div>
                <div class="linha">
                    <div class="input-box">
                        <label for="descricao">Descrição <span class="required"> * </span></label>
                        <textarea name="descricao" id="descricao" placeholder="Descreva serviço realizado... " required maxlength="100"></textarea>

                        <div class="characters">
                          <span class="min_num">0</span>
                          <span class="limit_num">/100</span>
                        </div>
                      </div>

                </div>

                <div class="botao">
                    <input type="submit" name="submit" class="btn-login" id="submit" value="Cadastrar"></input>
                </div>

                <a class="voltar" href="contratos.php">Voltar</a>


            @endsection
