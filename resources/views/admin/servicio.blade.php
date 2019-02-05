@extends('layouts.principal')

@section('navT')

        @include('partials.nav')
@endsection

@section('seccion_c')

<div class="container">

   <div >
      <h3>Crear Servicio</h3>
     <div class="row">
       <div class="col-md-4">
         <div class="form-group">
            <label for="usr">Nombre del Servicio:</label>
            <input type="text" class="form-control" id="servicio">
        </div>
       </div>
       <div class="col-md-4">
         <div class="form-group">
            <label for="usr">Costo:</label>
            <input type="text" class="form-control" id="costo">
        </div>
       </div>
       <div class="col-md-4">
         <div class="form-group">
            <br>
            <button type="button" class="btn btn-primary" id='bu'>Aceptar</button>
         </div>
       </div>
     </div>
   </div>

   <div class="container" id="No">
            <table class='table table-bordered' id='Na'>
               <thead>
                  <tr>
                     <th>N°</th>
                     <th>Nombre</th>
                     <th>Costo</th>
                  </tr>
               </thead>
            </table>
        </div>



</div>
<br><br><br>




@endsection

@section('javascript')
<script>

            var PlantillaGuardaCita = {
              //Variables
                MesajeSaludo:'HelloWord',
                init : ()=> {

                    PlantillaGuardaCita.General();
                },
                // Metodos
                sayMessage: mensaje=> {
                  alert("Hola como estas!!!");
                },
                General:()=>{
                   $(function() {
                      /*Funcionnes Genericas*/
                     $('#bu').click(function(){
                         vurl='{{ url('admin/editarServicio') }}';
                                //vurl = `${vurl}/${url1}`;

                               //(Location).load(vurl, { id: url1 });
                               var parametros = {
                                       "nombre" : $('#servicio').val(),
                                       "costo"  : $("#costo").val()
                                    };

                                console.log(vurl);
                                //$(location).attr('href',vurl);

                               // var doc = 'statusEdit';
                                $.ajax({
                                url:   vurl,
                                data: parametros,
                                type:  'GET', //método de envio
                                dataType : 'json',
                                headers: {
                                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                          } ,
                                success:  function (data3) {
                                   console.log('data 6');
                                   console.log(data3);
                                   actualizar = data3;

                                },
                                error: function (data2) {
                                   console.log('Error:', data2);
                                  },
                                  async: false
                                });
                     })


                  vurl='{{ url('admin/mostrarServicio') }}';
                  //vurl = `${vurl}/${url1}`;
                  //(Location).load(vurl, { id: url1 });
                               var parametros = {
                                       "nombre" : $('#servicio').val(),
                                       "costo"  : $("#costo").val()
                                    };

                                console.log(vurl);
                                //$(location).attr('href',vurl);

                               // var doc = 'statusEdit';
                                $.ajax({
                                url:   vurl,
                                data: parametros,
                                type:  'GET', //método de envio
                                dataType : 'json',
                                headers: {
                                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                          } ,
                                success:  function (data3) {
                                   console.log('data 09999');
                                   console.log(data3);
                                   actualizar = data3;

                                },
                                error: function (data2) {
                                   console.log('Error:', data2);
                                  },
                                  async: false
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
                      btnView:()=>{
                         $(document).on("click", ".btnView", function (event) {
                           let change_close_id =$(this).data('id');

                           console.log(`Hola mundo, soy el numero ${change_close_id}`);
                         });
                      },
                      btnPdf:()=>{
                        $(document).on("click", ".btnPdf", function (event) {
                           let change_close_id =$(this).data('id');

                          console.log(`Hola mundo, soy el numero ${change_close_id}`);
                         });
                      },
                      datatable:()=>{

                         $('#Mytable').DataTable({
                                      responsive: true,
                                      processing: true,
                                      serverSide: true,
                                        ajax:{
                                            url: '{{route("admin.ajax.CitaProgramdas")}}',
                                            type:'get',
                                          } ,
                                          language: {
                                                    url:  "{{asset('health/js/datatable_spanish.js')}}"
                                                   },
                                          columns: [
                                              {data: 'n', name:'n','orderable': false},
                                              {data: 'fecha', name:'fecha'},
                                              {data: 'hora', name:'hora'},
                                              {data: 'lugar', name:'lugar'},
                                              {data: 'status', name:'status'},
                                              {data: 'action', name:'action'},

                                          ],
                                           bAutoWidth: false,
                                            order: [[0, "desc"]],
                                            "aaSorting": [],

                                    });

                      }

              };




        $(function() {
          //arranque de funciones y procesos que estan en el init
            PlantillaGuardaCita.init();
        });


    // ajax que retorne la fechas disponibles
  /*itable = $('#Na').DataTable({
              processing: true,
              serverSide: true,
              ajax:{
                  url:   vurl,
                  data: parametros,
                  type:  'GET', //método de envio
                  dataType : 'json',
                  headers: {
                             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            } ,
                 dataSrc: function(json){

                           if(Object.keys(json.data).length != 0){
                                   $('#pdf').css('display', 'block');


                           }else{
                                   $('#pdf').css('display', 'none');
                           }
                           return json.data;
                 }
              } ,
               language: {
                  url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json'
               },
              columns: [
                  {data: 'id', name:'id','orderable': false},
                  {data: 'idcita', name:'idcita'},
                  {data: 'idU', name:'idU'},
                  {data: 'hora', name:'hora'},
                  {data: 'nombre', name:'nombre'},
                  {data: 'asistencia', name:'asistencia'},
                  {data: 'reprogramar' , name:'reprogramar'},

              ],
              bAutoWidth: false,
              order: [[0, 'asc']],
              'aaSorting': [],
              paging: true,
              searching: false,
              columnDefs: [
                    { width: 20, height: 100,  targets: 0 }
                ],
               fixedColumns: true,
    }); */


</script>


@endsection
