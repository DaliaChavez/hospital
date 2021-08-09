<script type="text/javascript">
$(document).ready(function() {
    var id_paciente = $('#id_paciente').val();
    var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();
                m = m + 1;
           
            var fecha = '';
            $.post('{{URL::to('/paciente/getDatesCitas')}}',
            {
                '_token':'{{ csrf_token() }}',
                id_paciente:id_paciente
            },
            function(data){
                
                for (let i = 0; i < data.length; i++) {
                    fecha = data[i]['fecha'].split('-');
                    var id = data[i]['id_cita'];
                    var anio = Number(fecha[0]);
                    var mes = Number(fecha[1]);
                    var dia = Number(fecha[2]);
                   
                    if(y == anio && m == mes && d > dia){
                        console.log(id);
                    }
                    if(y == anio && m == mes && d < dia){
                        console.log(id);
                        $('.'+id).css('visibility','hidden');
                    }
                }
            }
        );

});


    function UpdatePaciente(){
        var id_paciente = $('#id_paciente').val();
        var nombre = $('#nombre').val();
        var apellido_P = $('#apellido_P').val();
        var apellido_M = $('#apellido_M').val();
        var direccion = $('#direccion').val();
        var telefono = $('#telefono').val();
    
        if (id_paciente == "" || nombre == "" || apellido_P == "" || apellido_M == "" || direccion == "" || telefono == "") {
            return;
        }
    
        $.post('{{URL::to('/paciente/update')}}',
            {
                '_token':'{{ csrf_token() }}',
                id_paciente:id_paciente,
                nombre:nombre,
                apellido_P:apellido_P,
                apellido_M:apellido_M,
                direccion:direccion,
                telefono:telefono
            },
            function(data){
                if(data['status'] == 'success'){
                    location.reload();
                }
            }
        );
    }
    
    function DeletePaciente(){
        var id_paciente = $("#id_paciente").val();
        $.post('{{URL::to('/paciente/delete')}}',
            {
                '_token':'{{ csrf_token() }}',
                id_paciente:id_paciente
            },
            function(data){
                    window.location.replace('{{URL::to('/pacientes')}}');
            }
        );
    }
    function saveObservacion(id){
        var text = $('#'+id).val();
        $.post('{{URL::to('/paciente/save/observacion')}}',
            {
                '_token':'{{ csrf_token() }}',
                id_cita:id,
                text:text
            },
            function(data){
                    window.location.reload();
            }
        );
    }

    function PDFPaciente(){
        var id_paciente = $("#id_paciente").val();
        $.post('{{URL::to('/paciente/generatePDF')}}',
            {
                '_token':'{{ csrf_token() }}',
                id_paciente:id_paciente
            },
            function(data){
                if(data.length > 0){
                    var url = '{{asset('/PDF')}}';
                    url = url + '?data=' +  JSON.stringify(data);
                    setTimeout(function() {
                        document.getElementById('PDF').src = url;
                    }, 300);
                    $('#modal_ticket').modal('show');
                    setTimeout(function(){
                        $('#PDF').print();
                    }, 1500);
                }else{
                    var message = 'No se puede generar el reporte PDF de las citas por que este paciente no a agendado ninguna cita';
                    $.notify({
                        icon: 'fa fa-warning',
                        title: '<strong>Información!</strong>',
                        message: message
                    },{
                        type: 'warning',
                        placement: {
                            from: "bottom"
                        }
                    });
                }
            }
        );
    }
</script>