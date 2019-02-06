@extends('layouts.principal')
@section('navT')
        @include('partials.nav')
@endsection
@section('seccion_c')

<div class="container">
    <br><br>
    <div class="row">
      <div class="col text-center mt-3">
        <div class="section_title">Editar Role</div>
      </div>
    </div>
	  <br>
        {{Form::model($role_name, array('route' => array('role.update', $role_name->id),'id'=>'form'))}}

          <div class="form-group">
            {{ Form::label('Nombre del Role', 'Nombre del Role') }}
              {{ Form::text('role', $role_name->name,['class'=>'form-control','placeholder'=>'Ingresar Nombre','id'=>'role', 'readonly']) }}
          </div>
          <div class="form-group">
             {{ Form::label('permiso', 'Selecionar Permisos') }}
              {!! Form::select('permiso[]',$permisos, $selecionar_permisos, ['class'=>'form-control form-control-lg single select', 'data-parsley-required','multiple ', 'id'=>'permiso'
                                      ]) !!}


          </div>

           <button type="submit" " class="btn btn-info mb-2">Actualizar</button>
              <a href="{{ route('role.index') }}"  class="btn btn-warning mb-2">Regresar</a>
      	</form>
    <br><br>
</div>

<!-- Token -->
<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">

<!-- Url-->
<input type="hidden" name="_path" id="_path" value="{{route('role.update',':id')}}">


@endsection

@section('javascript')
	<script>

		var PlantillaRoles = {
              //Variables
                MesajeSaludo:'HelloWord',
                init : ()=> {

                    PlantillaRoles.General();

                    PlantillaRoles.btnGuardar();


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
                      form_prepend_only:(destiny,value)=>{
                      	$(destiny).prepend(value);
                      },
                      btnGuardar:()=>{
                      	$('#form').on('submit', function(event){
                          event.preventDefault();
                          form_to=$(this);
                          if($('#form').parsley().isValid())
                          {
                            formSerialize=form_to.attr('action');
                            dataSerialize=form_to.serialize();
                          	form_value=dataSerialize;
                          	token=$("#_token").val();
                          	PlantillaRoles.ajaxSave(dataSerialize,formSerialize,token);
                          }
                      });

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
                             //  console.log(data);

                                if(data.data==1){
                                	PlantillaRoles.toast_notification("success",'Guardado Correctamente!!!',2);
                                	PlantillaRoles.clean_form_input('#permiso');
                                	PlantillaRoles.form_prepend_only('#permiso',data.selecionado);


                            	}else{
                            		PlantillaRoles.toast_notification("error",'No fue posible guardar los datos',2);
                            	}

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