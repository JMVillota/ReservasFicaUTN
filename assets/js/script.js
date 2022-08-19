var calendar;
var Calendar = FullCalendar.Calendar;
var events = [];
$(function() {
    if (!!scheds) {
        Object.keys(scheds).map(k => {
            var row = scheds[k]
            events.push({ id: row.reservacion_id, title: row.descripcion_evento, start: row.fecha_inicio, end: row.fecha_fin });
        })
    }
    var date = new Date()
    var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear()

    calendar = new Calendar(document.getElementById('calendar'), {
        locale: 'es',
        headerToolbar: {
            left: 'prev,next today',
            right: 'dayGridMonth,dayGridWeek,list',
            center: 'title',
        },
        selectable: false,
        themeSystem: 'bootstrap',
        //Random default events
        events: events,
        eventClick: function(info) {

            var _details = $('#event-details-modal')
            var id = info.event.id
            if (!!scheds[id]) {

                _details.find('#fecha_inicio').text(scheds[id].sdate)
                _details.find('#fecha_fin').text(scheds[id].edate)
                _details.find('#nombre_evento').text(scheds[id].nombre_evento)
                _details.find('#descripcion_evento').text(scheds[id].descripcion_evento)
                _details.find('#nombre_departamento').text(scheds[id].nombre_departamento)
                _details.find('#apellidos_responsable').text(scheds[id].apellidos_responsable)
                _details.find('#nombres_responsable').text(scheds[id].nombres_responsable)
                _details.find('#estado_reservacion').text(scheds[id].estado_reservacion)
                _details.find('#estado_evento').text(scheds[id].estado_evento)
                _details.find('#nombre_lugar').text(scheds[id].nombre_lugar)
                    // _details.find('#edit,#delete').attr('data-id', id)
                _details.modal('show')
            } else {
                alert("Event is undefined");
            }
        },
        eventDidMount: function(info) {
            // Do Something after events mounted
        },
        editable: false
    });

    calendar.render();
})