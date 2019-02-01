@extends('layouts.principal')

@section('navT')
        @include('partials.nav2')
@endsection
@section('seccion_c')
        <div class="container">
          <br><br>
            <div class="row">
              <div class="col text-center mt-3">
                <div class="section_title">Solicitud de Cita</div>
              </div>
            </div>
            <div class="row icon_boxes_row">
              {!! Form::open(['route'=>'crearcita.store','name'=>'form', 'method'=>'POST',"class"=>"form ",'files' => false, 'id'=>'form']) !!}
              {!! Form::token() !!}
              <!-- Icon Box -->
                <div class="container">
                      <div class="row">
                             <div class="col-md-6 offset-md-3">
                                <div class="form-group">
                                  <label for="sel1">Seleccionar Centro de Prevención:</label>
                                  {!! Form::select('lugar',$lugar, '', ['class'=>'form-control form-control-lg single select', 'required', 'id'=>'lugar'
                                  ]) !!}
                                </div>
                                 <div class="form-group">
                                  <label for="sel1">Seleccionar Servicio:</label>
                                  {!! Form::select('servicio',[''=>'Selecionar'], '', ['class'=>'form-control form-control-lg single selectServicio', 'required', 'id'=>'lugar'
                                  ]) !!}
                                </div>
                                <div class="form-group" id="display_cita" style="display: none;">
                                  <label for="sel1">Seleccionar Fecha de Cita:</label>
                                  {!! Form::text('date', Carbon\Carbon::now()->format('Y-m-d'), ['id'=>'datepicker','class'=>'form-control datepicker clicl', 'readonly', 'placeholder'=>'','required' ]) !!}
                                </div>
                                 <div class="form-group" id="display_horario" style="display: none;">
                                  <label for="sel1">Seleccionar Horario:</label>
                                  {!! Form::select('hora',[], '', ['class'=>'form-control form-control-lg single', 'id'=>'hora' ,'required']) !!}
                                </div>

                            </div>
                      </div>
                          <div id="destiny" class="col-md-6 offset-md-3">
                          </div>
                      </div>
                 </div>
            <br><br><br>
            <div class="row">
              <div class="col text-center">
                <button type="submit" disabled="" id="buttonCargar" class=" btn btn-success"><span>Generar Cita</span></button>

              </div>
            </div>
          </div>
        </div>
 {!! Form::close() !!}





<button id="buyButton" type="button" name="ronadl"  class="btn btn-success">
  enviar
</button>


 <form method="post" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/">
  <input name="merchantId"    type="hidden"  value="508029"   >
  <input name="accountId"     type="hidden"  value="512323" >
  <input name="description"   type="hidden"  value="donativo"  >
  <input name="referenceCode" type="hidden"  value="000017" >
  <input name="amount"        type="hidden"  value="15.0"   >
  <input name="tax"           type="hidden"  value="0"  >
  <input name="taxReturnBase" type="hidden"  value="0" >
  <input name="currency"      type="hidden"  value="PEN" >
  <input name="signature"     type="hidden"  value="baad83532698d3f669bca16377354d0c"  >
  <input name="test"          type="hidden"  value="1" >
  <input name="buyerEmail"    type="hidden"  value="luiskaco@gmail.com" >
  <input name="responseUrl"    type="hidden"  value="{{ route('roteo') }}
" >
  <input name="confirmationUrl" type="hidden" value="{{ route('confirmation') }}" >
  <input name="Submit" class="btn btn-success"       type="submit"  value="Enviar" >
</form>

<!-- Token -->
<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">

<!-- Customer -->
<input type="hidden" name="_ajaxCrearCita" id="_ajaxCrearCita" value="{{route('admin.ajax.crearCita')}}">

<!-- guardar-->
<input type="hidden" name="_ajaxGuardarCita" id="_ajaxGuardarCita" value="{{route('crearcita.store')}}">

<!-- Ruta Selecionar-->
<input type="hidden" name="_ajaxSelecionarBuscar" id="_ajaxSelecionarBuscar" value="{{route('admin.ajax.selecionarbuscar')}}">

<!--Fecha a hora-->
<input type="hidden" name="_ajaxBuscarCita" id="_ajaxBuscarCita" value="{{route('admin.ajax.buscarCita')}}">

<!-- Rutas Pagos-->
<input type="hidden" name="_ajaxPago" id="_ajaxPago" value="{{route('cargo.cliente')}}">

<!-- Rutas Pagos-->
<input type="hidden" name="_ajaxPago" id="_ajaxPago" value="{{route('cargo.cliente')}}">


@endsection

@section('javascript')

<!-- Incluye Culqi Checkout en tu sitio web-->
<script src="https://checkout.culqi.com/js/v3"></script>

