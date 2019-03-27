@extends('layouts.principal')

@section('navT')

        @include('partials.nav')
@endsection
@section('seccion_c')

<style type="text/css">
 .material-switch > input[type="checkbox"] {
    display: none;
}

.material-switch > label {
    cursor: pointer;
    height: 0px;
    position: relative;
    width: 40px;
}

.material-switch > label::before {
    background: rgb(0, 0, 0);
    box-shadow: inset 0px 0px 10px rgba(0, 0, 0, 0.5);
    border-radius: 8px;
    content: '';
    height: 16px;
    margin-top: -8px;
    position:absolute;
    opacity: 0.3;
    transition: all 0.4s ease-in-out;
    width: 40px;
}
.material-switch > label::after {
    background: rgb(255, 255, 255);
    border-radius: 16px;
    box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.3);
    content: '';
    height: 24px;
    left: -4px;
    margin-top: -8px;
    position: absolute;
    top: -4px;
    transition: all 0.3s ease-in-out;
    width: 24px;
}
.material-switch > input[type="checkbox"]:checked + label::before {
    background: inherit;
    opacity: 0.5;
}
.material-switch > input[type="checkbox"]:checked + label::after {
    background: inherit;
    left: 20px;
}


/* The customcheck */
.customcheck {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.customcheck input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
    border-radius: 5px;
}

/* On mouse-over, add a grey background color */
.customcheck:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.customcheck input:checked ~ .checkmark {
    background-color: #02cf32;
    border-radius: 5px;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.customcheck input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.customcheck .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}


</style>

<div class="container" >

    <h3></h3>

<div class="container">
    <h3 class="text-center  wow lightSpeedIn" data-wow-delay="0.1s">Programar Cita</h3>
    <hr>
    <div class="col-xs-12">

    </div>
</div>

   <div class="row">
     <div class="col-md-4"></div>
     <div class='col-md-5 offset-4'>
        <div class="form-group wow fadeInUp d-flex justify-content-center" data-wow-offset="0" data-wow-delay="0.1s" id="lu">
      <label for="sel1">Seleccionar Lugar:</label>
      {!! Form::select('lugar',$lugar, '', ['class'=>'form-control form-control-lg single', 'id'=>'lugar']) !!}
    </div>
    <div class="form-group wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s" style="display: none;" >
      <label for="sel1">Seleccionar Lugar:</label>
    </div>
    <div class="form-group wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s" id="lu">
      <label for="sel1">Seleccionar Servicio:</label>
      {!! Form::select('servicio',$servicio, '', ['class'=>'form-control form-control-lg single', 'id'=>'servicio']) !!}
    </div>

    <div class="form-group wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s" id="doctor">
      <label for="sel1" id="seld">Seleccionar Doctor:</label>
       <select id ='fedoc' class='form-control form-control-lg single'>
           <option value="volvo">Seleccionar</option>
      </select>
    </div>
    <!-- Date range -->
      <div class="form-group wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s" id="ra">
                <label>Seleccione rango de fecha:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservation" data-date-days-of-week-disabled="0,1">
                </div>
                <!-- /.input group -->
      </div>


  <!--  <div  id="fecha_s">
         <select id ='fec1' class='form-control form-control-lg single'>
            <option value="volvo">Fecha</option>
         </select>
       </div> -->
     </div>
  <!--   <div class='col-md-4 d-flex justify-content-center'>
         <div class="panel panel-default">
               io</div>


                <div class="list-group" id="el">

                       <div class='container'  id ='fec2'>
                        <br>

                       </div>
                </div>
            </div>
     </div> -->
   </div>

    <br>

  <!--  <div class="row">
       <div class="offset-2 col-md-4" id="fecha_s">
         <select id ='fec1' class='form-control form-control-lg single'>
            <option value="volvo">Fecha</option>
         </select>
       </div>

      <div class="col-md-4" id="fecha_s">
         <select id ='fecc' class='form-control form-control-lg single'>
            <option value="volvo">Cargar</option>
            <option value="Mañana">Mañana</option>
            <option value="Tarde">Tarde</option>

         </select>
       </div>

    </div> -->



</div>

<!-- <div class="links">
    <form method="post" action="{ {url('admin/import-excel')}}" enctype="multipart/form-data">
        { {csrf_field()}}
        <input type="file" name="excel">
        <br><br>
        <input type="submit" value="Enviar" style="padding: 10px 20px;">
    </form>
