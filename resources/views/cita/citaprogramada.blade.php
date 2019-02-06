@extends('layouts.principal')

@section('navT')
        @include('partials.nav')
@endsection
@section('seccion_c')


<div class="container">
    <br><br>
    <div class="row">
      <div class="col text-center mt-3">
        <div class="section_title"><h3>Citas Programadas</h3></div>
      </div>
    </div>
    <br><br>


    <div class="row">
      <div class="container">

        <table id="example" class="display nowrap" style="width:100%">
        <thead>
            <tr>
                <th></th>
                <th>First name</th>
                <th>Last name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
                <th>Extn.</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td>Tiger</td>
                <td>Nixon</td>
                <td>System Architect</td>
                <td>Edinburgh</td>
                <td>61</td>
                <td>2011/04/25</td>
                <td>$320,800</td>
                <td>5421</td>
            </tr>
            <tr>
                <td></td>
                <td>Garrett</td>
                <td>Winters</td>
                <td>Accountant</td>
                <td>Tokyo</td>
                <td>63</td>
                <td>2011/07/25</td>
                <td>$170,750</td>
                <td>8422</td>
            </tr>
            <tr>
                <td></td>
                <td>Ashton</td>
                <td>Cox</td>
                <td>Junior Technical Author</td>
                <td>San Francisco</td>
                <td>66</td>
                <td>2009/01/12</td>
                <td>$86,000</td>
                <td>1562</td>
            </tr>
             <tr>
                <td></td>
                <td>Donna</td>
                <td>Snider</td>
                <td>Customer Support</td>
                <td>New York</td>
                <td>27</td>
                <td>2011/01/25</td>
                <td>$112,000</td>
                <td>4226</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th>First name</th>
                <th>Last name</th>
                <th>Position</th>
                <th>Office</th>
                <th>Age</th>
                <th>Start date</th>
                <th>Salary</th>
                <th>Extn.</th>
            </tr>
        </tfoot>
    </table>




          <table id="Mytable"  class="" style="width:100%">
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


<br><br>

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


                      $(document).ready(function() {
                        $('#example').DataTable( {
                            responsive: {
                                details: {
                                    type: 'column'
                                }
                            },
                            columnDefs: [ {
                                className: 'control',
                                orderable: false,
                                targets:   0
                            } ],
                            order: [ 1, 'asc' ]
                        } );
                    } );



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
                                      responsive: {
                                          details: {
                                              type: 'column'
                                          }
                                      },
                                      columnDefs: [ {
                                          className: 'control',
                                          orderable: false,
                                          targets:   0
                                      } ],
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
