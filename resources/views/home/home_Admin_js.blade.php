<script>
    $(document).ready(function() {
        getDataMedicos();
        getDataPacientes();
        getDataCitas();
    });

    function getDataMedicos(){
        $.get('{{URL::to('/medicos/data')}}',
            {
                '_token':'{{ csrf_token() }}'
            },
            function(data){
                console.log('medicos:'+data);
                var html = '<h3>'+data+'</h3><p>Medicos registrados</p>';
                $('#medicos').html(html);
            }
        );
    }
    function getDataPacientes(){
        $.get('{{URL::to('/pacientes/data')}}',
            {
                '_token':'{{ csrf_token() }}'
            },
            function(data){
                console.log('pacientes:'+data);
                var html = '<h3>'+data+'</h3><p>Pacientes registrados</p>';
                $('#pacientes').html(html);
            }
        );
    }
    function getDataCitas(){
        $.get('{{URL::to('/citas/data')}}',
            {
                '_token':'{{ csrf_token() }}'
            },
            function(data){
                var arrayFinalizados = new Array();
                var arrayNoFinalizados = new Array();
                var countFinalizados = 0;
                var countNoFinalizados = 0;
                var date = new Date();
                var d = date.getDate();
                var m = date.getMonth();
                var y = date.getFullYear();
                m = m + 1;
                for (let i = 0; i < data.length; i++) {
                    var fecha = data[i]['fecha'].split('-');
                    var year = Number(fecha[0]);
                    var month = Number(fecha[1]);
                    var day = Number(fecha[2]);
                   
                    if(y == year && m == month && d > day || y == year && m > month && d < day){
                        arrayFinalizados.push(data[i]);
                        countFinalizados = arrayFinalizados.length;
                    }else{
                        arrayNoFinalizados.push(data[i]);
                        countNoFinalizados = arrayNoFinalizados.length;
                    }
                }
                var html = '<h3>'+countNoFinalizados+'</h3><p>Citas registradas no finalizadas</p>';
                $('#citas').html(html);
                var html2 = '<h3>'+countFinalizados+'</h3><p>Citas registradas finalizadas</p>';
                $('#citas_finalizadas').html(html2);
            }
        );
    }
</script>