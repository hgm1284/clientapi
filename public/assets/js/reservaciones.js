$(document).ready(function() {
  initCalendar();
  cargarRecintos();
  cargarAulas();
  setCalendarBtnListener();
});

function setCalendarBtnListener() {
  $('#ver-calendario').click(function(){
    var periodoId = $("#periodos").val();
    var sedeId    = $("#sedes").val();
    var recintoId = $("#recintos").val();
    var aulaId    = $("#aulas").val();
    if(periodoId && sedeId && recintoId && aulaId) {
      alert('Informacion completa');
    } else {
      alert('Informacion incompleta');
    }
  });
}

function cargarRecintos() {
  $('#sedes').change(function(e) {
    $('#recintos').empty();
    $('#aulas').empty();
    var sedeId = $("#sedes").val();
    if(sedeId) {
      $.getJSON( "/sedes/"+ sedeId + "/recintos")
      .done(function(response) {
        var options = '<option disabled selected value> -- Seleccione un Recinto -- </option>';
        $.each(response.recintos, function(key, recinto) {
          options += "<option value='" + recinto.id + "'>" + recinto.nombre + "</option>";
        });
        $("#recintos").append(options);
      })
      .fail(function(error) {
        console.log( error);
      });
    }
  });
}

function cargarAulas() {
  $('#recintos').change(function(e) {
    $('#aulas').empty();
    var recintoId = $("#recintos").val();
    if(recintoId) {
      $.getJSON( "/recintos/"+ recintoId + "/aulas")
      .done(function(response) {
        var options = '<option disabled selected value> -- Seleccione un Aula -- </option>';
        $.each(response.aulas, function(key, aula) {
          options += "<option value='" + aula.id + "'>" + aula.descripcion + "</option>";
        });
        $("#aulas").append(options);
      })
      .fail(function(error) {
        console.log( error);
      });
    }
  });
}

function initCalendar(){
  $('#calendar').fullCalendar(
    {
      lang: 'es',
      header: {
        left:   'title',
        center: '',
        right:  'today prev,next'
      },
      allDaySlot: false,
      eventOverlap: false,
      defaultView: 'agendaWeek',
      editable: true,


      minTime: '08:00:00',
      maxTime: '21:30:00',
      events: [
        {
          id: 999,
          title: 'Repeating Event',
          start: '2016-04-09T16:00:00'
        },
        {
          id: 999,
          title: 'Repeating Event',
          start: '2016-04-16T16:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2016-04-28'
        }
      ],


      defaultTimedEventDuration: '00:30:00',
      dayClick: function(date, jsEvent, view) {
        var descripcion = prompt("Ingrese una descripción corta para la reservación", '');
        if (descripcion) {
          view.calendar.renderEvent({
            title: descripcion,
            start: date.format(),
          });
        }
      },
      eventResize: function(event, delta, revertFunc) {
        console.log(event.title + " end is now " + event.end.format());
      },
      eventDrop: function(event, delta, revertFunc) {
        console.log(event.title + " was dropped on " + event.start.format());
      }
    });
  }
