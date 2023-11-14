$('#modalEditarEvidencia').on('hidden.bs.modal', function () {
    $('#inev_nombre_edit').val('');
    $('#inev_descripcion_edit').val('');
    $('#form-editar-evidencia').attr('action', '');
});

function agregar() {
    $('#modalAgregarEvidencia').modal('show');
}

function editar(inev_codigo, inev_nombre, inev_descripcion) {
    $('#inev_nombre_edit').val(inev_nombre);
    $('#inev_descripcion_edit').val(inev_descripcion);
    $('#form-editar-evidencia').attr('action', window.location.origin+'/admin/iniciativa/evidencia/'+inev_codigo);
    $('#modalEditarEvidencia').modal('show');
}