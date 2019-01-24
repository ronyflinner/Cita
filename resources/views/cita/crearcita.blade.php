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
                                  {!! Form::select('lugar',$lugar, '', ['class'=>'form-control form-control-lg single1 select', 'required', 'id'=>'lugar'
                                  ]) !!}
                                </div>
                                <div class="form-group" id="display_cita" style="display: none;">
                                  <label for="sel1">Seleccionar Fecha de Cita:</label>
                                  {!! Form::text('date', Carbon\Carbon::now()->format('Y-m-d'), ['id'=>'datepicker','class'=>'form-control datepicker clicl', 'readonly', 'placeholder'=>'','required' ]) !!}
                                </div>
                                 <div class="form-group" id="display_horario" style="display: none;">
                                  <label for="sel1">Seleccionar Horario:</label>
                                  {!! Form::select('hora',[], '', ['class'=>'form-control form-control-lg single1', 'id'=>'hora' ,'required']) !!}
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

<!-- Token -->
<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">

<!-- Customer -->
<input type="hidden" name="_ajaxCrearCita" id="_ajaxCrearCita" value="{{route('admin.ajax.crearCita')}}">

<!-- guardar-->
<input type="hidden" name="_ajaxGuardarCita" id="_ajaxGuardarCita" value="{{route('crearcita.store')}}">



<!--Fecha a hora-->
<input type="hidden" name="_ajaxBuscarCita" id="_ajaxBuscarCita" value="{{route('admin.ajax.buscarCita')}}">



@endsection

@section('javascript')
<script>
      var PlantillaCrearCita = {
              //Variables
                MesajeSaludo:'HelloWord',
                init : ()=> {

                    PlantillaCrearCita.General();
                    PlantillaCrearCita.buttonLugar();
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
                            PlantillaCrearCita.dataAjaxhora($("#form").serialize(),2);
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
                      buttonLugar:()=>
                      {

                        $(document).on("change", ".select", event=> {
                              PlantillaCrearCita.clean_form_input('#hora');
                              PlantillaCrearCita.form_select_default('#hora');

                              ption=event.target.value;
                              if(ption!=0){
                                PlantillaCrearCita.date_ajax(ption);
                              }

                         });
                      },
                      /*Ajax para buscar horas*/
                      dataAjaxhora:(...conditionValue)=>{
                          token=$("#_token").val();
                          if(conditionValue[1]==1){
                            rutaHora=`${$('#_ajaxBuscarCita').val()}`;
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

                                // console.log(data);

                                 if(data.yeah==0){
                                    PlantillaCrearCita.toast_notification("error",'Tenemos un problema en el sistema',2);

                                 }else if(data.yeah==1){
                                    PlantillaCrearCita.toast_notification("success",'Se ha registrado satisfactoriamente',2);

                                     setTimeout(function(){
                                      location = '{{ route('citaprogramada.index') }}'
                                    },2000)


                                 }else if(data.yeah==2) {
                                    PlantillaCrearCita.toast_notification("warning",'Aun dispone de una cita activa.',2);

                                 }else{
                                     PlantillaCrearCita.clean_form_input('#hora');
                                     PlantillaCrearCita.form_select_default('#hora');
                                     $.each( data, ( index, value )=> {
                                         PlantillaCrearCita.form_option_append('#hora',index,value)
                                     });
                                 }



                             })
                             .fail(( data, textStatus, jqXHR)=> {
                               //console.log(data);
                             });
                      },

                    /* AJ*/

                    /* AJAX - Funciones*/
                    date_ajax:(fecha=null,condition=null)=>{
                        token=$("#_token").val();
                        vurl=`${$("#_ajaxCrearCita").val()}/${fecha}`;

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
                                  console.log(data);

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

                                            dataJson={"data":date ,"lugar":lcugar};



                                            PlantillaCrearCita.dataAjaxhora(dataJson,1);
                                           // $(this).datepicker('hide');

                                      });
                          });

                    },

              };


              $(function() {
                //arranque de funciones y procesos que estan en el init
                  PlantillaCrearCita.init();
              });

</script>


@endsection