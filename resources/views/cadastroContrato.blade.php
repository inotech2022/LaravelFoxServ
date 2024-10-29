    @extends('layouts.cadastro')

    @section('title', 'Novo Contrato')
    @section('cadastro', 'Cadastro de Contrato')
    @section('content')

        <h2>Preencha os campos para gerar o contrato do serviço</h2>
        
        <form action="{{ route('contratos.store') }}" method="POST">
        @csrf
            <div class="linha">
                <div class="textfield">
                    <label for="cpf">CPF do Cliente <span class="required"> * </span></label>
                    <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00" required>
                </div>
            </div>

            <div class="linha">
            <div class="textfield">
                    <label for="idServico">Serviço Realizado <span class="required"> * </span></label>
                    <select name="idServico" id="idServico" size="1" required>
                        <option value="" selected disabled>Escolha o serviço</option>
                        @foreach($servicos as $servico)
                            <option value="{{ $servico->serviceId }}">{{ $servico->serviceName }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="textfield">
                    <label for="valor">Valor do Serviço </label>
                    <input type="text" name="valor" id="valor" placeholder="Digite o valor" required>
                </div>
            </div>

            <div class="linha">
                <div class="textfield">
                    <label for="dataInicial">Data inicial <span class="required"> * </span></label>
                    <input type="date" name="dataInicial" id="dataInicial" required>
                </div>
                
                <div class="textfield">
                    <label for="dataFinal">Data final <span class="required"> * </span></label>
                    <input type="date" name="dataFinal" id="dataFinal" required>
                </div>
            </div>

            <div class="linha">
                <div class="input-box">
                    <label for="descricao">Descrição <span class="required"> * </span></label>
                    <textarea name="descricao" id="descricao" placeholder="Descreva serviço realizado..." required maxlength="100"></textarea>
                    <div class="characters">
                        <span class="min_num">0</span>
                        <span class="limit_num">/100</span>
                    </div>
                </div>
            </div>

            <div class="botao">
            <input type="submit" name="submit" class="btn-login" id="submit" value="Cadastrar">
        </div>

            <a class="voltar" href="{{ route('contratoProfissional.index') }}">Voltar</a>
        </form>

    @endsection
