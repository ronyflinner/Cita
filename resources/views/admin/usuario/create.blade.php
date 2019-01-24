@extends('layouts.principal')
@section('navT')
        @include('partials.navAdmin')
@endsection
@section('seccion_c')

<div class="container">
	<br><br>
	 <div class="row">
      <div class="col text-center mt-3">
        <div class="section_title">Crear Usuario</div>
      </div>
    </div>
	<br><br>

		<div class="container">
			<div class="col-md-10 offset-1">
				{!! Form::open(['route'=>'usuario.store','name'=>'form', 'method'=>'POST',"class"=>"form ",'files' => false, 'id'=>'form']) !!}

						{{ Form::token() }}
						<div class="form-group">
					    {{ Form::label('dni', 'DNI') }}
					    {{ Form::text('dni', null,['class'=>'form-control dni','data-parsley-required  ','id'=>'dni']) }}
					  </div>
					  <div class="form-group">
						{{ Form::label('email', 'Correo') }}
					    {{ Form::email('email', null,  ['class'=>'form-control', 'data-parsley-type="email" data-parsley-required','id'=>'correo']) }}
					  </div>
					  <div class="form-group">
						{{ Form::label('nombre', 'Nombre') }}
					    {{ Form::text('nombre', null,['class'=>'form-control','data-parsley-required','id'=>'nombre']) }}
					  </div>
					   <div class="form-group">
					   	{{ Form::label('apellido', 'Apellido') }}
					    {{ Form::text('apellido', null,['class'=>'form-control','data-parsley-required','id'=>'apellido']) }}
					  </div>
					  <div class="form-group">
					    {{ Form::label('clave', 'Clave') }}
					    {{ Form::password('clave', ['class' => 'form-control','data-parsley-required data-parsley-equalto="#repetir-clave"','id'=>'clave']) }}
					  </div>
					    <div class="form-group">
					    {{ Form::label('repetir-clave', 'Clave') }}
					    {{ Form::password('repetir-clave', ['class' => 'form-control','data-parsley-required data-parsley-equalto="#clave"','id'=>'repetir-clave']) }}
					  </div>
					   <div class="form-group">
					    <label for="apellido">Role</label>
					     {{ Form::label('repetir-clave', 'Clave') }}
					   	{!! Form::select('role',$role, '', ['class'=>'form-control form-control-lg single1 select', 'data-parsley-required', 'id'=>'role'
                                  ]) !!}
					  </div>
					  <br>

					  <button type="submit" class="btn btn-primary">Enviar</button>
					  <a href="{{ route('usuario.index') }}" class="btn btn-warning">Regresar</a>
				{!! Form::close() !!}

			</div>


		</div>

</div>

<!-- Token -->
<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">



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
                      /*Funcionnes Genericas*/
                      $('.single').select2();

                      $('.dni').mask('00000000');

                      $('div.alert').not('.alert-important').delay(3000).fadeOut(350);

                      var now = moment();
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

                              /*  if(data.data==1){
                                	PlantillaRoles.toast_notification("success",'Guardado Correctaente!!!',2);

                              	}else{
                              		PlantillaRoles.toast_notification("error",'No fue posible guardar los datos',2);
                              	} */

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