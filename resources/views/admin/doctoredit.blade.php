@extends('layouts.principal')

@section('navT')

        @include('partials.navAdmin')
@endsection
@section('seccion_c')


<div class="container">

    <h3>Programar Cita</h3>

   <div class="form-group" id="lu">
      <label for="sel1">Seleccionar Doctor:</label>

      {!! Form::select('usuario',$usuario, '', ['class'=>'form-control form-control-lg single', 'id'=>'lugar']) !!}
    </div>

    <div class="form-group" id="lu">
      <label for="sel1">Seleccionar Servicio:</label>
      {!! Form::select('usuario',$servicio, '', ['class'=>'form-control form-control-lg single', 'id'=>'servicio']) !!}
    </div>




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
