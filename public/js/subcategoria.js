
$(document).ready(function() {
    function loadSubcategories(selectElement, targetSelect) {
        const typeServiceId = $(selectElement).val();
        if (typeServiceId) {
            $(targetSelect).empty().append('<option value="" selected disabled>Escolha a Subcategoria</option>'); // Limpa e adiciona opção padrão
            $('.carregando' + targetSelect.slice(-1)).show(); 

            $.ajax({
                url: '/subcategorias/' + typeServiceId,
                method: 'GET',
                success: function(data) {
                    $.each(data, function(index, subcategory) {
                        $(targetSelect).append('<option value="' + subcategory.id + '">' + subcategory.serviceName + '</option>');
                    });
                },
                complete: function() {
                    $('.carregando' + targetSelect.slice(-1)).hide();
                }
            });
        }
    }

    $('#typeServiceId1').change(function() {
        loadSubcategories(this, '#serviceId1');
    });
    $('#typeServiceId2').change(function() {
        loadSubcategories(this, '#serviceId2');
    });
    $('#typeServiceId3').change(function() {
        loadSubcategories(this, '#serviceId3');
    });
});
