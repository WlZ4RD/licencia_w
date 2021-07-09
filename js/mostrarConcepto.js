$(buscar_concepto());

function buscar_concepto(busqueda) {
	$.ajax({
		url: 'buscarConceptoMostrar.php',
		type: 'POST',
		datatype: 'html',
		data: {busqueda: busqueda},
	})
	.done(function(resultado) {
		$("#resultado_concepto").html(resultado);
	})
}

$(document).on('keyup', '#buscar_concepto', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_concepto(valor);
	} else {
		buscar_concepto();
	}
});

