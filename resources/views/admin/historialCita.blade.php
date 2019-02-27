@extends('layouts.principal')

@section('navT')
        @include('partials.nav')
@endsection
@section('seccion_c')

      <div class="container">
          <div class="row">
            <form action="{{ route('descargarPDF.index') }}" method="get" id="form1">
           <div class="col-md-4">
               <div class="form-group">
                  <label for="sel1">Seleccionar Lugar:</label>
                     {!! Form::select('lugar',$lugar, '', ['class'=>'form-control form-control-lg single', 'id'=>'lugar']) !!}
                </div>
           </div>

           <div class="col-md-4">
              <div class="form-group">
                <label>Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name ='fecha' class="form-control pull-right" id="datepicker">
                </div>
                <!-- /.input group -->
              </div>
           </div>

           <div class="col-md-2">
               <div class="form-group">
                <label></label>

                <div class="input-group">
                  <button type="button"  id='bun' class="btn btn-primary">Buscar</button>

                </div>
                <!-- /.input group -->
              </div>
           </div>

           <div class="col-md-2" id="pdf" style="display: none;">
               <div class="form-group">
                <label></label>

                <div class="input-group">
                  <button type="submit" form="form1" value="Submit" id='bpdf' class="btn btn-primary">Descargar PDF</button>

                </div>
                <!-- /.input group -->
              </div>
           </div>

        </form>
       </div>


      </div>


     <div class="container" id="No">
            <table class="table table-striped table-bordered nowrap" style="width:100%" id='Na'>
               <thead>
                  <tr>
                     <th>N°</th>
                     <th>Id Cita</th>
                     <th>Servicio</th>
                     <th>Id Paciente</th>
                     <th>Hora</th>
                     <th>Nombre de Paciente</th>
                     <th>Asistencia</th>
                     <th>Reprogramación</th>
                  </tr>
               </thead>
            </table>
        </div>


@endsection

@section('javascript')

<script type="text/javascript">
    var PlantillaContacto = {
              //Variables
                MesajeSaludo:'HelloWord',
                init : ()=> {

                    PlantillaContacto.General();

                },
                // Metodos
                sayMessage: mensaje=> {
                  alert("Hola como estas!!!");
                },
                General:()=>{
                   $(function() {


    //Date picker
    $('#datepicker').datepicker({
      autoclose: true   });




     function promesa3(){
                return  new Promise(function() {
                                console.log('entre');
                                url1 = $('#fec1').val();
                                url2 = $('#fec1').val();

                                vurl='{{ url('admin/buscarCita') }}';
                                //vurl = `${vurl}/${url1}`;

                               //(Location).load(vurl, { id: url1 });
                               var parametros = {
                                       "lugar" : $('#lugar').val(),
                                       "fecha" : $('#datepicker').val()

                                    };


                          itable = $('#Na').DataTable({

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
                                             {data: 'servicio', name:'servicio'},
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

                                    });

                      });

               }



        function promesaS(){
                return  new Promise(function() {


                      });

               }


        var obtener_habilitar = function(tbody,table,bt){
              $(tbody).on("click",bt,function(){
                alert('hola');
                var data = table.row($(this).parents("tr")).data();
                console.log(data.asistencia);
                console.log($('#datepicker').val());
                console.log($('#lugar').val());

                      vurl='{{ url('admin/reprogramar')}}';
                      //vurl = `${vurl}/${url1}`;

                     //(Location).load(vurl, { id: url1 });
                     var parametros = {
                             "fecha" : $('#datepicker').val(),
                             "lugar" : $('#lugar').val(),
                             "id" : data.idU,
                             "asistencia" :data.asistencia,
                             "cita" :data.idcita,
                             "servicio" : data.servicio
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
                      success:  function (data) {
                             console.log('jlkj');
                             console.log(data);

                             if(data == 1){
                               PlantillaContacto.toast_notification("success",'Reprogramado correctamente',2);
                               setTimeout(
                                  function()
                                  {
                                    location.reload();
                                  }, 5000);


                             }else{
                              PlantillaContacto.toast_notification("warning",'Debe habilitar doctores . no hay disponibles para reprogramar',2);
                             }
                             //location.reload();

                      },
                      error: function (data) {
                         console.log('Error:', data);
                        },
                        async: false
                      });


              })
            }

    $('#bun').on('click',function(){
              $('#Na_wrapper').remove();
              $('#Na').remove();
              $('#No').append("<table class='table table-bordered' class='table table-striped table-bordered nowrap' style='width:100%' id='Na'><thead><tr><th>N°</th><th>Id Cita</th><th>Servicio</th><th>Id Paciente</th><th>Hora</th><th>Nombre de Paciente</th><th>Asistencia</th><th>Reprogramación</th></tr></thead></table>");
              var promise = promesa3();
              obtener_habilitar("#Na tbody",itable,"button.editar");
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



              };


              $(function() {
                //arranque de funciones y procesos que estan en el init
                  PlantillaContacto.init();
              });





</script>

@endsection