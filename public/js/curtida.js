function curtir(idPublicacao) {
    var coracao = document.getElementById('coracao_' + idPublicacao);
    var contador = document.getElementById('contador_' + idPublicacao);
    var estaCurtido = coracao.classList.contains('ativo');

    // Se a postagem está curtida, então descurtir
    if (estaCurtido) {
        // Remover a classe 'ativo' do coração
        coracao.classList.remove('ativo');

        // Enviar uma requisição AJAX para remover a curtida no servidor
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "remover_curtida.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Atualizar o contador de curtidas na interface
                contador.innerHTML = xhr.responseText;
            }
        }
        xhr.send("idPublicacao=" + idPublicacao);
    } else { // Se não está curtido, então curtir
        // Adicionar a classe 'ativo' ao coração
        coracao.classList.add('ativo');

        // Enviar uma requisição AJAX para adicionar a curtida no servidor
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "adicionar_curtida.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Atualizar o contador de curtidas na interface
                contador.innerHTML = xhr.responseText;
            }
        }
        xhr.send("idPublicacao=" + idPublicacao);
    }
}
