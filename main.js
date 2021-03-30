$(buscar_datos());

function buscar_datos(consulta) {
  $.ajax({
    url: 'find.php',
    type: "POST",
    dataType: "html",
    data: { consulta: consulta },
  })
    .done(function (respuesta) {
      $("#tabla_resultado").html(respuesta);
    })
    .fail(function () {
      console.log("error");
    });
}


$(document).on("keyup", "#busqueda", function () {
  var valor = $(this).val();
  if (valor != "") {
    buscar_datos(valor);
  } else {
    buscar_datos();
  }
});


