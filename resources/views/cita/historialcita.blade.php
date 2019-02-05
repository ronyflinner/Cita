@extends('layouts.principal')

@section('navT')

        @include('partials.nav')
@endsection
@section('seccion_c')
     <div class="container" id="No">
            <table class="table table-bordered" id="Na">
               <thead>
                  <tr>
                     <th>N°</th>
                     <th>Clínica</th>
                     <th>Fecha</th>
                     <th>Asistencia</th>
                     <th>Resultados</th>
                  </tr>
               </thead>
            </table>
        </div>


@endsection

@section('javascript')

<script type="text/javascript">
   itable = $('#Na').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax:{

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
                    });

</script>

@endsection