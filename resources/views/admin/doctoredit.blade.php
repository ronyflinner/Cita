@extends('layouts.principal')

@section('navT')

        @include('partials.navAdmin')
@endsection
@section('seccion_c')


<div class="container">

    <h3>Programar Cita</h3>

   <div class="form-group" id="lu">
      <label for="sel1">Seleccionar Doctor:</label>

      {!! Form::select('usuario',$usuario, '', ['class'=>'form-control form-control-lg single', 'id'=>'usuario']) !!}
    </div>


 <!--  { !! Form::select('usuario',$servicio, '', ['class'=>'js-example-basic-multiple', 'name'=>'states[]' , 'multiple'=>"multiple" ,'id'=>'servicio']) !!} -->
    <label for="sel1">Servicio:</label>
    <div id="ser3">
    <div class='form-group' id='ser'>
         <select class='js-example-basic-multiple' id='sel2' name='states[]' multiple='multiple'>

        </select>
     </div>
    </div>


    <div class="d-flex justify-content-center">
        <button id="bu" type="button" class="btn btn-success d-flex">Generar Cita</button>
    </div>

</div>
<br><br><br>

@endsection

@section('javascript')
<script>


    // ajax que retorne la fechas disponibles
  $(document).ready(function() {
    $('.js-example-basic-multiple').select2();




    $('#usuario').click(function(){
     console.log($('#usuario').val());

                               vurl='{{ url('admin/buscarservicio') }}';
                               var parametros = {
                                       "usuario" : $('#usuario').val(),
                                    };
                                console.log(vurl);
                                $.ajax({
                                url:   vurl,
                                data: parametros,
                                type:  'GET',
                                dataType : 'json',
                                headers: {
                                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                          } ,
                                success:  function (data) {
                                   console.log(data);

                                   $('#ser').remove();
                                   $('#ser3').append("<div class='form-group' id='ser'><select class='js-example-basic-multiple' id='sel2' name='states[]' multiple='multiple'></select></div>");
                                   $('.js-example-basic-multiple').select2();
                                   var servicio = data['servicios'];
                                   var selecionados = data['doctorser'];
                                   console.log(selecionados.length);

                                   for(var i in servicio){
                                     if(selecionados.length == 0){
                                          console.log('estoy vacio');
                                          $('#sel2').append("<option value='"+servicio[i]['id']+"' >"+servicio[i]['nombre']+"</option>");
                                     }else{
                                        var aux = 0;
                                         for(var j in selecionados){
                                           if(selecionados[j]['nombre'] == servicio[i]['nombre']){
                                            $('#sel2').append("<option value='"+servicio[i]['id']+"' selected>"+servicio[i]['nombre']+"</option>");
                                            aux = 1;
                                           }
                                         }
                                         if(aux==0){
                                           $('#sel2').append("<option value='"+servicio[i]['id']+"'>"+servicio[i]['nombre']+"</option>");
                                         }
                                     }

                                   }


                                  // $('#sel2').append("<option value="++">Wyoming</option>")


                                },
                                error: function (data2) {
                                   console.log('Error:', data2);
                                  },
                                  async: false
                                });

    });


    $('#bu').click(function(){
         vurl='{{ url('admin/editardoc') }}';
         var parametros = {
                 "servicio" : $('#sel2').val(),
              };
          console.log(vurl);
          $.ajax({
          url:   vurl,
          data: parametros,
          type:  'GET',
          dataType : 'json',
          headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    } ,
          success:  function (data) {
             console.log(data);
          },
          error: function (data) {
             console.log('Error:', data);
            },
            async: false
          });

    });


});




</script>


@endsection
