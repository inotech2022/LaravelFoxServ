@extends('layouts.header')

@section('title', 'Política de Privacidade')
@section('css')
<link rel="stylesheet" href="{{ asset('css/politica.css') }}">
@endsection

@section('content')
<main>
    <div class="privacy-policy">
        <h2>POLÍTICA DE PRIVACIDADE – FOXSERV</h2>
        <p>
            Sua privacidade é importante para a FoxServ e estamos comprometidos em protegê-la. O objetivo desta Política de Privacidade é explicar como tratamos os seus dados pessoais. Recomendamos que leia este documento com atenção antes de utilizar nossos serviços.
        </p>
        
        <h2>1. Coleta de dados</h2>
        
        <h3>1.1. Dados fornecidos pelo usuário:</h3>
        <p>
            Ao se registrar ou utilizar os serviços da FoxServ, coletamos informações fornecidas voluntariamente por você, como:
        </p>
        <ul>
            <li>Nome completo;</li>
            <li>CPF;</li>
            <li>Data de nascimento;</li>
            <li>Telefone;</li>
            <li>Endereço postal;</li>
            <li>Endereço de e-mail;</li>
            <li>Outras informações relevantes para a contratação de serviços.</li>
        </ul>

        <h3>1.2. Dados coletados automaticamente:</h3>
        <p>
            Durante a navegação no site ou uso de nossos serviços, coletamos automaticamente:
        </p>
        <ul>
            <li>Endereço IP;</li>
            <li>Localização geográfica aproximada;</li>
            <li>Tipo e versão do navegador;</li>
            <li>Páginas visitadas;</li>
            <li>Tempo de permanência em cada página;</li>
            <li>Outras informações técnicas para fins de melhoria dos serviços.</li>
        </ul>
        <p>Esses dados podem ser coletados por tecnologias como cookies e ferramentas semelhantes.</p>

        <h2>2. Finalidade da coleta de dados</h2>
        <p>A FoxServ utiliza seus dados para:</p>
        <ul>
            <li>Fornecer, gerenciar e melhorar nossos serviços;</li>
            <li>Permitir que você divulgue seus serviços como profissional autônomo;</li>
            <li>Enviar comunicações importantes, como alterações nos termos de serviço;</li>
            <li>Garantir a segurança e integridade de nossas plataformas;</li>
            <li>Realizar auditorias, análises e pesquisas internas;</li>
            <li>Cumprir obrigações legais e regulatórias;</li>
            <li>Oferecer suporte ao cliente.</li>
        </ul>

        <h2>3. Compartilhamento de dados</h2>
        <p>A FoxServ não vende, aluga ou comercializa seus dados pessoais. Poderemos compartilhar suas informações apenas nas seguintes situações:</p>
        <ul>
            <li><strong>Com fornecedores e parceiros:</strong> para viabilizar os serviços contratados, como provedores de hospedagem e suporte técnico;</li>
            <li><strong>Por obrigações legais:</strong> quando exigido por lei ou por autoridade competente;</li>
            <li><strong>Para proteção de direitos:</strong> quando necessário para proteger os direitos, a segurança ou a propriedade da FoxServ, de seus usuários ou terceiros.</li>
        </ul>

        <h2>4. Proteção dos dados pessoais</h2>
        <p>
            Adotamos medidas técnicas e organizacionais para proteger seus dados contra acesso não autorizado, alteração, divulgação ou destruição. Entre essas medidas estão:
        </p>
        <ul>
            <li>Uso de criptografia para transmissão de dados sensíveis;</li>
            <li>Controle de acesso restrito aos dados;</li>
            <li>Treinamento de nossos colaboradores em boas práticas de segurança da informação.</li>
        </ul>
        <p>
            Embora nos esforcemos para proteger seus dados, nenhum sistema é completamente seguro. Recomendamos que você também adote medidas de segurança, como o uso de senhas fortes e não compartilhá-las.
        </p>

        <h2>5. Retenção de dados</h2>
        <p>
            Manteremos seus dados pessoais pelo período necessário para cumprir as finalidades descritas nesta Política, a menos que um prazo maior seja exigido por lei. Você pode solicitar a exclusão de seus dados a qualquer momento, salvo quando houver obrigações legais ou contratuais que nos impeçam de atendê-lo.
        </p>

        <h2>6. Direitos dos usuários</h2>
        <p>Você tem os seguintes direitos em relação aos seus dados pessoais:</p>
        <ul>
            <li>Solicitar acesso aos dados que coletamos;</li>
            <li>Corrigir dados incorretos ou desatualizados;</li>
            <li>Solicitar a exclusão de seus dados, quando aplicável;</li>
            <li>Revogar o consentimento para o uso de dados pessoais.</li>
        </ul>
        <p>Para exercer esses direitos, entre em contato conosco pelos canais de atendimento disponíveis no site.</p>

        <h2>7. Uso de cookies</h2>
        <p>
            Utilizamos cookies para melhorar sua experiência de navegação. Você pode gerenciar ou desativar cookies diretamente nas configurações do seu navegador, mas isso pode afetar algumas funcionalidades do site.
        </p>

        <h2>8. Alterações nesta política</h2>
        <p>
            Esta Política de Privacidade pode ser alterada periodicamente. Recomendamos que você revise este documento regularmente para se manter atualizado sobre como protegemos seus dados.
        </p>

        <h2>9. Contato</h2>
        <p>
            Caso tenha dúvidas ou preocupações sobre esta Política de Privacidade, entre em contato conosco pelo e-mail <strong>suporte@foxserv.com</strong> ou pelo nosso canal de atendimento no site.
        </p>

        <p><strong>Data de atualização:</strong> [Inserir data mais recente de atualização]</p>
        <p>Agradecemos por confiar na FoxServ.</p>
    </div>
</main>
@endsection

@section('footer')
@include('layouts.footer')
@endsection
