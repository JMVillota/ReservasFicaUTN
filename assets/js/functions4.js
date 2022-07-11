$(function() {
    // Lista de Lugares
    $.post('../view/select/Lugares.php').done(function(respuesta) {
        $('#Lugares').html(respuesta);
    });
})

$(function() {
    // Lista de Eventos
    $.post('../view/select/EventoTipo.php').done(function(respuesta) {
        $('#EventoTipo').html(respuesta);
    });
})

$(function() {
    // Lista de Carreras
    $.post('../view/select/Carreras.php').done(function(respuesta) {
        $('#Carreras').html(respuesta);
    });
})

$(function() {
    // Lista de Eventos
    $.post('../view/select/EditarEvento.php').done(function(respuesta) {
        $('#EditarEvento').html(respuesta);
    });
})