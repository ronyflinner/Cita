@extends('layouts.principal')

@section('navT')

        @include('partials.navAdmin')
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
<div class="container">

    <h3></h3>

<div class="container">
    <h3 class="text-center">Programar Cita</h3>
    <hr>
    <div class="col-xs-12">

    </div>
</div>




    <div class="form-group" id="lu">
      <label for="sel1">Seleccionar Lugar:</label>
      {!! Form::select('lugar',$lugar, '', ['class'=>'form-control form-control-lg single', 'id'=>'lugar']) !!}
    </div>
    <div class="form-group" style="display: none;" >
      <label for="sel1">Seleccionar Lugar:</label>

    </div>

    <!-- Date range -->
      <div class="form-group" id="ra">
                <label>Seleccione rango de fecha:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservation" data-date-days-of-week-disabled="0,1">
                </div>
                <!-- /.input group -->
      </div>
    <br>

    <div class="row">
       <div class="col-md-4" id="fecha_s">
         <select id ='fec1' class='form-control form-control-lg single'>
            <option value="volvo">Fecha</option>
         </select>
       </div>

      <div class="col-md-4" id="fecha_s">
         <select id ='fecc' class='form-control form-control-lg single'>
            <option value="volvo">Cargar</option>
            <option value="Mañana">Mañana</option>
            <option value="Tarde">Tarde</option>
           <!-- <option value="Todo">Todo</option> -->
         </select>
       </div>

    </div>

<br>

    <div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-4 col-sm-offset-3 col-md-offset-4">
            <div class="panel panel-default">
                <!-- Default panel contents -->
                <div class="panel-heading">Horario</div>

                <!-- List group -->
                <div class="list-group" id="el">

                       <div class='container'  id ='fec2'>
                        <br>

                       </div>
                </div>
            </div>
        </div>
    </div>
</div>


 <div class="form-check" id ='fec2'>

  </div>

    <br>

</div>
<br><br><br>

@endsection

@section('javascript')
<script>


    // ajax que retorne la fechas disponibles
   $(function() {

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

               function promesaS(){
                return  new Promise(function() {

                                url1 = $('#reservation').val();
                                url2 = $('#reservation').val();

                                vurl='{{ url('admin/statusEdit') }}';
                                //vurl = `${vurl}/${url1}`;

                               //(Location).load(vurl, { id: url1 });
                               var parametros = {
                                       "id" : $('#reservation').val()
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
                                        /* var result = [];
                                           for(var i in data){
                                               result[i] =[];

                                               result[i].push(data [i]['f_fecha']);
                                               result[i].push(data [i]['r_hora']);


                                               if(data [i]['status'] == 0){
                                                  result[i].push('Habilitado');
                                               }else{
                                                  result[i].push('Desabilitado');
                                               }
                                           } */

                                         // console.log(result);
                                    fecha = data['fecha'];
                                    console.log(fecha.length);
                                    for(var i in fecha){
                                      $("#fec1").append("<option value='"+fecha[i]['f_fecha']+"'>"+fecha[i]['f_fecha']+"</option>")
                                    }

                                    hora = data['hora'];


                                    console.log(data['fecha']);
                                    console.log(data['hora']);
                                /*
                               ba =     $('#Na').DataTable({
                                                  destroy:true,
                                                  columns: [
                                                      {
                                                          name: 'first',
                                                          title: 'Fecha',
                                                      },
                                                      {
                                                          name: 'second',
                                                          title: 'Horario',
                                                      },
                                                      {
                                                          name: 'seconud',
                                                          title: 'Estado',
                                                      },
                                                      {"render": function () {
                                                            return '<button type="button" id="ButtonEditar" class="editar edit-modal btn btn-warning botonEditar"><span class="fa fa-edit"></span><span class="hidden-xs"> Editar</span></button>';
                                                        }},
                                                  ],
                                                  data: result,
                                                  rowsGroup: [
                                                    'first:name',
                                                    'second:name'
                                                  ],
                                                  pageLength: '20',
                                                  });



                                       //location.reload(); */

                                     // document.getElementById("variable").value=data;
                                },
                                error: function (data) {
                                   console.log('Error:', data);
                                  },
                                  async: false
                                });
                      });

               }


          function promesa2(){
                return  new Promise(function() {
                                console.log('entre');
                                url1 = $('#fec1').val();
                                url2 = $('#fec1').val();

                                vurl='{{ url('admin/buscarFecha') }}';
                                //vurl = `${vurl}/${url1}`;

                               //(Location).load(vurl, { id: url1 });
                               var parametros = {
                                       "fecha" : $('#fec1').val(),
                                       "lugar" : $('#lugar').val()
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


               function promesa3(){
                return  new Promise(function() {
                                console.log('entre');
                                url1 = $('#fec1').val();
                                url2 = $('#fec1').val();

                                vurl='{{ url('admin/editarDispon') }}';
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


       });


    $('#reservation').on('apply.daterangepicker', function(ev, picker) {
  //do something, like clearing an input

         $('#fec1').remove();
         $('#fecha_s').append("<select id ='fec1' class='form-control form-control-lg single'><option value='volvo'>Fecha</option></select>");
         var promise = promesaS();

         $('#fec1').click(function(event) {

          $('#fec2').remove();
          $('#el').append("<div class='container' id ='fec2'><br></div>");

          actualizar = 1 ;
          var promise = promesa2();

          // sigue el codigo aqui
           console.log('actualizar');
           console.log(actualizar);

           event = 0 ;

            //var promise = promesa5();


            $('.che').on('change',function(){
                  h = $(this).val();
                  var promise = promesa3();


                  console.log('click putooo');
                  console.log($(this).val());
                  console.log($('#fec1').val());
                  console.log($('#fec1').val());

          });

        $('#fecc').click(function(e){


           e.preventDefault();
           e.stopImmediatePropagation();
           console.log('me repeti');
           $(".che").off("change");

             if($("#fecc").val() == "Todo") {
                    $(".che").each(function(){
                    h = $(this).attr('value');







                      var promise = promesa5();

                      if(actualizar == 0){
                        $(this).attr('checked','checked');
                      }
                      else{
                        $(this).removeAttr('checked');
                      }



                       });
             }
             else if($("#fecc").val() == "Tarde"){

              $(".che").each(function(){
                  aux = 0;
                   h = $(this).attr('value');
                  if(h == '08:00 - 09:00' || h == '09:00 - 10:00'  || h == '10:00 - 11:00' || h == '11:00 - 12:00'){
                    aux = 1;
                  }


                  if(aux == 0){
                    console.log(actualizar);
                     console.log('opcion '+$(this).text()+' valor '+ $(this).attr('value'));

                      var promise = promesa3();

                      if(actualizar == 0){
                        $(this).attr('checked','checked');
                      }
                      else{
                        $(this).removeAttr('checked');
                      }


                  }

                       });
             }

             else if($("#fecc").val() == "Mañana"){

              $(".che").each(function(){
                  aux = 1;
                   h = $(this).attr('value');
                  if(h == '08:00 - 09:00' || h == '09:00 - 10:00'  || h == '10:00 - 11:00' || h == '11:00 - 12:00'){
                    aux = 0;
                  }


                  if(aux == 0){
                    console.log(actualizar);
                     console.log('opcion '+$(this).text()+' valor '+ $(this).attr('value'));

                      var promise = promesa3();

                      if(actualizar == 0){
                        $(this).attr('checked','checked');
                      }
                      else{
                        $(this).removeAttr('checked');
                      }


                  }



                       });
             }
          });






        });

         console.log('hola');
                   console.log(hora);
    });





})


</script>


@endsection