$(function() {

    // Lista de Continentes
    $.post('../view/select/Lugares.php').done(function(respuesta) {
        $('#Lugares').html(respuesta);
    });
})

$(function() {

    // Lista de Continentes
    $.post('../view/select/EventoTipo.php').done(function(respuesta) {
        $('#EventoTipo').html(respuesta);
    });
})
$(function() {

    // Lista de Continentes
    $.post('../view/select/Carreras.php').done(function(respuesta) {
        $('#Carreras').html(respuesta);
    });
})