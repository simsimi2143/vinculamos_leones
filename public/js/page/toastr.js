"use strict";
var usuarioNombre = document.getElementById('usuario-nombre').textContent;
$("#toastr-1").click(function () {
  iziToast.info({
    title: 'Hola Jorge!',
    message: 'Un agrado volver a verte',
    position: 'topRight'
  });
});

$("#toastr-2").on("customEvent", function () {
    iziToast.success({
      title: 'Hola ' + usuarioNombre + '!',
      message: 'Un agrado volver a verte',
      position: 'topRight'
    });

    $(this).off("customEvent"); // Desasociar el evento después del primer uso
  });

  $("#toastr-2").trigger("customEvent"); // Disparar el evento personalizado

$("#toastr-3").click(function () {
  iziToast.warning({
    title: 'Hello, world!',
    message: 'This awesome plugin is made by iziToast',
    position: 'topRight'
  });
});

$("#toastr-4").click(function () {
  iziToast.error({
    title: 'Hello, world!',
    message: 'This awesome plugin is made by iziToast',
    position: 'topRight'
  });
});

$("#toastr-5").click(function () {
  iziToast.show({
    title: 'Hello, world!',
    message: 'This awesome plugin is made by iziToast',
    position: 'bottomRight'
  });
});

$("#toastr-6").click(function () {
  iziToast.show({
    title: 'Hello, world!',
    message: 'This awesome plugin is made by iziToast',
    position: 'bottomCenter'
  });
});

$("#toastr-7").click(function () {
  iziToast.show({
    title: 'Hello, world!',
    message: 'This awesome plugin is made by iziToast',
    position: 'bottomLeft'
  });
});

$("#toastr-8").click(function () {
  iziToast.show({
    title: 'Hello, world!',
    message: 'This awesome plugin is made by iziToast',
    position: 'topCenter'
  });
});
