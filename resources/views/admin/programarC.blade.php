@extends('layouts.principal')

@section('navT')

        @include('partials.nav')
@endsection
@section('seccion_c')


<div class="container">

    <h3>Programar Cita</h3>


    <br>
     <div class="container-fluid" id="No">
            <table class="table table-bordered" id="Na">
               <thead>
                  <tr>
                     <th >Fecha</th>
                     <th>Horario</th>
                     <th>Horario</th>
                     <th>Habilitar</th>
                  </tr>



               </thead>
            </table>
        </div>

    <br>
    <div class="d-flex justify-content-center">
        <button id="bu" type="button" class="btn btn-success d-flex">Generar Cita</button>
    </div>

</div>
<br><br><br>

@endsection

@section('javascript')
<script>


    // ajax que retorne la fechas disponibles
   $(function() {
                        ba = null;



                var llenar_data = function(reser){

                                 url1 = 1;
                                url2 = reser;

                                vurl='{{ url('admin/statusEdit') }}';
                                vurl = `${vurl}/${url1}`;

                               //(Location).load(vurl, { id: url1 });
                               var parametros = {
                                       "id" : reser
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
                                       console.log(data);
                                           var result = [];
                                           for(var i in data){
                                               result[i] =[];

                                               result[i].push(data [i]['f_fecha']);
                                               result[i].push(data [i]['r_hora']);


                                               if(data [i]['status'] == 0){
                                                  result[i].push('Habilitado');
                                               }else{
                                                  result[i].push('Desabilitado');
                                               }
                                           }

                                          console.log(result);
                                       ba =   $('#Na').DataTable({
                                                  destroy:true,
                                                  columns: [
                                                      {
                                                          name: 'first',
                                                          title: 'Fecha',
                                                      },
                                                      {
                                                          name: 'second',
                                                          title: 'Horario',
                                                      },
                                                      {
                                                          name: 'seconud',
                                                          title: 'Estado',
                                                      },
                                                      {"render": function () {
                                                            return '<button type="button" id="ButtonEditar" class="editar edit-modal btn btn-warning botonEditar"><span class="fa fa-edit"></span><span class="hidden-xs"> Editar</span></button>';
                                                        }},
                                                  ],
                                                  data: result,
                                                  rowsGroup: [
                                                    'first:name',
                                                    'second:name'
                                                  ],
                                                  pageLength: '20',
                                                  });



                                       //location.reload(); */

                                     // document.getElementById("variable").value=data;
                                },
                                error: function (data) {
                                   console.log('Error:', data);
                                  },
                                  async: false
                                });

                }



                 var obtener_habilitar = function(tbody,table,bt){
                      $(tbody).on("click",bt,function(){
                        //var data = table.row($(this).parents("tr")).data();
                        console.log('hola');

                      })
                }

            alert({{ $id }});
            llenar_data({{ $id }});
            obtener_habilitar("#Na tbody",ba,"button.editar");

            $('#bu').click(function(){
                    llenar_data($('#reservation').val());
            obtener_habilitar("#Na tbody",ba,"button.editar");
            })



    //Date range picker
    $('#reservation').daterangepicker();

    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay'
      },
      eventClick: function(eventObj) {
         alert('hola');
      },
      defaultDate: '2018-12-15',
      events: [
        {
          title: 'simple event',
          start: '2018-12-02'
        },
        {
          title: 'event with URL',
          url: '#',
          start: '2018-12-03'
        }
      ]
    });

  });





</script>


@endsection
