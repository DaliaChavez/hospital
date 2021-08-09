<script type="text/javascript">
function DeleteCita(){
        var id_cita = $("#id_cita").val();
        $.post('{{URL::to('/cita/delete')}}',
            {
                '_token':'{{ csrf_token() }}',
                id_cita:id_cita
            },
            function(data){
                    window.location.replace('{{URL::to('/citas')}}');
            }
        );
}

</script>