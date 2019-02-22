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
          <table id="Mytable" class="table table-striped table-bordered nowrap" style="width:100%">
              <thead>
                  <tr>
                      <th>N°</th>
                      <th>Fecha Cita</th>
                      <th>Hora Cita</th>
                      <th>Centro de Prevención</th>
                      <th>Atendido</th>
                      <th>Estado de Cita</th>
                      <th>Estado de Pago</th>
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
                      <th>Estado de Pago</th>
                      <th>Ticket de Atención</th>
                  </tr>
              </tfoot>
          </table>

      </div>
    </div>

    @include('frontend.layout.modal')

<br><br>
<!-- Token -->
<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
<!-- Url-->
<input type="hidden" name="_delete" id="_delete" value="{{route('citaprogramada.destroy',':id')}}">

<!--categorie Proyecto buscar-->
  <input type="hidden" name="_modal_PagoAjax" id="_modal_PagoAjax" value="{{route("admin.ajax.pagoCitaProgramada",':id')}}">

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
                    PlantillaGuardaCita.btnDel();
                    PlantillaGuardaCita.btnPay();
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

                       //    console.log(`Hola mundo, soy el numero ${change_close_id}`);
                         });
                      },
                      btnPdf:()=>{
                        $(document).on("click", ".btnPdf", function (event) {
                           let change_close_id =$(this).data('id');

                     //     console.log(`Hola mundo, soy el numero ${change_close_id}`);
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

                              PlantillaGuardaCita.ajaxDelete(data,completrDrop,token);

                            }


                          });
                      },
                       btnPay:()=>{
                         $(document).on("click", ".btnPay", function (event) {
                            event.preventDefault();

                            let pathBT=`${$("#_modal_PagoAjax").val()}`;


                            completo=pathBT.replace(":id", $(this).data('id'));
                            PlantillaGuardaCita.viewajax('#idcontainer',completo , `Pagar Cita N° ${$(this).data('code')}`,id=null,4);
                          });
                      },


                      /*AJAX*/
                       ajaxDelete:(data,vurl,token)=>{

                     //   console.log(`${data}  ${vurl}  ${token}`);
                          $.ajax({
                                  type: 'DELETE',
                                  url: vurl,
                                  data: data,
                                  dataType: 'JSON',
                                  async : true,
                                  headers:{'X-CSRF-TOKEN': token},
                             })
                             .done(( data, textStatus, jqXHR)=> {
                              // console.log(data);

                                if(data.data==1){
                                  PlantillaGuardaCita.toast_notification("success",'Eliminado Correctamente!!!',2);

                                    otable.ajax.reload();

                                  $("#role").val("");


                              }else if(data.data==2){
                                  PlantillaGuardaCita.toast_notification("info",'Ya tenemos registrado un pago para esta Cita!!!',2);

                                    otable.ajax.reload();


                              }else{
                                PlantillaGuardaCita.toast_notification("error",'No fue posible guardar los datos',2);
                              }

                             })
                             .fail(( data, textStatus, jqXHR)=> {
                               //console.log(data);
                             });
                      },

                      datatable:()=>{

                         otable=  $('#Mytable').DataTable({
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
                                                    url:  "{{asset('medico/js/datatable_spanish.js')}}"
                                                   },
                                          columns: [
                                              {data: 'n', name:'n','orderable': false},
                                              {data: 'fecha', name:'fecha'},
                                              {data: 'hora', name:'hora'},
                                              {data: 'lugar', name:'lugar'},
                                              {data: 'doctor', name:'doctor'},
                                              {data: 'status', name:'status'},
                                              {data: 'status_pago', name:'status_pago'},
                                              {data: 'action', name:'action'},

                                          ],
                                           bAutoWidth: false,
                                            order: [[0, "desc"]],
                                            "aaSorting": [],

                                    });

                      },
                      viewajax:(destiny, route, title='Sin definir',id=null,flag=null)=>{
                          PlantillaGuardaCita.clean_form_html('#myModalLabel1');
                          PlantillaGuardaCita.clean_form_html(destiny);

                            let modal = $("#default");
                            if(flag==1){
                                modal.find('.modal-dialog').addClass('modal-lg');
                            }else if(flag!=1){
                               modal.find('.modal-dialog').removeClass('modal-lg')
                            }

                          $('#myModalLabel1').html(title);

                            id || (id = ' 0');
                            $.get(route, { id: id }, function (htmlexterno) {
                                //console.log(htmlexterno);
                                $(destiny).html(htmlexterno);
                            });
                            return true;
                        },

              };




        $(function() {
          //arranque de funciones y procesos que estan en el init
            PlantillaGuardaCita.init();
        });



</script>


@endsection
