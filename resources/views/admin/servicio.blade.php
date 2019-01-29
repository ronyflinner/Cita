@extends('layouts.principal')

@section('navT')

        @include('partials.navAdmin')
@endsection

@section('seccion_c')

<div class="container">

    <h3>Seleccionar Servicio a Doctor</h3>

   <div class="form-group" id="lu">
      <label for="sel1">Seleccionar Doctor:</label>


    </div>


 <!--  { !! Form::select('usuario',$servicio, '', ['class'=>'js-example-basic-multiple', 'name'=>'states[]' , 'multiple'=>"multiple" ,'id'=>'servicio']) !!} -->
    <label for="sel1">Servicio:</label>
    <div id="ser3">
    <div class='form-group' id='ser'>

     </div>
    </div>


    <div class="d-flex justify-content-center">
        <button id="bu" type="button" class="btn btn-success d-flex">Crear Servicio</button>
    </div>

</div>
<br><br><br>




@endsection

@section('javascript')
<script>


    // ajax que retorne la fechas disponibles
  $(document).ready(function() {


</script>


@endsection
