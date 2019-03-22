<link rel="stylesheet" type="text/css" href="{{url('medico/css/bootstrap.min.css')}}">

<div class="container">
    <div class="row">
        <div class=" col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-1">
            <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">

                  <img src="{{ url('medico/img/lcc.png') }}" alt="Logo" width="170px" height="75px">



                </div>
                <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                    <p>
                        <em>Date: 1st November, 2013</em>
                    </p>
                    <p>
                        <em>Recibo #: </em>
                    </p>
                </div>
            </div>
            <br><br>
            <div class="row">
                <div class="text-center">
                    <h1>Recibo N° {{ $cita[0]->referenceCode }}</h1>
                </div>
                <br><br><br>
                </span>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Donación</th>
                            <th class="text-center"></th>
                            <th class="text-center">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-1" style="text-align: center"> 1 </td>
                            <td class="col-md-9"><em>{{$cita[0]->disponibilidad_link->doctor_servicio_link->servicio_link->nombre }}</em></h4></td>
                            <td class="col-md-1 text-center"></td>
                            <td class="col-md-1 text-center">S/. {{$cita[0]->disponibilidad_link->doctor_servicio_link->servicio_link->costo }}</td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right">
                            <p>
                                <strong>Subtotal: </strong>
                            </p>
                            <p>
                                <strong>IGV: </strong>
                            </p></td>
                            <td class="text-center">
                            <p>
                                <strong>S/. {{$cita[0]->disponibilidad_link->doctor_servicio_link->servicio_link->costo }}</strong>
                            </p>
                            <p>
                                <strong>0</strong>
                            </p></td>
                        </tr>
                        <tr>
                            <td>   </td>
                            <td>   </td>
                            <td class="text-right"><h4><strong>Total: </strong></h4></td>
                            <td class="text-center text-danger"><h4><strong>S/. {{$cita[0]->disponibilidad_link->doctor_servicio_link->servicio_link->costo }}</strong></h4></td>
                        </tr>


                    </tbody>
                </table>
                <br>
                <h4 class="text-center"><b>Información de Cita</b></h4>
                <br>
                <div class="text-center">
                  <h4>Paciente: {{ ucfirst($cita[0]->paciente_link->name) . ' '. ucfirst($cita[0]->paciente_link->apellidoP) }}  |   Hora de Cita: {{ exploid_blade($cita[0]->disponibilidad_link->hora_link->r_hora) }}</h4>
                    <p><b>{{ $nombreDocumento }}:</b> {{ $numeroDocumento }}</p>
                    <p><b>Celular:</b> {{ $cita[0]->paciente_link->numero }}</p>
                    <p><b>Email:</b> {{ $cita[0]->paciente_link->email }}</p>
                    <p><b>Centro de Prevención:</b> {{ $cita[0]->disponibilidad_link->lugar_link->nombre .", ". $cita[0]->disponibilidad_link->lugar_link->direccion }}</p>
                    <p><b>Presentar este comprobante en el área de admisión</b></p>

                </div>

                </td>
            </div>
        </div>
    </div>