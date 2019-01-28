@extends('layouts.principal')

@section('navT')

        @include('partials.navAdmin')
@endsection
@section('seccion_c')


<div class="container">

    <h3>Programar Cita</h3>

   <div class="form-group" id="lu">
      <label for="sel1">Seleccionar Lugar:</label>
      {!! Form::select('lugar',$usuario, '', ['class'=>'form-control form-control-lg single', 'id'=>'lugar']) !!}
    </div>    <br>
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


  });





</script>


@endsection
