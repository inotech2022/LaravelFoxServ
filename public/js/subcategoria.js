$(document).on('change', '#serviceTypeId', function() {
    let serviceTypeId = $(this).val();
    $.ajax({
        url: '/get-subcategorias/' + serviceTypeId,
        method: 'GET',
        success: function(data) {
            let subcategoriaOptions = '<option value="" selected disabled>Escolha a Subcategoria</option>';
            data.forEach(function(subcategoria) {
                subcategoriaOptions += `<option value="${subcategoria.serviceId}">${subcategoria.ServiceName}</option>`;
            });
            $('#serviceId').html(subcategoriaOptions);
        }
    });
});
