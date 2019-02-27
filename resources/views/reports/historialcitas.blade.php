<link rel="stylesheet" type="text/css" href="{{url('medico/css/bootstrap.min.css')}}">

<div class="container">
  <img src="{{ url('medico/img/lcc.png') }}" alt="Logo" width="170px" height="75px">
  <h2 align="center">Historial de cita</h2>

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

    <h4 align="center">Lugar : {{ $lu }}</h4>
    <h4 align="center">Fecha : {{ $fecha }}</h4>

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
               $asistio = 'Programada';
          }else if($value->status_asistio == 2){
               $asistio = 'Asistio';
          }else if($value->status_asistio == 3){
               $asistio = 'Reprogramada';
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
