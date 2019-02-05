@extends('layouts.principal')

@section('navT')

       @include('partials.nav')
@endsection
@section('seccion_c')


<div class="container">

    <h3>Programar Cita</h3>



    <div class="form-group" id="lu">
      <label for="sel1">Seleccionar Lugar:</label>
      {!! Form::select('lugar',$lugar, '', ['class'=>'form-control form-control-lg single ', 'id'=>'lugar']) !!}
    </div>
    <div class="form-group" style="display: none;" >
      <label for="sel1">Seleccionar Lugar:</label>
      {!! Form::select('fecha',$fecha, '', ['class'=>'form-control form-control-lg single ', 'fe'=>'fecha']) !!}
    </div>

    <!-- Date range -->
              <div class="form-group" id="ra">
                <label>Seleccione rango de fecha:</label>

                <div class="input-group">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="reservation" data-date-days-of-week-disabled="0,1">
                </div>
                <!-- /.input group -->
              </div>
    <br>
     <div class="container-fluid" id="No" >

      </div>

    <br>
    <div class="d-flex justify-content-center" id="de">
        <button id="bu" type="button" class="btn btn-success d-flex">Generar Cita</button>
    </div>

</div>
<br><br><br>

@endsection

@section('javascript')
<script>


    // ajax que retorne la fechas disponibles
   $(function() {


               // alert($('#lugar').val());
                 ba = null;
              // $('#No').hide();


               function promesaS(){
                return  new Promise(function() {

                                url1 = $('#reservation').val();
                                url2 = $('#reservation').val();

                                vurl='{{ url('admin/statusEdit') }}';
                                //vurl = `${vurl}/${url1}`;

                               //(Location).load(vurl, { id: url1 });
                               var parametros = {
                                       "id" : $('#reservation').val()
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
                                        /* var result = [];
                                           for(var i in data){
                                               result[i] =[];

                                               result[i].push(data [i]['f_fecha']);
                                               result[i].push(data [i]['r_hora']);


                                               if(data [i]['status'] == 0){
                                                  result[i].push('Habilitado');
                                               }else{
                                                  result[i].push('Desabilitado');
                                               }
                                           } */

                                         // console.log(result);

                                       var result = [];

                                       fecha = data['fecha'];
                                       hora = data['hora'];
                                    for(var i in fecha){
                                         result[i] = [];
                                        for(var j in hora){
                                           result[i].push(fecha[i]);
                                           result[i].push(hora[j]);
                                        }
                                    }

                                    console.log(result);
                                    console.log(data['fecha']);
                                    console.log(data['hora']);
                                /*
                               ba =     $('#Na').DataTable({
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
                      });

               }



         // var promise = promesaS();

               // llenar_data($('#reservation').val());



           var obtener_habilitar = function(tbody,table,bt){
                      $(tbody).on("click",bt,function(){
                      var data = table.row($(this).parents("tr")).data();
                      console.log(data[0]);

                      })
                }

                $('#bu').click(function(){
                    // $('#No').show();

                  $('#lu').fadeOut(800);
                  $('#ra').fadeOut(800);
                  $('#bu').remove();
                  $('#de').after(' <button id="bu" type="button" class="btn btn-success d-flex">Aceptar</button>');

                   $('#No').after('<table class=\'table table-bordered\' id=\'Na\'><thead><tr><th>Fecha</th><th>Horario</th><th>Horario</th><th>Habilitar</th></tr></thead></table>')
                   var promise = promesaS();
                   console.log(ba);
                  obtener_habilitar("#Na tbody",ba,"button.editar");


                })



   //console.log(ba);

  //  obtener_habilitar("#Na tbody",ba,"button.editar");
    //Date range picker
    $('#reservation').daterangepicker({


       });


})


</script>


@endsection
