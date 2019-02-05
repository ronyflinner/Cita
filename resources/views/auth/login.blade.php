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
                      <h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Ingreso al Sistema de Citas</h3>
                    </div>
                    <div class="panel-body">
                      <div id="sendmessage">Your message has been sent. Thank you!</div>
                      <div id="errormessage"></div>

                      <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                         <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo Electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}"  autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" >

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
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
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Ingresar
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Olvidaste tu contraseña
                                </a>
                                        </div>
                                    </div>



                      </form>
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
<section id="intro" class="intro">


</section>

@endsection
