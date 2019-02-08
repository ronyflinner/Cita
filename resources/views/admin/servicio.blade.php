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
            <table class="table table-striped table-bordered nowrap" style="width:100%" id='Na'>
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
                                   location.reload();

                                },
                                error: function (data2) {
                                   console.log('Error:', data2);
                                  },
                                  async: false
                                });
                     })
                     var vurl='{{ url('admin/mostrarServicio') }}';
                                //vurl = `${vurl}/${url1}`;

                               //(Location).load(vurl, { id: url1 });
                               var parametros = {
                                       "lugar" : 0
                                    };

                              console.log();
                                //$(location).attr('href',vurl);
                              itable = $('#Na').DataTable({
                                        responsive: {
                                            details: {
                                                display: $.fn.dataTable.Responsive.display.modal( {
                                                    header: function ( row ) {
                                                        var data = row.data();
                                                        return 'Servicio';
                                                    }
                                                } ),
                                                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                                                    tableClass: 'table'
                                                } )
                                            }
                                        },
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
                                        } ,
                                         language: {
                                            url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json'
                                         },
                                        columns: [
                                            {data: 'id', name:'id','orderable': false},
                                            {data: 'nombre', name:'nombre'},
                                             {data: 'costo', name:'costo'},

                                        ],


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
                      }

              };




        $(function() {
          //arranque de funciones y procesos que estan en el init
            PlantillaGuardaCita.init();
        });




</script>


@endsection
