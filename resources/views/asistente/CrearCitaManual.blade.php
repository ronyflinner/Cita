@extends('layouts.principal')

@section('navT')
       @include('partials.nav')
@endsection
@section('seccion_c')

		<div class="container">
		    <br><br>
		    <div class="row wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
		      <div class="col text-center mt-3">
		        <div class="section_title wow lightSpeedIn" data-wow-delay="0.1s"><h3>Consultar Información</h3></div>
		      </div>
		    </div>
		    <br><br>

			<div class="container">
		      <div class="row text-center" >
		      	{!! Form::open(['route'=>'admin.storeManualCita','name'=>'formSearchUsers', 'method'=>'POST',"class"=>"form ",'files' => false, 'id'=>'formSearchUsers']) !!}

		      	 <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
                      {{ Form::label('tipoDocumento', 'Tipo de Documento') }}
            		  {!! Form::select('tipo',$tipoDocumento, '', ['class'=>'form-control form-control-lg  ', 'data-parsley-required', 'id'=>'tipo'
                                  ]) !!}
                      <div class="validation"></div>
                    </div>
                  </div>
				 <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
                      {{ Form::label('numero_documento', 'N° de Documento') }}
					    {{ Form::text('numero', null,['class'=>'form-control dni','data-parsley-required  ','id'=>'dni']) }}
                      <div class="validation"></div>
                    </div>
                  </div>
                  <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                      <br>
                     <button type="submit" class="btn btn-primary wow bounceIn" data-wow-delay="0.4s">Buscar</button>
                    </div>
                  </div>
		      </div>

		    </div>

		    {!! Form::close() !!}

		<br><br>

		<div style="display:none;" id="citaOculta">
				 <form class="form" id="form" method="POST" name="form" action="https://checkout.payulatam.com/ppp-web-gateway-payu/" accept-charset="UTF-8" >


              {!! Form::token() !!}
              <!-- Icon Box -->
                <div class="container">
                      <div class="row">
                             <div class="col-md-offset-2 col-md-8">
                                <div class="form-group wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
                                  <label for="sel1">Seleccionar Centro de Prevención:</label>
                                  {!! Form::select('lugar',[], '', ['class'=>'form-control form-control-lg single select', 'required', 'id'=>'lugar'
                                  ]) !!}
                                </div>
                                 <div class="form-group wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
                                  <label for="sel1">Seleccionar Servicio:</label>
                                  {!! Form::select('servicio',[''=>'Selecionar'], '', ['class'=>'form-control form-control-lg single selectServicio', 'required', 'id'=>'servicio'
                                  ]) !!}
                                </div>
                                <div class="form-group wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s" id="display_cita" style="display: block;">
                                  <label for="sel1">Seleccionar Fecha de Cita:</label>
                                  {!! Form::text('date', Carbon\Carbon::now()->format('Y-m-d'), ['id'=>'datepicker','class'=>'form-control datepicker clicl', 'readonly', 'placeholder'=>'','required' ]) !!}
                                </div>
                                 <div class="form-group wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s" id="display_horario" style="display: block;">
                                  <label for="sel1">Seleccionar Horario:</label>
                                  {!! Form::select('hora',[], '', ['class'=>'form-control form-control-lg single', 'id'=>'hora' ,'required']) !!}
                                </div>
                                 <div id="destiny" >
                              </div>

                            </div>

                      </div>

               </div>

                <input name='userId' id='userId'   type='hidden'  value="" >
                <input name='userValid' id='userValid'   type='hidden'  value='1' >


            <br><br><br>

                <input name='merchantId' id="merchantId"   type='hidden'  value=''   >
                <input name='accountId'   id="accountId"  type='hidden'  value='' >
                <input name='description'  id="description" type='hidden'  value=''  >
                <input name='referenceCode'  id='referenceCode'  type='hidden' value='' >
                <input name='amount'       id='amount' type='hidden'  value=''   >
                <input name='tax'         id="tax"  type='hidden'  value='0'  >
                <input name='taxReturnBase' id="taxReturnBase" type='hidden'  value='0' >
                <input name='currency' id="currency"     type='hidden'  value='PEN' >
                <input name='signature'    id="signature" type='hidden'  value=''  >
                <input name='buyerEmail' id="userEmail"   type='hidden'  value="" >
                <input name='test'          type='hidden'  value='0' >
                <input name='responseUrl'    type='hidden'  value='{{ route('respuestaAsistente') }}' >
                <input name='confirmationUrl' type='hidden' value='https://www.ligacancer.org.pe/confirmacionPayu.php'>

            <div class="row">
              <div class="col text-center">
                <button type="submit" disabled="" id="buttonCargar" class="btn btn-success wow bounceIn" data-wow-delay="0.4s"><span>Pagar Cita</span></button>
                 {!! Form::close() !!}
              </div>
              <br><br>
			</div>
		</div>


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

