<script>
    $(document).ready(function() {
        var obj = new Array();
        
    $('#calendar').fullCalendar('destroy');
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
      },
        events: function(start, end, timezone, callback) {
        var id_medico = $('#id_medico').val();
        if (id_medico == "") {
                return;
            }
        $.post('{{URL::to('/citas')}}',
            {
                '_token':'{{ csrf_token() }}',
                id_medico:id_medico
            },
            function(data){
            var events = [];
            var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();
                var hour = date.getHours();
                var minuts = date.getMinutes();
                m = m + 1;
            for (let i = 0; i < data.length; i++) {
                var color = '';
               
                var fecha = data[i]['fecha'].split('-');
                var id_cita = data[i]['id_cita'];
                var titulo = data[i]['motivo_cita'];
                var time = data[i]['hora'].split(':');
                var hora = time[0];
                var minutos = time[1].split(' ');
                var min = minutos[0];
                var id = id_cita+'_'+titulo;
                var id_event = String(id);
                if(minutos[1]==="PM"){
                    if(hora<12){
                    hora = Number(hora);
                    hora = hora+12;
                    }
                }
                hora = Number(hora);
                 
                var year = Number(fecha[0]);
                var month = Number(fecha[1]);
                var day = Number(fecha[2]);
                
                if( y == year && m == month && d > day  || 
                    y == year && m > month && d < day  || 
                    y == year && m == month && d == day && hour > hora
                ){
                        color = '#f56954';
                }else{
                    color = '#0073b7';
                }

                events.push({
                    id             : id_event,
                    url            : '/citas/'+ id_cita,
                    title          : titulo,
                    start          : new Date(year, month - 1 , day,hora,min),
                    backgroundColor: color,
                    borderColor    : color
                });
            };        
            callback(events);
        }
        );
    }
    });
         
        /* initialize the external events
        -----------------------------------------------------------------*/
        $('#external-events div.external-event').each(function () {
            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            };
            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);
            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true,      // will cause the event to go back to its
                revertDuration: 0  //  original position after the drag
            });
        });

        /* initialize the calendar
        -----------------------------------------------------------------*/
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();

        var calendar = $('#calendar').fullCalendar({
            //isRTL: true,
            buttonHtml: {
                prev: '<i class="ace-icon fa fa-chevron-left"></i>',
                next: '<i class="ace-icon fa fa-chevron-right"></i>'
            },
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            buttonText: {
                today: 'hoy',
                month: 'mes',
                week : 'semana',
                day  : 'dia'
            },
            //obj that we get json result from ajax
           
            editable: true,
            selectable: true    
        });
    });
</script>
