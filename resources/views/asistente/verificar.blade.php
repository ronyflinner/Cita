@extends('layouts.principal')

@section('navT')
       @include('partials.nav')
@endsection
@section('seccion_c')



 <div class="container">
    <div class="form-wrapper">
                <div class="wow >


                    <div class="panel-heading">
                      <div class="section_title  wow lightSpeedIn" data-wow-delay="0.1s"><h3>Verificar Asistencia</h3></div>
                    </div>
                    <div class="panel-body">
                      <div id="sendmessage">Your message has been sent. Thank you!</div>
                      <div id="errormessage"></div>

                      <form action="" method="post" role="form" class="contactForm lead">
                        <div class="row">

                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">
                              <label>Codigo de cita</label>
                              <input type="text" name="first_name" id="codigo_cita" class="form-control input-md" data-rule="minlen:3" data-msg="Please enter at least 3 chars">
                              <div class="validation"></div>
                            </div>
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4">
                            <div class="form-group">
                              <br>
                             <button type="button" id="buscar" class="btn btn-primary wow bounceIn" data-wow-delay="0.4s">Consultar</button>
                            </div>
                          </div>
                        </div>

                        <div class="row" style="display: none;" id="f_pago">
                          <div class="col-xs-2 col-sm-2 col-md-2">
                            <div class="form-group">
                              <label>Nombre y Apepllido</label>
                              <div id="nombre"></div>
                            </div>
                          </div>
                          <div class="col-xs-2 col-sm-2 col-md-2">
                            <div class="form-group">
                              <label>Número del Documento</label>
                              <div id="dni" ></div>
                            </div>
                          </div>
                          <div class="col-xs-2 col-sm-2 col-md-2">
                            <div class="form-group">
                              <label>Pago</label>
                              <div id="pago" ></div>
                            </div>
                          </div>
                          <div class="col-xs-2 col-sm-2 col-md-2">
                            <div class="form-group">
                              <label>Asistio</label>
                              <div id="asistio"></div>
                            </div>
                          </div>
                          <div class="col-xs-2 col-sm-2 col-md-2">
                            <div class="form-group">
                              <br>
                              <button type="button" id="asistencia" class="btn btn-success">Confirmar</button>
                            </div>
                          </div>
                        </div>

                      </form>
                    </div>


                </div>
              </div>
 </div>


@endsection

@section('javascript')

<script type="text/javascript">
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
                      $('#buscar').click(function(){
                              vurl='{{ url('admin/buscarVeri') }}';
                                //vurl = `${vurl}/${url1}`;
                               //(Location).load(vurl, { id: url1 });
                               var parametros = {
                                       "id" : $('#codigo_cita').val()
                                    };
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
                                    console.log(data['nombre']);
                                    $("#f_pago").css("display","block")
                                    $('#nombre').empty();
                                    $('#dni').empty();
                                    $('#asistio').empty();
                                    $('#pago').empty();

                                    $('#nombre').append(data['nombre']);
                                    $('#dni').append(data['dni']);

                                    if(data['status_asistio'] == 1){
                                      $('#asistio').append('<font color=red align=justify><i class="glyphicon glyphicon-remove-sign"></i></font>');
                                      $('#asistio').val('No');
                                    }else{
                                      $('#asistio').append('<font color=green align=justify><i class="fas fa-check-circle"></i></font>');
                                      $('#asistio').val('Sí');
                                    }

                                    if(data['status_pago'] == 1){
                                      $('#pago').append('<font color=green align=justify><i class="fas fa-check-circle"></i></font>');
                                      $('#pago').val('Sí');
                                    }else{
                                      $('#pago').append('<font color=red align=justify><i class="glyphicon glyphicon-remove-sign"></i></font>');
                                      $('#pago').val('No');
                                    }
                                },
                                error: function (data) {
                                  $('#nombre').empty();
                                    $('#dni').empty();
                                    $('#asistio').empty();
                                    $('#pago').empty();
                                    PlantillaContacto.toast_notification("warning",'Ingrese un código valido',2);
                                   console.log('Error:', data);
                                  },
                                  async: false
                                });
                      })


                    $('#asistencia').click(function(){
                      if($('#pago').val() == "Sí" && $('#asistio').val() == "No")
                       {

                         vurl='{{ url('admin/asistenciab') }}';
                                //vurl = `${vurl}/${url1}`;
                               //(Location).load(vurl, { id: url1 });
                        var parametros = {
                                       "id" : $('#codigo_cita').val()
                                    };
                         $.ajax({
                                url:   vurl,
                                data: parametros,
                                type:  'GET', //método de envio
                                dataType : 'json',
                                headers: {
                                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                          } ,
                                success:  function (data) {
                                    $('#asistio').empty();
                                    PlantillaContacto.toast_notification("success",'Se verifico la asistencia!!!',2);
                                    $('#asistio').append('<font color=green align=justify><i class="fas fa-check-circle"></i></font>');
                                      $('#asistio').val('Sí');
                                      $('#asistido font').attr('color', 'green');


                                },
                                error: function (data) {
                                    $('#nombre').empty();
                                    $('#dni').empty();
                                    $('#asistio').empty();
                                    $('#pago').empty();

                                   console.log('Error:', data);
                                  },
                                  async: false
                                });
                       }else if($('#pago').val() == "Sí" && $('#asistio').val() == "Sí"){
                           PlantillaContacto.toast_notification("warning",'Ya ha asistido',2);
                       }
                       else{
                          PlantillaContacto.toast_notification("warning",'No puede asistir sino ha pagado',2);
                       }
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





</script>

@endsection