@extends('layouts.principal')

@section('navT')
        @include('partials.nav2')
@endsection
@section('seccion_c')


<div class="container">
    <br><br>
    <div class="row">
      <div class="col text-center mt-3">
        <div class="section_title">Citas Programadas</div>
      </div>
    </div>
    <br><br>
    {{ route('roteo') }}

    <div class="row">
      <div class="container">
          <table id="Mytable"  class="table table-bordered table-hover " style="width:100%">
              <thead>
                  <tr>
                      <th>N°</th>
                      <th>Fecha Cita</th>
                      <th>Hora Cita</th>
                      <th>Centro de Prevención</th>
                      <th>Atendido</th>
                      <th>Estado de Cita</th>
                      <th>Ticket de Atención</th>
                  </tr>
              </thead>
              <tbody>

              </tbody>
              <tfoot>
                   <tr>
                      <th>N°</th>
                      <th>Fecha Cita</th>
                      <th>Hora Cita</th>
                      <th>Centro de Prevención</th>
                      <th>Atendido</th>
                      <th>Estado de Cita</th>
                      <th>Ticket de Atención</th>
                  </tr>
              </tfoot>
          </table>

      </div>
    </div>




</div>

@include('partials.modal')
@endsection

@section('javascript')
<script>

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
                      /*Funcionnes Genericas*/
                      $('.single').select2();

                      $('div.alert').not('.alert-important').delay(3000).fadeOut(350);

                      var now = moment();

                      //$('#Mytable').DataTable();

                      PlantillaGuardaCita.datatable();

                      var cielo=1;

                      if(cielo==2){
                        $('#exampleModal').modal('show');
                      }



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