</div> -->
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


                   $('.js-example-basic-multiple').select2();

               $('#servicio').on('change',function(){
                          $('#seld').remove();
                          $('#fedoc').remove();
                          $('#doctor').append("<label for=\"sel1\" id='seld'>Seleccionar Doctor:</label><select id ='fedoc' class='form-control form-control-lg single'><option value=\"volvo\">Seleccionar</option></select>");
                                h = $(this).val();
                    //var promise = look();
                                vurl='{{ url('admin/bdoctor') }}';
                                //vurl = `${vurl}/${url1}`;

                               //(Location).load(vurl, { id: url1 });
                               var parametros = {
                                       "id" : $(this).val(),
                                    };

                                console.log(vurl);
                                //$(location).attr('href',vurl);

                               // var doc = 'statusEdit';
                                $.ajax({
                                url:   vurl,
                                data: parametros,
                                type:  'GET', //método de envio
                                dataType : 'json',
                                headers: {
                                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                          } ,
                                success:  function (data) {
                                    console.log(data);
                                     for(var i in data){
                                         $("#fedoc").append("<option value='"+data[i]['id']+"'>"+data[i]['name']+"</option>");
                                    }
                                },
                                error: function (data) {
                                   console.log('Error:', data);
                                  },
                                  async: false
                                });

              });


               $('#lugar').click(function(event) {
                   $('#fec1').remove();
                   $('#fecha_s').append("<select id ='fec1' class='form-control form-control-lg single'><option value='volvo'>Fecha</option></select>");
                   $('#fec2').remove();
                   $('#el').append("<div class='container' id ='fec2'><br></div>");
               });
              //alert($('#lugar').val());
                 ba = null;
              // $('#No').hide();
                hora = null;

               function promesaS(){ // poner fechas
                return  new Promise(function() {
                                url1 = $('#reservation').val();
                                url2 = $('#reservation').val();

                                vurl='{{ url('admin/statusEdit') }}';
                                //vurl = `${vurl}/${url1}`;

                               //(Location).load(vurl, { id: url1 });
                               var parametros = {
                                       "id" : $('#reservation').val(),
                                       "lugar" : $('#lugar').val(),
                                       "doctor" : $('#fedoc').val(),

                                    };

                                console.log(vurl);
                                //$(location).attr('href',vurl);

                               // var doc = 'statusEdit';
                                $.ajax({
                                url:   vurl,
                                data: parametros,
                                type:  'GET', //método de envio
                                dataType : 'json',
                                headers: {
                                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                          } ,
                                success:  function (data) {
                                     PlantillaContacto.toast_notification("success","Se genero los horarios con exito",2);
                                    console.log(data);
                                },
                                error: function (data) {
                                   console.log('Error:', data);
                                  },
                                  async: false
                                });
                      });

               }


          function promesa2(){ // buscar fecha y poner horas
                return  new Promise(function() {
                                console.log('entre');
                                url1 = $('#fec1').val();
                                url2 = $('#fec1').val();

                                vurl='{{ url('admin/buscarFecha') }}';
                                //vurl = `${vurl}/${url1}`;

                               //(Location).load(vurl, { id: url1 });
                               var parametros = {
                                       "fecha" : $('#fec1').val(),
                                       "lugar" : $('#lugar').val(),
                                       "doctor" : $('#fedoc').val(),

                                    };

                                console.log(vurl);
                                //$(location).attr('href',vurl);

                               // var doc = 'statusEdit';
                                $.ajax({
                                url:   vurl,
                                data: parametros,
                                type:  'GET', //método de envio
                                dataType : 'json',
                                headers: {
                                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                          } ,
                                success:  function (data2) {
                                   console.log('data 2');
                                   console.log(data2);
                                  //console.log(data2[0]['status']);
                                      if(data2 == 0){
                                        actualizar = 1 ; // insertar
                                              for(var i in hora){
                                            $("#fec2").append("<label class='customcheck'>"+hora[i]['r_hora']+"<input type='checkbox'  class='che' value='"+hora[i]['r_hora']+"'><span class='checkmark'></span></label>");
                                          }

                                        }else{
                                          actualizar = 0 ; // actualizar
                                          for(var i in hora){

                                             console.log(data2.length);
                                             b = true;
                                             check = 0 ;
                                             status = 0;
                                             j = 0 ;
                                             while(b){
                                              console.log(data2[j]['r_hora']);
                                                  if(data2[j]['r_hora']==hora[i]['r_hora']){
                                                        check = 1;
                                                        status = data2[j]['status'];
                                                        b = false;
                                                  }
                                                  j++;
                                                  if(data2.length == j){ b = false; }
                                             }

                                             if(check ==1){ // los q estan en la base de datos
                                                    if( status == 1){
                                                      $("#fec2").append("<label class='customcheck'>"+hora[i]['r_hora']+"<input type='checkbox' checked='checked' class='che' value='"+hora[i]['r_hora']+"'><span class='checkmark'></span></label>");
                                                    }else{
                                                      $("#fec2").append("<label class='customcheck'>"+hora[i]['r_hora']+"<input type='checkbox'  class='che' value='"+hora[i]['r_hora']+"'><span class='checkmark'></span></label>");
                                                    }

                                             }else{
                                                 $("#fec2").append("<label class='customcheck'>"+hora[i]['r_hora']+"<input type='checkbox' class='che' value='"+hora[i]['r_hora']+"'><span class='checkmark'></span></label>");

                                             }

                                          }
                                        }

                                },
                                error: function (data2) {
                                   console.log('Error:', data2);
                                  },
                                  async: false
                                });
                      });

               }


               function promesa3(){ // programar cita para una fecha y hora determinada
                return  new Promise(function() {
                                console.log('entre');
                                //alert($('#servicio').val());
                                url1 = $('#fec1').val();
                                url2 = $('#fec1').val();

                                vurl='{{ url('admin/editarDispon') }}';
                                //vurl = `${vurl}/${url1}`;

                               //(Location).load(vurl, { id: url1 });
                               var parametros = {
                                       "actualizar" : actualizar,
                                       "lugar" : $('#lugar').val(),
                                       "fecha" : $('#fec1').val(),
                                       "hora" : h,
                                       "doctor" : $('#fedoc').val(),
                                       "servicio" :$('#servicio').val()
                                    };

                                console.log(vurl);

                                $.ajax({
                                url:   vurl,
                                data: parametros,
                                type:  'GET', //método de envio
                                dataType : 'json',
                                headers: {
                                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                          } ,
                                success:  function (data3) {
                                   console.log('data 6');
                                   console.log(data3);
                                    console.log("lallal");
                                   if(data3 == 9){
                                    PlantillaContacto.toast_notification("warning","Ya existe un horario asignado",2);
                                   }else if(data3 == 0){
                                    PlantillaContacto.toast_notification("success","Horario asignado",2);
                                    actualizar = data3;
                                   }else if(data3 == 1){
                                    PlantillaContacto.toast_notification("success","Cambio realizado",2);
                                    actualizar = data3;
                                   }
                                },
                                error: function (data2) {
                                   console.log('Error:', data2);
                                  },
                                  async: false
                                });
                      });

               }


               function promesa5(){
                return  new Promise(function() {
                                console.log('entre');
                                url1 = $('#fec1').val();
                                url2 = $('#fec1').val();

                                vurl='{{ url('admin/editarDispon2') }}';
                                //vurl = `${vurl}/${url1}`;

                               //(Location).load(vurl, { id: url1 });
                               var parametros = {
                                       "actualizar" : actualizar,
                                       "lugar" : $('#lugar').val(),
                                       "fecha" : $('#fec1').val(),
                                       "hora" : h
                                    };

                                console.log(vurl);
                                //$(location).attr('href',vurl);

                               // var doc = 'statusEdit';
                                $.ajax({
                                url:   vurl,
                                data: parametros,
                                type:  'GET', //método de envio
                                dataType : 'json',
                                headers: {
                                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                          } ,
                                success:  function (data3) {
                                   console.log('data 6');
                                   console.log(data3);
                                   actualizar = data3;

                                },
                                error: function (data2) {
                                   console.log('Error:', data2);
                                  },
                                  async: false
                                });
                      });

               }



         // var promise = promesaS();

               // llenar_data($('#reservation').val());


                $('#bu').click(function(){
                    // $('#No').show();
                  var promise = promesa2();
                })



   //console.log(ba);

  //  obtener_habilitar("#Na tbody",ba,"button.editar");
    //Date range picker
    $('#reservation').daterangepicker({
            "locale": {
        "applyLabel": "Aceptar",
        "cancelLabel": "Cancelar",
        }

       });


    $('#reservation').on('apply.daterangepicker', function(ev, picker) {
  //do something, like clearing an input

         $('#fecha1').remove();
         $('#fechas').append("<select id='fecha1' class='js-example-basic-multiple form-control form-control-lg single' name='states[]' multiple='multiple' ></select>");

         $('.js-example-basic-multiple').select2();
         $('#fec1').remove();
         $('#fecha_s').append("<select id ='fec1' class='form-control form-control-lg single'><option value='volvo'>Fecha</option></select>");
         var promise = promesaS(); // poner fechas


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
   $(function() {





})


</script>


@endsection
