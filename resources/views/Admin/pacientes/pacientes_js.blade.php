<script type="text/javascript">
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
</script>