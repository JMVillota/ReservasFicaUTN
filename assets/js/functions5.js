$(function() {

    // Lista de Continentes
    $.post('../view/select/Carreras.php').done(function(respuesta) {
        $('#Carreras').html(respuesta);
    });
})