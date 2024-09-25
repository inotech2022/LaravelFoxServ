function excluirConta(idUsuario, idProfissional) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) { // Verifica se a requisição foi concluída
            console.log('Status:', this.status); // Log do status da requisição
            console.log('Response:', this.responseText); // Log da resposta do servidor

            if (this.status == 200) { // Verifica se a requisição foi bem-sucedida
                if (this.responseText.trim() === "Conta excluída com sucesso!") {
                    window.location.href = "login.php"; // Redireciona para a página de login
                } else {
                    alert("Erro: " + this.responseText); // Exibe mensagem de erro
                }
            } else {
                alert("Erro na requisição: " + this.status); // Exibe código de status se a requisição falhar
            }
        }
    };
    xhttp.open("GET", "excluir_conta.php?idUsuario=" + idUsuario + "&idProfissional=" + idProfissional, true);
    xhttp.send();
}
