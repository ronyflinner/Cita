@extends('layouts.principal')
@section('navT')
        @include('partials.nav')
@endsection
@section('seccion_c')
<div class="container">
	<br><br>
	 <div class="row">
      <div class="col text-center mt-3">
        <div class="section_title">Editar Usuario</div>
      </div>
    </div>
	<br><br>

		<div class="container">
		{{Form::model($user, array('route' => array('usuario.update', $user[0]->id),'id'=>'form'))}}

		 	@php
            		$var=exploid_blade($user[0]->dni,1);
            @endphp

			<div class="col-md-10 offset-1">
			{{ Form::token() }}
            <div class="form-group">
              {{ Form::label('tipoDocumento', 'Tipo de Documento') }}
              {!! Form::select('tipo',$tipoDocumento, $var[0], ['class'=>'form-control form-control-lg single1 select', 'data-parsley-required', 'id'=>'tipo'
                                  ]) !!}
            </div>


			<div class="form-group">
		    {{ Form::label('numero_documento', 'Número de Documento') }}
		    {{ Form::text('numero',$var[1] ,['class'=>'form-control dni','data-parsley-required  ','id'=>'dni']) }}
		    </div>
		    <div class="form-group">
			{{ Form::label('email', 'Correo') }}
		    {{ Form::email('email', $user[0]->email,  ['class'=>'form-control', 'data-parsley-type="email" data-parsley-required','id'=>'correo']) }}
		    </div>
		    <div class="form-group">
			{{ Form::label('nombre', 'Nombre') }}
		    {{ Form::text('nombre', $user[0]->name,['class'=>'form-control','data-parsley-required','id'=>'nombre']) }}
		    </div>
		    <div class="form-group">
		   	{{ Form::label('apellidoP', 'Apellido Paterno') }}
		    {{ Form::text('apellido_paterno', $user[0]->apellidoP,['class'=>'form-control','data-parsley-required','id'=>'apellidoP']) }}
		    </div>
            <div class="form-group">
              {{ Form::label('apellidoM', 'Apellido Materno') }}
              {{ Form::text('apellido_materno', $user[0]->apellidoM,['class'=>'form-control','data-parsley-required','id'=>'apellidoM']) }}
            </div>
            <div class="form-group">
              {{ Form::label('telefono', 'Telefóno') }}
              {{ Form::text('telefono', $user[0]->numero,['class'=>'form-control','data-parsley-required','id'=>'telefono']) }}
            </div>
            <div class="form-group">
			    {{ Form::label('clave', 'Activar Cambio de Clave: ') }}
			   Si {{ Form::radio('activo', '1' ) }}
			   No {{ Form::radio('activo', '2', 'checked') }}
		 	</div>

		    <div class="form-group">
			    {{ Form::label('clave', 'Clave') }}
			    {{ Form::password('clave', ['class' => 'form-control','data-parsley-required data-parsley-equalto="#repetir-clave" data-parsley-excluded="true"','id'=>'clave','disabled']) }}
		 	</div>
		    <div class="form-group">
			    {{ Form::label('repetir-clave', 'Repetir-Clave') }}
			    {{ Form::password('repetir-clave', ['class' => 'form-control','data-parsley-required data-parsley-equalto="#clave" data-parsley-excluded="true"','id'=>'repetir-clave', 'disabled']) }}
		    </div>

  			<div class="form-group">
	          {{ Form::label('tipo', 'Tipo') }}
	          {!! Form::select('tipoUsuario',[''=>'Selecionar','2'=>'Usuario','3'=>'Doctor'], $user[0]->tipo, ['class'=>'form-control form-control-lg single select','data-parsley-required', 'id'=>'role']) !!}
			</div>
	        <div class="form-group">
			    {{ Form::label('role', 'Role') }}
			   	{!! Form::select('role',$role, $role_id, ['class'=>'form-control form-control-lg single select', 'data-parsley-required', 'id'=>'role']) !!}
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
                    PlantillaRoles.btnActive();

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
                      btnActive:()=>{

                      	$( "input[name=activo]:radio" ).click(function(event) {
                      		/* Act on the event */
                      		console.warn($(this).val());

                      		if($(this).val()==1){

                      			$("#clave").attr('data-parsley-excluded', false);
                      			$("#repetir-clave").attr('data-parsley-excluded', false);

                      			 PlantillaRoles.form_option_disable("#clave",false);
                      			 PlantillaRoles.form_option_disable("#repetir-clave",false);
                      		}else{
                      			$("#clave").attr('data-parsley-excluded', true);
                      			$("#repetir-clave").attr('data-parsley-excluded', true);

                      			 PlantillaRoles.form_option_disable("#clave",true);
                      			 PlantillaRoles.form_option_disable("#repetir-clave",true);
                      		}
                      	});


                      	//clave repetir-clave
                      },
                      ajaxSave:(data,vurl,token)=>{

                             $.ajax({
                                  type: 'PUT',
                                  url: vurl,
                                  data: data,
                                  dataType: 'JSON',
                                  async : true,
                                  headers:{'X-CSRF-TOKEN': token},
                             })
                             .done(( data, textStatus, jqXHR)=> {
                             		//console.warn(data);
                                	PlantillaRoles.toast_notification("success",'Guardado Correctaente!!!',2);

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