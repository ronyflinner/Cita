@extends('layouts.principal')
@section('navT')
        @include('partials.nav')
@endsection
@section('seccion_c')

<div class="container">


    <br><br>
    <div class="row">
      <div class="col text-center mt-3">
        <div class="section_title">Lista de Role</div>
      </div>
    </div>
	  <br>
        {!! Form::open(['route'=>'role.store','name'=>'form', 'method'=>'POST',"class"=>"form ",'files' => false, 'id'=>'form']) !!}


          <div class="form-group">
            {{ Form::label('Nombre del Role', 'Nombre del Role') }}
              {{ Form::text('role',null,['class'=>'form-control','placeholder'=>'Ingresar Nombre','id'=>'role','data-parsley-required']) }}

          </div>
          <div class="form-group">
             {{ Form::label('permiso', 'Selecionar Permisos') }}
              {!! Form::select('permiso[]',$permisos, '', ['class'=>'form-control form-control-lg single select', 'data-parsley-required','multiple ', 'id'=>'permiso'
                                      ]) !!}
          </div>

           <button type="submit" id="buttonAdd1" class="btn btn-success mb-2">Agregar</button>
           <a href="{{ route('usuario.index') }}"  class="btn btn-warning mb-2">Regresar</a>
      	</form>
    <br><br>
   <table id="Mytable"  class="table table-bordered table-hover" style="width:100%">
      <thead>
          <tr>
	          <th>N°</th>
	          <th>Nombre</th>
            <th>Permiso</th>
	          <th>Creado</th>
	          <th>Acción</th>
          </tr>
      </thead>
      <tbody>
      </tbody>
      <tfoot>
          <tr>
	          <th>N°</th>
	          <th>Nombre</th>
            <th>Permiso</th>
	          <th>Creado</th>
	          <th>Acción</th>
          </tr>
      </tfoot>
  </table>


</div>
<!-- Token -->
<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">

<!-- Url-->
<input type="hidden" name="_path" id="_path" value="{{route('role.store')}}">


<!-- Url-->
<input type="hidden" name="_delete" id="_delete" value="{{route('role.destroy',':id')}}">

@endsection
@section('javascript')
	<script>

		var PlantillaRoles = {
              //Variables
                MesajeSaludo:'HelloWord',
                init : ()=> {

                    PlantillaRoles.General();
                    PlantillaRoles.datatable();
                    PlantillaRoles.btnAdd();
                    PlantillaRoles.btnDel();

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
                      btnAdd:()=>{


                      	 $(document).on("click", "#buttonAdd", event=> {
                          	 	let vurl=$("#_path").val();
                          	 	let role=$("#role").val();
                          	 	let token=$("#_token").val();
                              let permiso=$("#permiso").val();

                          	 	if(role!="" && permiso.length >0 ){

                          	 		data={'data':$("#role").val(),'permiso':permiso};

                                //console.log(data);
                          	 		PlantillaRoles.ajaxSave(data,vurl,token);

                          	 	}else{
    							             	PlantillaRoles.toast_notification("error",'No puede quedar vacio',2);
                          	 	}

                      	 	//PlantillaRoles.ajaxSearch();
                      	 });
                      },
                      btnDel:()=>{
                      	$(document).on("click", ".btnDel", function (event) {
          	         				event.preventDefault();
          	 						let token=$("#_token").val();
          	 						let dDrop=$("#_delete").val();

                            var result = confirm("¿Seguro de realizar esta acción?");
                            if (result) {
                              completrDrop=dDrop.replace(":id", $(this).attr('data-id'));

                              data={'data':$(this).attr('data-id')};

                              PlantillaRoles.ajaxDelete(data,completrDrop,token);

                            }


                 					});
                      },
                       datatable:()=>{

                       otable = $('#Mytable').DataTable({
	                                  responsive: true,
	                                  processing: true,
	                                  serverSide: true,
	                                  ajax:{
	                                        url: '{{route("admin.ajax.getRoleTable")}}',
	                                        type:'get',
	                                      } ,
	                                      language: {
	                                                url:  "{{asset('health/js/datatable_spanish.js')}}"
	                                               },
	                                      columns: [
	                                          {data: 'n', name:'n','orderable': false},
	                                          {data: 'nombre', name:'nombre'},
                                            {data: 'permiso', name:'permiso'},
	                                          {data: 'creado', name:'creado'},
	                                          {data: 'action', name:'action'},

	                                      ],
	                                       bAutoWidth: false,
	                                        order: [[0, "desc"]],
	                                        "aaSorting": [],

                                    });





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

                                if(data.data==1){
                                	PlantillaRoles.toast_notification("success",'Guardado Correctaente!!!',2);
                                   $("#role").val("");

                                    otable.ajax.reload();
                                     PlantillaRoles.clean_form_input("#permiso");
                                  $.each( data.permisos, ( index, value )=> {
                                       PlantillaRoles.form_option_append('#permiso',index,value)
                                   });


                            	}else{
                            		PlantillaRoles.toast_notification("error",'No fue posible guardar los datos',2);
                            	}

                             })
                             .fail(( data, textStatus, jqXHR)=> {
                               //console.log(data);
                             });
                      },
                      ajaxDelete:(data,vurl,token)=>{

                     // 	console.log(`${data}  ${vurl}  ${token}`);
                      		$.ajax({
                                  type: 'DELETE',
                                  url: vurl,
                                  data: data,
                                  dataType: 'JSON',
                                  async : true,
                                  headers:{'X-CSRF-TOKEN': token},
                             })
                             .done(( data, textStatus, jqXHR)=> {
                         //      console.log(data);

                                if(data.data==1){
                                	PlantillaRoles.toast_notification("success",'Eliminado Correctamente!!!',2);

                              	    otable.ajax.reload();

    							               	$("#role").val("");


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