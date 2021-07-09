$(filtrar_codigo());

function filtrar_codigo(codigo_alumno) {
$.ajax({
    url: 'buscarNombreAlumno.php',
    type: 'POST',
    datatype: 'html',
    data: {codigo_alumno: codigo_alumno},
})
.done(function(resultado) {
    $("#input_alumno").html(resultado);
})
}

$(document).on('keyup', '#codigo_alumno', function(){
    var valor = $(this).val();
    if (valor != "") {
        filtrar_codigo(valor);
    } else {
        filtrar_codigo();
    }
});