<script>

    // Configura tu llave pública
      Culqi.publicKey = 'pk_test_gj4UppEa7dS8f5By';
    // Configura tu Culqi Checkout
      Culqi.settings({
          title: 'Culqi Store',
          currency: 'PEN',
          description: 'Polo Culqi lover',
          amount: 3500,
          order:"dsgjsdkgjnsdgkjbdgskjdgb"
      });
      // Usa la funcion Culqi.open() en el evento que desees
      $('#buyButton').on('click', function(e) {
          // Abre el formulario con las opciones de Culqi.settings
          Culqi.open();

          e.preventDefault();
      });

</script>
<script type="text/javascript">

      function culqi() {



          if (Culqi.token) { // ¡Objeto Token creado exitosamente!
              var token = Culqi.token.id;
              console.log('Se ha creado un token:' + token);
              // Aqui enviar token Id a servidor para crear cargo..

                 tokenLaravel=$("#_token").val();
                 dataCompra={tokenCukqui:token,compra:'compra'};
                 rutaPago=$("#_ajaxPago").val();

                 $.ajax({
                        type: 'POST',
                        url: rutaPago,
                        data: dataCompra,
                        dataType: 'JSON',
                        async : true,
                        headers:{'X-CSRF-TOKEN': tokenLaravel},
                   })
                   .done(( data, textStatus, jqXHR)=> {
                         console.log(data);
                         Culqi.close();
                   })
                   .fail(( data, textStatus, jqXHR)=> {
                     //console.log(data);
                   })
                   .always(function() {
                        console.log("complete");
                  });

          }
          else if (Culqi.order) {
              console.log(Culqi.order)

              console.log('Se ha elegido el metodo de pago en efectivo');

               /* Aqui enviar al servidor el order Id y asociarlo al detalle de tu venta.
                  Además, tu venta en tu comercio debe quedar estado pendiente.
                */
          }
          else { // ¡Hubo algún problema!
              // Mostramos JSON de objeto error en consola
              console.log(Culqi.error);
            //  console.log(Culqi.error.user_message);


                Culqi.close();
          }
  };
