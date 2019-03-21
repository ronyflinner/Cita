@extends('layouts.principal')

@section('navT')

        @include('partials.nav')
@endsection

@section('seccion_c')

<div class="container">

    <h3 class="wow lightSpeedIn" data-wow-delay="0.1s">Seleccionar Servicio a Doctor</h3>

   <div class="form-group wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s" id="lu">
      <label for="sel1">Seleccionar Doctor:</label>

      {!! Form::select('usuario',$usuario, '', ['class'=>'form-control form-control-lg single', 'id'=>'usuario']) !!}
    </div>


 <!--  { !! Form::select('usuario',$servicio, '', ['class'=>'js-example-basic-multiple', 'name'=>'states[]' , 'multiple'=>"multiple" ,'id'=>'servicio']) !!} -->
    <label for="sel1">Servicio:</label>
    <div id="ser3">
    <div class="form-group wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s"  id='ser'>
         <select class='js-example-basic-multiple' id='sel2' name='states[]' multiple='multiple'>

        </select>
     </div>
    </div>


    <div class="d-flex justify-content-center">
        <button id="bu" type="button" class="btn btn-success d-flex wow bounceIn" data-wow-delay="0.4s">Crear Servicio</button>
    </div>

</div>
<br><br><br>




@endsection

@section('javascript')
<script>

    var PlantillaContacto = {
              //Variables
                MesajeSaludo:'HelloWord',
                init : ()=> {

                    PlantillaContacto.General();

                },
                // Metodos
                sayMessage: mensaje=> {
                  alert("Hola como estas!!!");
                },
                General:()=>{
                   $(function() {

                      $('.js-example-basic-multiple').select2();


    ar = 0;

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
                                  ar = $('#sel2').val();

                                  // $('#sel2').append("<option value="++">Wyoming</option>")


                                },
                                error: function (data2) {
                                   console.log('Error:', data2);
                                  },
                                  async: false
                                });

    });


    $('#bu').click(function(){
      console.log("antes");
         console.log(ar);
         console.log($('#usuario').val());
         vurl='{{ url('admin/editardoc') }}';
         var parametros = {
                 "servicio" : $('#sel2').val(),
                 "usuario" : $('#usuario').val(),
                 "ser1" : ar,
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

            if(data == 3){
               PlantillaContacto.toast_notification("success",'buuuuuuuuuu',2);
            }else{
              PlantillaContacto.toast_notification("success",'Doctor actualizado',2);
            }


          },
          error: function (data) {
             console.log('Error:', data);
            },
            async: false
          });

    });


                        });

                                      },
                toast_notification:(message,data,flag)=>{
                      let listar;
                      if(flag==1){
                        listar="<ul>";
                          data.forEach( function(element, index) {
                            listar+=`<li>${element}</li>`;
                          });
                        listar+="</ul>";

                        toastr[message](listar);
                      }else{
                        toastr[message](data);
                      }

                      toastr.options = {
                       "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-bottom-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                      }

                    },
                      clean_form_html:destiny=>{
                          $(destiny).html('');
                      },
                      hide_form_input:(destiny,property)=>{
                          $(destiny).attr({
                            style: `display:${property};`
                          });
                      },
                      clean_form_input:destiny=>{
                          $(destiny).empty();
                      },
                      form_option_append:(destiny,index,value)=>{
                          $(destiny).append('<option value='+index+'>'+ value+' </option>' );
                      },
                      form_option_disable:(value,boleano)=>{
                          $(value).prop('disabled', boleano);
                      },
                      form_select_default:destiny=>{
                          $(destiny).prepend('<option value="" selected>Selecionar</option>');
                      },



              };


              $(function() {
                //arranque de funciones y procesos que estan en el init
                  PlantillaContacto.init();
              });




    // ajax que retorne la fechas disponibles
  $(document).ready(function() {


});




</script>


@endsection
