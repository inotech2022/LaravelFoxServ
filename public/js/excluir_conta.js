function excluirConta(idUsuario, idProfissional) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4) { 
            console.log('Status:', this.status); 
            console.log('Response:', this.responseText); 

            if (this.status == 200) { 
                if (this.responseText.trim() === "Conta excluída com sucesso!") {
                    window.location.href = "login.php"; 
                } else {
                    alert("Erro: " + this.responseText); 
                }
            } else {
                alert("Erro na requisição: " + this.status); 
            }
        }
    };
    xhttp.open("GET", "excluir_conta.php?idUsuario=" + idUsuario + "&idProfissional=" + idProfissional, true);
    xhttp.send();
}
