$(buscar_monto());

function buscar_monto(opcion) {
	$.ajax({
		url: 'buscarMontoConcepto.php',
		type: 'POST',
		datatype: 'html',
		data: {opcion: opcion},
	})
	.done(function(resultado) {
		$("#input_monto").html(resultado);
	})
}

$(document).on('change', '#opcion_concepto', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_monto(valor);
	} else {
		buscar_monto();
	}
});

