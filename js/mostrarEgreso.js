$(buscar_egreso());

function buscar_egreso(busqueda) {
	$.ajax({
		url: 'buscarEgreso.php',
		type: 'POST',
		datatype: 'html',
		data: {busqueda: busqueda},
	})
	.done(function(resultado) {
		$("#resultado_egreso").html(resultado);
	})
}

$(document).on('keyup', '#busqueda', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_egreso(valor);
	} else {
		buscar_egreso();
	}
});

