@extends('layouts.principal')

@section('navT')
        @include('partials.nav')
@endsection
@section('seccion_c')

     <div class="container" id="No">
            <h2>Buzón de mensajes</h2>
            <table class='table table-bordered' id='Na'>
               <thead>
                  <tr>
                     <th>N°</th>
                     <th>Paciente</th>
                     <th>Mensaje</th>
                     <th>Responder</th>
                  </tr>
               </thead>
            </table>
        </div>
    <a href="mailto:name@email.com">Link text</a>

@endsection

@section('javascript')

<script type="text/javascript">

         var PlantillaGuardaCita = {
              //Variables
                MesajeSaludo:'HelloWord',
                init : ()=> {

                    PlantillaGuardaCita.General();
                    PlantillaGuardaCita.btnPdf();
                    PlantillaGuardaCita.btnView();
                },
                // Metodos
                sayMessage: mensaje=> {
                  alert("Hola como estas!!!");
                },
                General:()=>{
                   $(function() {
                     vurl='{{ url('admin/usuario/list_mensaje') }}';
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
                                                      }
                                        } ,
                                         language: {
                                            url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json'
                                         },
                                        columns: [
                                            {data: 'id', name:'id','orderable': false},
                                            {data: 'paciente', name:'paciente'},
                                             {data: 'mensaje', name:'mensaje'},
                                            {data: 'responder', name:'responder'},
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
                                              {data: 'doctor', name:'doctor'},
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






</script>

@endsection