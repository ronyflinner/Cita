@extends('layouts.principal')
@section('navT')
        @include('partials.nav')
@endsection
@section('seccion_c')

<div class="container">


    <br><br>
    <div class="row">
      <div class="col text-center mt-3">
        <div class="section_title wow lightSpeedIn" data-wow-delay="0.1s"><h3>Lista de Usuarios</h3></div>
      </div>
    </div>
    <a href="{{ route('usuario.create') }}" class="btn btn-success  wow bounceIn" data-wow-delay="0.4s">Crear Usuario</a>
    <a href="{{ route('role.index') }}" class="btn btn-info  wow bounceIn" data-wow-delay="0.4s">Crear Role</a>
    <a href="{{ route('permiso.index') }}" class="btn btn-warning  wow bounceIn" data-wow-delay="0.4s">Crear Permisos</a>
    <br><br>
   <table id="Mytable"  class="table table-bordered table-hover" style="width:100%">
      <thead>
          <tr>
              <th>N°</th>
              <th>DNI</th>
              <th>Nombre y Apellido</th>
              <th>Correo</th>
              <th>Role</th>
              <th>Status</th>
              <th>Creado</th>
              <th>Acción</th>
          </tr>
      </thead>
      <tbody>
      </tbody>
      <tfoot>
          <tr>
              <th>N°</th>
              <th>DNI</th>

              <th>Nombre y Apellido</th>
                <th>Correo</th>
              <th>Role</th>
              <th>Status</th>
              <th>Creado</th>
              <th>Acción</th>
          </tr>
      </tfoot>
  </table>


</div>
<!-- Token -->
<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">

<!-- Path-->
<input type="hidden" name="_path" id="_path" value="{{route('admin.ajax.statusUsuario')}}">



@endsection
@section('javascript')
	<script>

		var PlantillaUsuarios = {
              //Variables
                MesajeSaludo:'HelloWord',
                init : ()=> {

                    PlantillaUsuarios.General();
                    PlantillaUsuarios.datatable();
                    PlantillaUsuarios.btnStatus();
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
                          if($('#form').parsley().isValid())
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

                      btnStatus:()=>{
                        $(document).on("click", ".btnStatus", function (event) {
                            let change_close_id =$(this).data('id');
                            let path_val=$("#_path").val();
                            let token=$("#_token").val();

                            var result = confirm("¿Seguro de realizar esta acción?");
                            if (result) {
                                 data={'data':change_close_id};
                                 PlantillaUsuarios.ajaxSave(data,path_val,token);
                            }


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
                                   //  console.log(data);
                                      if(data.data==1){
                                             PlantillaUsuarios.toast_notification("info",'Cambios Realizados Correctamente!!!',2);
                                            otable.ajax.reload();
                                      }else{
                                             PlantillaUsuarios.toast_notification("error",'No fue posible guardar los datos',2);
                                      }

                                 })
                                 .fail(( data, textStatus, jqXHR)=> {
                                   //console.log(data);
                                 });
                      },
                      datatable:()=>{

                      otable = $('#Mytable').DataTable({
                                      responsive: true,
                                      processing: true,
                                        serverSide: true,
                                        ajax:{
                                            url: '{{route("admin.ajax.getUsuarioTable")}}',
                                            type:'get',
                                          } ,
                                          language: {
                                                    url:  "{{asset('health/js/datatable_spanish.js')}}"
                                                   },
                                          columns: [
                                              {data: 'n', name:'n','orderable': false},
                                              {data: 'dni', name:'dni'},
                                              {data: 'nombre', name:'nombre'},
                                              {data: 'usuario', name:'usuario'},
                                              {data: 'role', name:'role'},
                                              {data: 'status', name:'status'},
                                              {data: 'creado', name:'creado'},
                                              {data: 'action', name:'action'},

                                          ],
                                           bAutoWidth: false,
                                            order: [[0, "desc"]],
                                            "aaSorting": [],
                                    });
                      },

              };


              $(function() {
                //arranque de funciones y procesos que estan en el init
                  PlantillaUsuarios.init();
              });








	</script>
@endsection