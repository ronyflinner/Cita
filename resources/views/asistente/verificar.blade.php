@extends('layouts.principal')

@section('navT')
       @include('partials.nav')
@endsection
@section('seccion_c')
<br><br><br><br><br><br>
<br><br><br><br><br><br>
 <div class="container">
    <div class="form-wrapper">
                <div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">

                  <div class="panel panel-skin">
                    <div class="panel-heading">
                      <h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Verificación de asistencia</h3>
                    </div>
                    <div class="panel-body">
                      <div id="sendmessage">Your message has been sent. Thank you!</div>
                      <div id="errormessage"></div>

                      <form action="" method="post" role="form" class="contactForm lead">
                        <div class="row">
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <label>Codigo de cita</label>
                              <input type="text" name="first_name" id="codigo_cita" class="form-control input-md" data-rule="minlen:3" data-msg="Please enter at least 3 chars">
                              <div class="validation"></div>
                            </div>
                          </div>
                          <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                              <br>
                             <button type="button" id="buscar" class="btn btn-primary">Buscar</button>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                              <label>Nombre</label>
                              <div id="nombre"></div>
                            </div>
                          </div>
                          <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                              <label>DNI</label>
                              <div id="dni" ></div>
                            </div>
                          </div>
                          <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                              <label>Pago</label>
                              <div id="pago" ></div>
                            </div>
                          </div>
                          <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                              <label>Asistio</label>
                              <div id="asistio"></div>
                            </div>
                          </div>
                        </div>

                        <button type="button" id="asistencia" class="btn btn-primary">Aceptar</button>

                      </form>
                    </div>
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
                                    $('#nombre').append(data['nombre']);
                                    $('#dni').append(data['dni']);

                                    if(data['status_asistio'] == 1){
                                      $('#asistio').append('No');
                                    }else{
                                      $('#asistio').append('Sí');
                                    }

                                    if(data['status_pago'] == 1){
                                      $('#pago').append("Sí");
                                    }else{
                                      $('#pago').append("No");
                                    }


                                },
                                error: function (data) {
                                   console.log('Error:', data);
                                  },
                                  async: false
                                });
                      })


                    $('#asistencia').click(function(){
                      if($('#pago').html() == "Sí")
                       {

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