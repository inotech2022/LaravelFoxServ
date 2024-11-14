<script>
    document.querySelectorAll('.favorite-button').forEach(button = {
        button.addEventListener('click', function() {
            const publicationId = this.getAttribute('data-id');

            fetch(`/perfil-profissional/add-favorite`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ publicationId })
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                location.reload();
            })
            .catch(error => console.error('Erro:', error));
        });
    });
</script>
