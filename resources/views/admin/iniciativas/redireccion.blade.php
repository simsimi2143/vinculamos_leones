@extends('admin.panel')
@section('contenido')
<div class="card">
    <div class="card-body">+
        <h4>Redireccionando...</h4>
    </div>
</div>
<script>
    // Esperar a que el documento esté completamente cargado
    document.addEventListener("DOMContentLoaded", function () {
        // Redirigir a la ruta deseada con el parámetro
        window.location.href = "{{ route('admin.evaluar.iniciativa2', ['inic_codigo' => $inic_codigo]) }}";
    });
</script>
@endsection
