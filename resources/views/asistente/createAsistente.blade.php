@extends('layouts.principal')
@section('navT')
        @include('partials.nav')
@endsection
@section('seccion_c')

<div class="container">
	<br><br>
	 <div class="row">
      <div class=" text-center ">
        <div class="section_title wow lightSpeedIn" data-wow-delay="0.1s"><h3>Crear Usuario</h3></div>
      </div>
    </div>
	<br><br>

		<div class="container">
			<div class="col-md-12 ">
				 {!! Form::open(['route'=>'usuario.store','name'=>'form', 'method'=>'POST',"class"=>"form ",'files' => false, 'id'=>'form']) !!}

						{{ Form::token() }}
            <div class="form-group wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
              {{ Form::label('tipoDocumento', 'Tipo de Documento') }}
              {!! Form::select('tipo',$tipoDocumento, '', ['class'=>'form-control form-control-lg  select', 'data-parsley-required', 'id'=>'tipo'
                                  ]) !!}
            </div>

             <input type="hidden" id="verificar" name="verificar" value="1">
             <!-- Verificar-->
             <input type="hidden" id="tipoUsuario" name="tipoUsuario" value="2">
             <input type="hidden" id="role" name="role" value="3">


						<div class="form-group wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
					    {{ Form::label('numero_documento', 'Número de Documento') }}
					    {{ Form::text('numero', null,['class'=>'form-control dni','data-parsley-required  ','id'=>'dni']) }}
					  </div>
					  <div class="form-group wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
						{{ Form::label('email', 'Correo') }}
					    {{ Form::email('email', null,  ['class'=>'form-control', 'data-parsley-type="email" data-parsley-required','id'=>'correo']) }}
					  </div>
					  <div class="form-group wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
						{{ Form::label('nombre', 'Nombre') }}
					    {{ Form::text('nombre', null,['class'=>'form-control','data-parsley-required','id'=>'nombre']) }}
					  </div>
					   <div class="form-group wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
					   	{{ Form::label('apellidoP', 'Apellido Paterno') }}
					    {{ Form::text('apellido_paterno', null,['class'=>'form-control','data-parsley-required','id'=>'apellidoP']) }}
					  </div>
             <div class="form-group wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
              {{ Form::label('apellidoM', 'Apellido Materno') }}
              {{ Form::text('apellido_materno', null,['class'=>'form-control','data-parsley-required','id'=>'apellidoM']) }}
            </div>
             <div class="form-group wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
               {{ Form::label('genero', 'Genero',['class'=>'col-md-4 control-label']) }}

                {!! Form::select('genero',[''=>"Selecionar", '1'=>'Masculino', '2'=>'Femenino'], '', ['class'=>'form-control form-control singl1e', 'data-parsley-required', 'id'=>'genero'
                  ]) !!}


            </div>
             <div class="form-group wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">

              {{ Form::label('fecha_nacimiento', 'Fecha de Nacimiento',['class'=>'col-md-4 control-label']) }}

              {{ Form::text('fecha_nacimiento', null,['class'=>'form-control','data-parsley-required','id'=>'datepicker', 'readonly']) }}

             </div>
            <div class="form-group wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
              {{ Form::label('telefono', 'Telefóno') }}
              {{ Form::text('telefono', null,['class'=>'form-control','data-parsley-required','id'=>'telefono']) }}
            </div>
					  <div class="form-group wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
					    {{ Form::label('clave', 'Clave') }}
					    {{ Form::password('clave', ['class' => 'form-control','data-parsley-required data-parsley-equalto="#repetir-clave"','id'=>'clave']) }}
					  </div>
					    <div class="form-group wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
					    {{ Form::label('repetir-clave', 'Repetir-Clave') }}
					    {{ Form::password('repetir-clave', ['class' => 'form-control','data-parsley-required data-parsley-equalto="#clave"','id'=>'repetir-clave']) }}
					  </div>

            <br>
            <br>
					  <button type="submit" class="btn btn-primary wow bounceIn" data-wow-delay="0.4s">Registrar</button>

				    {!! Form::close() !!}

              <br>
                <br>
                <br>
                <br>


			</div>



		</div>

</div>

<!-- Token -->
<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">



@endsection

@section('javascript')}
<!-- datapicker-->
{{ Html::script('medico/js/i18n/bootstrap-datepicker.es.js') }}
{{ Html::style('medico/css/bootstrap-datepicker-clean.css') }}
{{ Html::script('medico/js/bootstrap-datepicker.min.js') }}


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

                            PlantillaRoles.ajaxSave(dataSerialize,formSerialize,tokenUser);
                          }
                      });

                        $('#datepicker').datepicker({
                           format: 'yyyy-mm-dd',
                           language: 'es'
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

                                	 //   console.log(data);

                                    if(data.messages==1){
                                        PlantillaRoles.toast_notification("success",'Guardado Correctamente!!!',2);

                                    }else{
                                      PlantillaRoles.toast_notification("warning",'Hemos tenido inconveniente para registrar los datos',2);

                                    }

                                    setTimeout(function(){
                                      location = '{{ route('usuario.index') }}'
                                    },2000)

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