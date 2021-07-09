$(buscar_ingresos());

function buscar_ingresos(busqueda) {
	$.ajax({
		url: 'buscarIngreso.php',
		type: 'POST',
		datatype: 'html',
		data: {busqueda: busqueda},
	})
	.done(function(resultado) {
		$("#resultado_ingreso").html(resultado);
	})
}

$(document).on('keyup', '#busqueda', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_ingresos(valor);
	} else {
		buscar_ingresos();
	}
});

