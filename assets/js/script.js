var calendar;
var Calendar = FullCalendar.Calendar;
var events = [];
$(function() {
    if (!!schedsc) {
        Object.keys(schedsc).map(k => {
            var row = schedsc[k]
            events.push({ id: row.reservacion_id, title: row.nombre_evento, start: row.fecha_inicio, end: row.fecha_fin });
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
            if (!!schedsc[id]) {

                _details.find('#fecha_inicio').text(schedsc[id].sdate)
                _details.find('#fecha_fin').text(schedsc[id].edate)
                _details.find('#nombre_evento').text(schedsc[id].nombre_evento)
                _details.find('#descripcion_evento').text(schedsc[id].descripcion_evento)
                _details.find('#nombre_departamento').text(schedsc[id].nombre_departamento)
                _details.find('#apellidos_responsable').text(schedsc[id].apellidos_responsable)
                _details.find('#nombres_responsable').text(schedsc[id].nombres_responsable)
                _details.find('#estado_reservacion').text(schedsc[id].estado_reservacion)
                _details.find('#estado_evento').text(schedsc[id].estado_evento)
                _details.find('#nombre_lugar').text(schedsc[id].nombre_lugar)
                    // _details.find('#edit,#delete').attr('data-id', id)
                _details.modal('show')
            } else {
                alert("Event is undefined");
            }
        },

        editable: false
    });

    calendar.render();
})