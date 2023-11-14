$(document).ready(function() {
    cargarSubgrupos();
})


function cargarSubgrupos() {
    $('#grupo').on('change', function() {
        $.ajax({
            url:`${window.location.origin}/admin/socios/listar-subgrupos` ,
            type: 'POST',
            dataType: 'json',
            data: {
                grin_codigo: $('#grupo').val()
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                $('#subgrupo').empty();
                $.each(data, function(key, value) {
                    $('#subgrupo').append(
                        `<option value="${value.sugr_codigo}">${value.sugr_nombre}</option>`
                    );
                });
            }
        });

    })
}
