<script>
    $(function () {
      var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        m = m + 1;
      //Date picker medico
      $('#datepicker').datepicker({
        autoclose: true,
        minDate: new Date(2007,1 - 1, 1),
        
      })
      $('#datepicker1').datepicker({
        autoclose: true,
        startDate: new Date(y, m - 1 , d + 1)
      })
      //Timepicker
      $('.timepicker').timepicker({
        showInputs: false,
      })
      //$('[data-mask]').inputmask()
        /* initialize the calendar
          -----------------------------------------------------------------*/
        //Date for the calendar events (dummy data)
                
      $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'hoy',
        month: 'mes',
        week : 'semana',
        day  : 'dia'
      },events : [],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function (date, allDay) { // this function is called when something is dropped

      // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

      // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
          copiedEventObject.start           = date
          copiedEventObject.allDay          = allDay
          copiedEventObject.backgroundColor = $(this).css('background-color')
          copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }
      }
    })      
  })
  </script>