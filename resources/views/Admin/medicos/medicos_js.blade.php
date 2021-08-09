<script type="text/javascript">

function UpdateMedic(){
    var id_medico = $('#id_medico').val();
    var nombre = $('#nombre').val();
    var apellido_P = $('#apellido_P').val();
    var apellido_M = $('#apellido_M').val();
    var direccion = $('#direccion').val();
    var telefono = $('#telefono').val();

    if (id_medico == "" || nombre == "" || apellido_P == "" || apellido_M == "" || direccion == "" || telefono == "") {
        return;
    }

    $.post('{{URL::to('/medico/update')}}',
        {
            '_token':'{{ csrf_token() }}',
            id_medico:id_medico,
            nombre:nombre,
            apellido_P:apellido_P,
            apellido_M:apellido_M,
            direccion:direccion,
            telefono:telefono
        },
        function(data){
            if(data['status'] == 'success'){
                location.reload();
            }else{
                console.log(data);
            }
        }
    );
}

function DeleteMedic(){
    var id_medico = $("#id_medico").val();
    $.post('{{URL::to('/medico/delete')}}',
        {
            '_token':'{{ csrf_token() }}',
            id_medico:id_medico
        },
        function(data){
                window.location.replace('{{URL::to('/medicos')}}');
        }
    );
}

</script>