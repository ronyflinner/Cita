@extends('layouts.principal')

@section('navT')

        @include('partials.navAdmin')
@endsection
@section('seccion_c')

      <div class="container">
          <div class="row">
           <div class="col-md-4">
               <div class="form-group">
                  <label for="sel1">Seleccionar Lugar:</label>

                     {!! Form::select('lugar',$lugar, '', ['class'=>'form-control form-control-lg single', 'id'=>'lugar']) !!}

                </div>
           </div>

           <div class="col-md-6">
              <div class="form-group">
                <label>Date:</label>

                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker">
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


       </div>


      </div>


     <div class="container" id="No">
            <table class='table table-bordered' id='Na'>
               <thead>
                  <tr>
                     <th>id</th>
                     <th>Hora</th>
                     <th>Nombre de Paciente</th>
                     <th>Asitencia</th>
                     <th>Reprogramar</th>
                  </tr>
               </thead>
            </table>
        </div>


@endsection

@section('javascript')

<script type="text/javascript">



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

                                console.log();
                                //$(location).attr('href',vurl);

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
                                        } ,
                                         language: {
                                            url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json'
                                         },
                                        columns: [
                                            {data: 'id', name:'id','orderable': false},
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

                               /*
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




                                },
                                error: function (data2) {
                                   console.log('Error:', data2);
                                  },
                                  async: false
                                });*/
                      });

               }



        function promesaS(){
                return  new Promise(function() {


                      });

               }


        var obtener_habilitar = function(tbody,table,bt){
              $(tbody).on("click",bt,function(){
                var data = table.row($(this).parents("tr")).data();
                console.log(data.nombre);
                console.log($('#datepicker').val());
                console.log($('#lugar').val());



                                vurl='{{ url('admin/reprogramar')}}';
                                //vurl = `${vurl}/${url1}`;

                               //(Location).load(vurl, { id: url1 });
                               var parametros = {
                                       "fecha" : $('#datepicker').val(),
                                       "lugar" : $('#lugar').val()
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
                                  console.log('dataaaa hola');
                                       console.log(data);
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
              $('#No').append("<table class='table table-bordered' id='Na'><thead><tr><th>id</th><th>Hora</th><th>Nombre de Paciente</th><th>Asitencia</th><th>Reprogramar</th></tr></thead></table>");
              var promise = promesa3();
              obtener_habilitar("#Na tbody",itable,"button.editar");
    });






   /* itable = $('#Na').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax:{
                            url:'{ { route('') }}' ,
                            type:'get',
                        } ,
                         language: {
                            url: '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json'
                         },
                        columns: [
                            {data: 'id', name:'id','orderable': false},
                            {data: 'title', name:'title'},
                            {data: 'publish', name:'publish'},
                            {data: 'estado', name:'estado'},
                            {'defaultContent':"<button type='button' class='editar2 btn btn-danger'><i class='glyphicon glyphicon-off'></i></button> "},
                            {'defaultContent':"<button type='button' class='editar btn btn-primary'><i class='fa fa-pencil-square-o'></i></button> "},
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






  });


</script>

@endsection