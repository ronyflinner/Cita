@extends('layouts.principal')

@section('navT')
       @include('partials.nav')
@endsection
@section('seccion_c')

		<div class="container">
		    <br><br>
		    <div class="row">
		      <div class="col text-center mt-3">
		        <div class="section_title"><h3>Consultar Información</h3></div>
		      </div>
		    </div>
		    <br><br>

			<div class="container">
		      <div class="row">

		      	{!! Form::open(['route'=>'admin.storeManualCita','name'=>'form', 'method'=>'POST',"class"=>"form ",'files' => false, 'id'=>'form']) !!}

		      	 <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                      {{ Form::label('tipoDocumento', 'Tipo de Documento') }}
            		  {!! Form::select('tipo',$tipoDocumento, '', ['class'=>'form-control form-control-lg single select', 'data-parsley-required', 'id'=>'tipo'
                                  ]) !!}
                      <div class="validation"></div>
                    </div>
                  </div>
				 <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                      {{ Form::label('numero_documento', 'N° de Documento') }}
					    {{ Form::text('numero', null,['class'=>'form-control dni','data-parsley-required  ','id'=>'dni']) }}
                      <div class="validation"></div>
                    </div>
                  </div>
                  <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                      <br>
                     <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                  </div>
		      </div>

		    </div>

		    <div class="container">
		    	<div class="row">
		    		<div id="destinyManual" class="destinyManual">

		    		</div>
		    	</div>
		    </div>

		    {!! Form::close() !!}

		<br><br>
	<!-- Token -->
<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">



</div>

@endsection

@section('javascript')
	<script>

		var PlantillaRoles = {
              //Variables
                MesajeSaludo:'HelloWord',
                init : ()=> {
                    PlantillaRoles.General();

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
                      /*Limpieza*/
                      $('#form').on('submit', function(event){
                          event.preventDefault();
                          form_to=$(this);


                          if($('#form').parsley().isValid())
                          {

                            formSerialize=form_to.attr('action');
                            dataSerialize=form_to.serialize();
                            tokenUser=$("#_token").val();
                            //console.log(dataSerialize);
                            PlantillaRoles.ajaxSave(dataSerialize,formSerialize,tokenUser);
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
                             		console.log(data);

                                	PlantillaRoles.toast_notification("success",'Guardado Correctaente!!!',2);

                                	$("#destinyManual").html(data.formulario);

                             })
                             .fail(( data, textStatus, jqXHR)=> {
                               //console.log(data);
                             });



                      },




              };


              $(function() {
                //arranque de funciones y procesos que estan en el init
                  PlantillaRoles.init();
              });

	</script>

@endsection