</script>
<script>
      var PlantillaCrearCita = {
              //Variables
                MesajeSaludo:'HelloWord',
                init : ()=> {

                    PlantillaCrearCita.General();
                    PlantillaCrearCita.btnLugar();
                    PlantillaCrearCita.btnServicio();
                },
                // Metodos
                sayMessage: mensaje=> {
                  alert("Hola como estas!!!");
                },
                General:()=>{
                   $(function() {
                      /*Funcionnes Genericas*/
                      $('.single').select2();

                      $('div.alert').not('.alert-important').delay(3000).fadeOut(350);

                      var now = moment();
                      /*Limpieza*/
                      PlantillaCrearCita.clean_form_input('#hora');
                      PlantillaCrearCita.form_select_default('#hora');

                      $('#form').on('submit', function(event){
                          event.preventDefault();
                          if($('#form').parsley().isValid())
                          {
                            PlantillaCrearCita.dataAjaxhora($("#form").serialize(),3);
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
                      btnLugar:()=>
                      {
                        $(document).on("change", ".select", event=> {
                              PlantillaCrearCita.clean_form_input('#hora');
                              PlantillaCrearCita.form_select_default('#hora');
                              PlantillaCrearCita.clean_form_input('.selectServicio');
                              PlantillaCrearCita.form_select_default('.selectServicio');

                              pselectItem=event.target.value;
                              dataJson={"lugar":pselectItem};
                              PlantillaCrearCita.dataAjaxhora(dataJson,2);
                         });
                      },
                      btnServicio:()=>{
                         $(document).on("change", ".selectServicio", event=> {
                              PlantillaCrearCita.clean_form_input('#hora');
                              PlantillaCrearCita.form_select_default('#hora');
                              let sede=$(".select").val();

                              ption=event.target.value;
                              if(ption!=0){
                                PlantillaCrearCita.date_ajax(ption,sede);
                              }

                         });
                      },
                      /*Ajax para buscar horas*/
                      dataAjaxhora:(...conditionValue)=>{
                          token=$("#_token").val();
                          if(conditionValue[1]==1){
                            rutaHora=`${$('#_ajaxBuscarCita').val()}`;
                          }else if(conditionValue[1]==2){
                            /*Buscar Servicios*/
                            rutaHora=`${$('#_ajaxSelecionarBuscar').val()}`;

                          }else{
                            rutaHora=`${$('#_ajaxGuardarCita').val()}`;
                          }

                            $.ajax({
                                  type: 'POST',
                                  url: rutaHora,
                                  data: conditionValue[0],
                                  dataType: 'JSON',
                                  async : true,
                                  headers:{'X-CSRF-TOKEN': token},
                             })
                             .done(( data, textStatus, jqXHR)=> {
                                  //console.log(data);

                                  switch(data.switch) {
                                        case 1:
                                           if(data.validar==1){
                                               PlantillaCrearCita.clean_form_input('.selectServicio');
                                               PlantillaCrearCita.form_select_default('.selectServicio');
                                               $.each( data.selecionar, ( index, value )=> {
                                                   PlantillaCrearCita.form_option_append('.selectServicio',index,value)
                                               });

                                            }else if(data.validar!=1){
                                               PlantillaCrearCita.toast_notification("error",'No se registrado algún servicio médico',2);
                                            }
                                          break;
                                        case 2:
                                            /*Guardado*/
                                           if(data.yeah==0){
                                              PlantillaCrearCita.toast_notification("error",'Tenemos un problema en el sistema',2);

                                           }else if(data.yeah==1){
                                              PlantillaCrearCita.toast_notification("success",'Se ha registrado satisfactoriamente',2);

                                               setTimeout(function(){
                                                location = '{{ route('citaprogramada.index') }}'
                                              },2000)
                                           }else if(data.yeah==2) {
                                              PlantillaCrearCita.toast_notification("warning",'Aun dispone de una cita activa.',2);

                                           }
                                          break;
                                        case 3:
                                          // code block
                                           PlantillaCrearCita.clean_form_input('#hora');
                                               PlantillaCrearCita.form_select_default('#hora');
                                               $.each( data.data, ( index, value )=> {
                                                   PlantillaCrearCita.form_option_append('#hora',index,value)
                                               });
                                          break;
                                        default:
                                          // code block
                                      }

                             })
                             .fail(( data, textStatus, jqXHR)=> {
                               //console.log(data);
                             });
                      },

                    /* AJAX - Funciones*/
                    date_ajax:(fecha=null,servicio=null,condition=null)=>{
                        //console.log(`${fecha} ${servicio}`)
                        token=$("#_token").val();
                        vurl=`${$("#_ajaxCrearCita").val()}/${fecha}/${servicio}`;

                        var promise =  $.ajax({
                                  type: 'GET',
                                  url: vurl,
                                  data: {'data': fecha },
                                  dataType: 'JSON',
                                  async : true,
                                  headers:{'X-CSRF-TOKEN': token},
                             })
                             .done(( data, textStatus, jqXHR)=> {
                                // console.log(data)
                               /* var fechas_array=[];
                                $.each( data, ( index, value )=> {
                                      fechas_array.push(value);
                                });*/
                             })
                             .fail(( data, textStatus, jqXHR)=> {
                               //console.log(data);
                             });

                            promise.done(function(data) {
                                 // console.log(data);

                                   var fechas_array=[];
                                   $.each( data.contenedor_fecha, ( index, value )=> {
                                        fechas_array.push(value);
                                    });

                                   if(data.bandera==1){
                                       PlantillaCrearCita.hide_form_input("#display_cita","block");
                                       PlantillaCrearCita.hide_form_input("#display_horario","block");
                                       PlantillaCrearCita.form_option_disable('#buttonCargar',false);

                                   }else{
                                       PlantillaCrearCita.hide_form_input("#display_cita","none");
                                       PlantillaCrearCita.hide_form_input("#display_horario","none");
                                       PlantillaCrearCita.form_option_disable('#buttonCargar',true);
                                   }

                                   $("#destiny").html(data.verificacion);
                                   var final=data.contenedor_fechaFinal
                                    /*$("#_array_data_2").val(fechas_array);
                                    console.log($("#_array_data_2").val());
                                    agua=$("#_array_data_2").val();*/
                                    $('#datepicker').datepicker('destroy');

                                    $('#datepicker').datepicker({
                                      language: "es",
                                       format: 'yyyy-mm-dd',
                                       orientation: "bottom",
                                       minDate: new Date(),
                                       startDate: "+0d",
                                       endDate:final,
                                       autoclose: true,
                                       calendarWeeks:false,
                                       daysOfWeekDisabled:[0,6],
                                       datesDisabled:fechas_array,
                                       /*beforeShowDay: function(date){
                                              var day = date.getDay();
                                              var dd = date.getDate();
                                              var mm = date.getMonth()+1;
                                              var yyyy = date.getFullYear();
                                              if(dd<10){
                                                  dd='0'+dd;
                                              }
                                              if(mm<10){
                                                  mm='0'+mm;
                                              }
                                              var date = yyyy+'-'+mm+'-'+dd;
                                       } ,*/
                                      }).on('changeDate', function(e) {
                                            // `e` here contains the extra attributes
                                            var day = e.date.getDay();
                                            var dd = e.date.getDate();
                                            var mm = e.date.getMonth()+1;
                                            var yyyy = e.date.getFullYear();
                                             if(dd<10){
                                                dd='0'+dd;
                                            }
                                            if(mm<10){
                                                mm='0'+mm;
                                            }
                                            var date = yyyy+'-'+mm+'-'+dd;

                                            lcugar=$("#lugar").val();
                                            serviValor=$(".selectServicio").val();
                                            console.log(serviValor);

                                            dataJson={"data":date ,"lugar":lcugar,'serv':serviValor};

                                            PlantillaCrearCita.dataAjaxhora(dataJson,1);
                                           // $(this).datepicker('hide');

                                      });
                          });

                    },

              };


              $(function() {
                culqi();
                //arranque de funciones y procesos que estan en el init
                  PlantillaCrearCita.init();
              });

</script>
@endsection