<!-- Ruta Payu-->
<input type="hidden" name="_ajaxPagoPayuFormulario" id="_ajaxPayuFormulario" value="{{route('admin.ajax.ajaxPayuFormulario')}}">



</div>

@endsection

@section('javascript')


<!-- datapicker-->
{{ Html::style('medico/css/bootstrap-datepicker.css') }}
{{ Html::script('medico/js/bootstrap-datepicker.min.js') }}

	<script>

		var PlantillaCrearCitaManual = {
              //Variables
                MesajeSaludo:'HelloWord',
                init : ()=> {
                    PlantillaCrearCitaManual.General();
                    PlantillaCrearCitaManual.btnLugar();
                    PlantillaCrearCitaManual.btnServicio();
                    PlantillaCrearCitaManual.btnHora();

                },
                // Metodos
                sayMessage: mensaje=> {
                  alert("Hola como estas!!!");
                },
                General:()=>{
                   $(function() {
                      var now = moment();
                      /*Funcionnes Genericas*/
                      $('.single').select2();
                      $('.dni').mask('000000000');
                      $('#telefono').mask('(51)000000000');
                      $('div.alert').not('.alert-important').delay(3000).fadeOut(350);


                      if({{ $mensaje }}==1){

                            PlantillaCrearCitaManual.toast_notification("success",'Operación Realizada Correctamente!!!',2);
                      }

                       /*Limpieza*/
                      PlantillaCrearCitaManual.clean_form_input('#hora');
                      PlantillaCrearCitaManual.form_select_default('#hora');


                      $('#formSearchUsers').on('submit', function(event){
                          event.preventDefault();
                          form_to=$(this);

	                      if($('#formSearchUsers').parsley().isValid())
	                      {
                          PlantillaCrearCitaManual.form_option_disable('#buttonCargar',true);
                            /*Ocultar Busqueda*/

                          formCitaId=['#lugar','#servicio','#hora'];

                           $.each(formCitaId, function( index, value ) {
                             PlantillaCrearCitaManual.clean_form_input(value);
                             PlantillaCrearCitaManual.form_select_default(value);
                          });
                             PlantillaCrearCitaManual.clean_form_input('#datepicker');

                          PlantillaCrearCitaManual.hide_form_input("#citaOculta","none");


	                        formSerialize=form_to.attr('action');
	                        dataSerialize=form_to.serialize();
	                        tokenUser=$("#_token").val();
	                        //console.log(dataSerialize);
	                        PlantillaCrearCitaManual.ajaxSave(dataSerialize,formSerialize,tokenUser);
	                      }
                      });

	                    $('#form').on('submit', function(event){
	                          event.preventDefault();
	                          if($('#form').parsley().isValid())
	                          {
	                            var result = confirm("¿Listo para cancerla la Cita? ");
	                            if (result) {
	                              //  document.getElementById("form").submit();
	                              PlantillaCrearCitaManual.dataAjaxhora($("#form").serialize(),3);


	                            }

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

                              PlantillaCrearCitaManual.clean_form_input('#hora');
                              PlantillaCrearCitaManual.form_select_default('#hora');
                              PlantillaCrearCitaManual.clean_form_input('.selectServicio');
                              PlantillaCrearCitaManual.form_select_default('.selectServicio');
                              PlantillaCrearCitaManual.form_option_disable('#buttonCargar',true);

                              pselectItem=event.target.value;

                              dataJson={"lugar":pselectItem};
                              PlantillaCrearCitaManual.dataAjaxhora(dataJson,2);
                         });
                      },
                      btnServicio:()=>{
                        $(document).on("change", ".selectServicio", event=> {

                              PlantillaCrearCitaManual.clean_form_input('#hora');
                              PlantillaCrearCitaManual.form_select_default('#hora');

                              PlantillaCrearCitaManual.form_option_disable('#buttonCargar',true);

                              //let sede=$("#lugar").val();
                              let sede=$('select[name=lugar]').val();

                              pServicio=event.target.value;

                              //console.log(`Servicio  ${pServicio}  lugar  ${sede}`);

                              if(pServicio!=0){
                                PlantillaCrearCitaManual.date_ajax(sede,pServicio);

                              }

                        });
                      },
                      btnHora:()=>{
                        $(document).on("change", "#hora", event=> {
                             // console.log('Hora');

                              ption=event.target.value;
                               token=$("#_token").val();
                              if(ption!=0){
                                PlantillaCrearCitaManual.form_option_disable('#buttonCargar',false);

                                let USERVALID = $("#userValid").val();
                                let USERID = $("#userId").val();

                                 data={'servicio': $('select[name=servicio]').val(),
                                        'uservalid':USERVALID,
                                        'userid':USERID,
                                      };



                                 $.ajax({
                                    type: 'POST',
                                    url:$("#_ajaxPayuFormulario").val(),
                                    data: data,
                                    dataType: 'JSON',
                                    async : true,
                                    headers:{'X-CSRF-TOKEN': token},
                                 })
                                 .done(function(data, textStatus, jqXHR) {
                                  //  console.log(data);

                                   $("#referenceCode").val(data.referenceCode);
                                   $("#amount").val(data.amount);
                                   $("#signature").val(data.signature);
                                   $("#currency").val(data.currency);

                                   $("#merchantId").val(data.merchantId);
                                   $("#accountId").val(data.accountId);
                                   $("#description").val(data.description);
                                   $("#tax").val(data.tax);
                                   $("#taxReturnBase").val(data.tax);


                                 })
                                 .fail(function() {
                                   console.log("error");
                                 })
                                 .always(function() {
                                   console.log("complete");
                                 });


                              }else{
                                 PlantillaCrearCitaManual.form_option_disable('#buttonCargar',true);
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
                                               PlantillaCrearCitaManual.clean_form_input('.selectServicio');
                                               PlantillaCrearCitaManual.form_select_default('.selectServicio');
                                               $.each( data.selecionar, ( index, value )=> {
                                                   PlantillaCrearCitaManual.form_option_append('.selectServicio',index,value)
                                               });

                                            }else if(data.validar!=1){
                                               PlantillaCrearCitaManual.toast_notification("error",'No se registrado algún servicio médico',2);
                                            }
                                          break;
                                        case 2:
                                            /*Guardado*/
                                           if(data.yeah==0){
                                              PlantillaCrearCitaManual.toast_notification("error",'Tenemos un problema en el sistema',2);

                                           }else if(data.yeah==1){
                                              PlantillaCrearCitaManual.toast_notification("success",'Se ha registrado satisfactoriamente',2);

                                              document.getElementById("form").submit();

                                              /* setTimeout(function(){
                                                location = '{ { route('citaprogramada.index') }}'
                                              },2000)*/
                                           }else if(data.yeah==2) {

                                              PlantillaCrearCitaManual.toast_notification("warning",'Aun dispone de una cita activa.',2);

                                           }
                                          break;
                                        case 3:
                                          // code block
                                           PlantillaCrearCitaManual.clean_form_input('#hora');
                                               PlantillaCrearCitaManual.form_select_default('#hora');
                                               $.each( data.data, ( index, value )=> {
                                                   PlantillaCrearCitaManual.form_option_append('#hora',index,value)
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
                      date_ajax:(fechaLugar=null,servicio=null,condition=null)=>{
                          console.log(`${fechaLugar} ${servicio}`)
                          token=$("#_token").val();
                          vurl=`${$("#_ajaxCrearCita").val()}/${fechaLugar}/${servicio}`;

                          var promise =  $.ajax({
                                    type: 'GET',
                                    url: vurl,
                                    data: {'data': fechaLugar },
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
                                    console.log(data);

                                     var fechas_array=[];
                                     $.each( data.contenedor_fecha, ( index, value )=> {
                                          fechas_array.push(value);
                                      });

                                     if(data.bandera==1){
                                         PlantillaCrearCitaManual.hide_form_input("#display_cita","block");
                                         PlantillaCrearCitaManual.hide_form_input("#display_horario","block");

                                     }else{
                                         PlantillaCrearCitaManual.hide_form_input("#display_cita","none");
                                         PlantillaCrearCitaManual.hide_form_input("#display_horario","none");

                                     }

                                     $("#destiny").html(data.verificacion);
                                     var final=data.contenedor_fechaFinal
                                      /*$("#_array_data_2").val(fechas_array);
                                      console.log($("#_array_data_2").val());
                                      agua=$("#_array_data_2").val();*/
                                      $('#datepicker').datepicker('remove');

                                        $.fn.datepicker.dates['es'] = {
                                        days: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado"],
                                        daysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                                        daysMin: ["Do","Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                                        months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                                        monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                                        today: "Hoy",
                                        clear: "Limpiar",
                                        format: "yyy-mm-dd",
                                        titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
                                        weekStart: 0
                                    };

                                      $('#datepicker').datepicker({
                                         language: "es",
                                         format: 'yyyy-mm-dd',
                                         orientation: "bottom auto",
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


                                              dataJson={"data":date ,"lugar":lcugar,'serv':serviValor};

                                              PlantillaCrearCitaManual.dataAjaxhora(dataJson,1);
                                             // $(this).datepicker('hide');

                                        });
                            });

                      },

                      /*AJAX - Buscar*/
                     ajaxSave:(data,vurl,token)=>{

                             $.ajax({
                                  type: 'POST',
                                  url: vurl,
                                  data: data,
                                  dataType: 'JSON',
                                  async : true,
                                  headers:{'X-CSRF-TOKEN': token},
                             })
                             .done(( data, textStatus, jqXHR)=> {

                                  rutaCrear='{{ route('usuario.create') }}';
                                  cieloPatha=`No hemos encontrado al usuario. Haga clic para <a class='btn btn-success' href='${rutaCrear}'>Crear Usuario</a>`;

                                   if(data.validarCita>0){
                                       $("#userId").val('');
                                       $("#userEmail").val('');

                                       $("#userId").val(data.data[0].id);
                                       $("#userEmail").val(data.data[0].email);

                                   }

                                   switch(data.mensaje) {
                                      case 1:
                                        // code block Positive

                                        $.each( data.lugar, function( index, value ) {
                                              $("#lugar").append('<option value='+index+'>'+ value+' </option>' );
                                        });

                                        PlantillaCrearCitaManual.toast_notification("success",'Datos Buscado Correctamente!!!',2);
                                        PlantillaCrearCitaManual.hide_form_input("#citaOculta","block");

                                        break;
                                      case 2:
                                         // code block Unknows


                                          PlantillaCrearCitaManual.toast_notification("error",cieloPatha,2);

                                        break;
                                      default:
                                          // code block advertising
                                          PlantillaCrearCitaManual.toast_notification("warning",'Dispone de una cita activa actualmente!!',2);
                                    }



                             })
                             .fail(( data, textStatus, jqXHR)=> {
                               //console.log(data);
                             });



                      },




              };


              $(function() {
                //arranque de funciones y procesos que estan en el init
                   PlantillaCrearCitaManual.init();
              });

	</script>

@endsection

