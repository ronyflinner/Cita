<link rel="stylesheet" type="text/css" href="{{url('health/styles/bootstrap4/bootstrap.min.css')}}">


<div class="container">
  <img src="{{ url('health/images/lcc.png') }}" alt="" width="140px" height="60px">
  <h2>Historial de cita</h2>

  @php
    $lu = ' ';
    if($lugar == 3){
      $lu = 'Surquillo';
    }
    else if($lugar == 2){
      $lu = 'Centro de Lima';
    }else if($lugar == 1){
      $lu = 'Pueblo Libre';
    }
  @endphp

    <h4>{{ $lu }}</h4>
    <h4>{{ $fecha }}</h4>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>N°</th>
        <th>Hora</th>
        <th>Nombre</th>
        <th>Asistencia</th>
      </tr>
    </thead>
    <tbody>
       @php
         $cont =0;
       @endphp
       @foreach($enviar as $value)
          @php
         $cont ++;
         $asistio ='Asistio';
          if($value->status_asistio == 0){
               $asistio = 'No asistio';
          }else if($value->status_asistio == 1){
               $asistio = 'En proceso';
          }else if($value->status_asistio == 2){
               $asistio = 'Asistio';
          }else if($value->status_asistio == 3){
               $asistio = 'Reprogramado';
          }
       @endphp
          <tr>
            <td>{{ $cont }}</td>
            <td>{{ $value->r_hora }}</td>
            <td>{{ $value->name }}</td>

            <td>{{ $asistio }}</td>
          </tr>
       @endforeach

    </tbody>
  </table>
</div>
