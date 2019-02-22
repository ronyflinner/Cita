@extends('layouts.principal')

@section('navT')
       @include('partials.nav')
@endsection
@section('seccion_c')
        <div class="container">
          <br><br>
            <div class="row">
              <div class="text-center ">
                <div class="section_title"><h3>Solicitud de Cita</h3></div>
              </div>
            </div>


            <div class="row icon_boxes_row">
            <form class="form" id="form" method="POST" name="form" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/" accept-charset="UTF-8" >


              {!! Form::token() !!}
              <!-- Icon Box -->
                <div class="container">
                      <div class="row">
                             <div class="col-md-6">
                                <div class="form-group">
                                  <label for="sel1">Seleccionar Centro de Prevención:</label>
                                  {!! Form::select('lugar',$lugar, '', ['class'=>'form-control form-control-lg single select', 'required', 'id'=>'lugar'
                                  ]) !!}
                                </div>
                                 <div class="form-group">
                                  <label for="sel1">Seleccionar Servicio:</label>
                                  {!! Form::select('servicio',[''=>'Selecionar'], '', ['class'=>'form-control form-control-lg single selectServicio', 'required', 'id'=>'servicio'
                                  ]) !!}
                                </div>
                                <div class="form-group" id="display_cita" style="display: none;">
                                  <label for="sel1">Seleccionar Fecha de Cita:</label>
                                  {!! Form::text('date', Carbon\Carbon::now()->format('Y-m-d'), ['id'=>'datepicker','class'=>'form-control datepicker clicl', 'readonly', 'placeholder'=>'','required' ]) !!}
                                </div>
                                 <div class="form-group" id="display_horario" style="display: none;">
                                  <label for="sel1">Seleccionar Horario:</label>
                                  {!! Form::select('hora',[], '', ['class'=>'form-control form-control-lg single', 'id'=>'hora' ,'required']) !!}
                                </div>
                                 <div id="destiny" >
                              </div>

                            </div>
                            <div class="class-md-6">
                              <img src="{{ url('medico/img/infografia.jpg') }}" alt="instruitivo" height="300px" >;
                            </div>
                      </div>

               </div>
            </div>
            <br><br><br>

                <input name='merchantId' id="merchantId"   type='hidden'  value=''   >
                <input name='accountId'   id="accountId"  type='hidden'  value='' >
                <input name='description'  id="description" type='hidden'  value=''  >
                <input name='referenceCode'  id='referenceCode'  type='hidden' value='' >
                <input name='amount'       id='amount' type='hidden'  value=''   >
                <input name='tax'         id="tax"  type='hidden'  value='0'  >
                <input name='taxReturnBase' id="taxReturnBase" type='hidden'  value='0' >
                <input name='currency' id="currency"     type='hidden'  value='PEN' >
                <input name='signature'    id="signature" type='hidden'  value=''  >
                <input name='buyerEmail'    type='hidden'  value='{{ Auth::user()->email }}' >
                <input name='test'          type='hidden'  value='1' >
                <input name='responseUrl'    type='hidden'  value='{{ url('/admin/usuario/response') }}' >
                <input name='confirmationUrl' type='hidden' value='https://www.ligacancer.org.pe/confirmacionPayu.php'>

            <div class="row">
              <div class="col text-center">
                <button type="submit" disabled="" id="buttonCargar" class="btn btn-success"><span>Pagar Cita</span></button>
                 {!! Form::close() !!}



              </div>
            </div>
          </div>
        </div>
        <br>
        <br>
        <br>

<!-- Token -->
<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">

<!-- Customer -->
<input type="hidden" name="_ajaxCrearCita" id="_ajaxCrearCita" value="{{route('admin.ajax.crearCita')}}">

<!-- guardar-->
<input type="hidden" name="_ajaxGuardarCita" id="_ajaxGuardarCita" value="{{route('crearcita.store')}}">

<!-- Ruta Selecionar-->
<input type="hidden" name="_ajaxSelecionarBuscar" id="_ajaxSelecionarBuscar" value="{{route('admin.ajax.selecionarbuscar')}}">

<!--Fecha a hora-->
<input type="hidden" name="_ajaxBuscarCita" id="_ajaxBuscarCita" value="{{route('admin.ajax.buscarCita')}}">



<!-- Ruta Payu-->
<input type="hidden" name="_ajaxPagoPayuFormulario" id="_ajaxPayuFormulario" value="{{route('admin.ajax.ajaxPayuFormulario')}}">



@endsection

@section('javascript')
<script src="{{ asset('medico/js/scripts/crearCita.js') }}"></script>
@endsection