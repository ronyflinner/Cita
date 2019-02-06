@extends('layouts.principal')
@section('navT')
        @include('partials.nav1')



 <section id="intro" class="intro">
      <div class="intro-content">
        <div class="container">
             <div class="info">
        <div class="container">
    <div class="form-wrapper">
                <div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">

                  <div class="panel panel-skin">
                    <div class="panel-heading">
                      <h3 class="panel-title"><span class="fa fa-pencil-square-o"></span><h3> Registro al Sistema de Citas</h3>
                    </div>
                    <div class="panel-body">
                      <div id="sendmessage">Your message has been sent. Thank you!</div>
                      <div id="errormessage"></div>

        <div class="home_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_content">
   <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2 ">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                         <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                             {{ Form::label('tipoDocumento', 'Tipo de Documento',['class'=>'col-md-4 control-label']) }}

                            <div class="col-md-6">
                                {!! Form::select('tipo',$tipoDocumento, '', ['class'=>'form-control form-control', 'required', 'id'=>'tipo'
                                  ]) !!}
                                @if ($errors->has('tipo'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tipo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('numero') ? ' has-error' : '' }}">

                             {{ Form::label('numero_documento', 'Número de Documento',['class'=>'col-md-4 control-label']) }}

                            <div class="col-md-6">
                                {{ Form::text('numero', null,['class'=>'form-control dni','required  ','id'=>'dni']) }}

                                @if ($errors->has('numero'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('numero') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo Electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('apellido_paterno') ? ' has-error' : '' }}">
                            <label for="apellido_paterno" class="col-md-4 control-label">Apellido Paterno</label>

                            <div class="col-md-6">
                                <input id="apellido_paterno" type="text" class="form-control" name="apellido_paterno" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('apellido_paterno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('apellido_paterno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('apellido_materno') ? ' has-error' : '' }}">
                            <label for="apellido_materno" class="col-md-4 control-label">Apellido Materno</label>

                            <div class="col-md-6">
                                <input id="apellido_materno" type="text" class="form-control" name="apellido_materno" value="{{ old('apellido_materno') }}" required autofocus>

                                @if ($errors->has('apellido_materno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('apellido_materno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                            <label for="telefono" class="col-md-4 control-label">Telefóno</label>

                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control" name="telefono" value="{{ old('telefono') }}" required autofocus>

                                @if ($errors->has('telefono'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                            <div class="form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">
                            <label for="captcha" class="col-md-4 control-label">Captcha</label>

                            <div class="col-md-6">
                                @captcha
                                <input type="text" id="captcha" name="captcha">

                                @if ($errors->has('captcha'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('captcha') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div><br>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Registrar
                                </button>
                            </div>
                        </div>
                    </form>


        </div>
    </div>
</div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

                    </div>
                  </div>

                </div>
              </div>
</div>
    </div>
            <div class="col-lg-6">

          </div>
        </div>
      </div>
    </section>


@endsection
@section('javascript')
<script>
       $(function() {
                //arranque de funciones y procesos que estan en el init
              $('.dni').mask('000000000');
              $('#telefono').mask('(51)000000000');
        });
</script>
@endsection
















