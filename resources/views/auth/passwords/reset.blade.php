@extends('layouts.principal')
@section('navT')
      @include('partials.nav1')
@endsection
@section('seccion_c')
<br><br><br><br><br><br><br><br><br>
@if(count($errors) > 0)
    <div class="errors">
            <div class="alert alert-danger">
                 <h4 class="alert-heading">Uy!!! Debemos revisar lo siguientes items:</h4>
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
                <ul>
                @foreach($errors->all() as $error)

                        <li><i class="ace-icon fa fa-times"></i>  {{ $error }}</li>

                @endforeach
                </ul>
        </div>
    </div>
@endif
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">

                     <h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Cambio de Contraseña</h3>
               </div>

                <div class="panel-body">
                    <form class="form-horizontal" id="registerForm" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}
                           <input type="hidden" name="token" value="{{ $token }}">



                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo Electrónico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

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
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                          <div class="form-group{{ $errors->has('g-recaptcha') ? ' has-error' : '' }}">
                                <label for="captcha" class="col-md-4 control-label">Captcha</label>

                                <div class="col-md-6">



                               <div class="g-recaptcha" data-sitekey="6LcAbZkUAAAAAIQsk0F1deTS1mJNd1Ui1i5Wf5GK"
                                      data-callback="recaptchaCallback" data-expired-callback="recaptchaExpired"
                                      > </div>

                                         <input id="hidden-grecaptcha" name="hidden-grecaptcha" type="text" style="opacity: 0; position: absolute; top: 0; left: 0; height: 1px; width: 1px;"/>
                                      </div>


                                </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary button-register">
                                    Cambiar Contraseña
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('javascript')
  <!-- recapcha -->
  {{ Html::script('https://www.google.com/recaptcha/api.js') }}

  {{ Html::script('medico/js/jquery.validate.min.js') }}



  <script>
   $(function($) {
      $('div.alert').not('.alert-danger').delay(3000).fadeOut(350);
      $('div.alert').not('.alert-info').delay(3000).fadeOut(350);

 });




        function debounce(func, wait, immediate) {
          var timeout;
          return function() {
            var context = this, args = arguments;
            var later = function() {
              timeout = null;
              if (!immediate) func.apply(context, args);
            };
            var callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
            if (callNow) func.apply(context, args);
          };
        };
        function recaptchaCallback() {
          var response = grecaptcha.getResponse(),
            $button = jQuery(".button-register");
          jQuery("#hidden-grecaptcha").val(response);
          console.log(jQuery("#registerForm").valid());
          if (jQuery("#registerForm").valid()) {
            $button.attr("disabled", false);
          }
          else {
            $button.attr("disabled", "disabled");
          }
        }
      function recaptchaExpired() {
        var $button = jQuery(".button-register");
        jQuery("#hidden-grecaptcha").val("");
        var $button = jQuery(".button-register");
        if (jQuery("#registerForm").valid()) {
          $button.attr("disabled", false);
        }
        else {
          $button.attr("disabled", "disabled");
        }
      }
      function submitRegister() {
        //ajax stuff
        console.log("llegaste");







      }
      (function ($, root, undefined) {
        $(function () {
            'use strict';
                jQuery("#registerForm").find("input").on("keyup", debounce(function() {
                  var $button = jQuery(".button-register");
                  console.log(jQuery("#registerForm").valid());
                  if (jQuery("#registerForm").valid()) {
                    $button.attr("disabled", false);
                  }
                  else {
                    $button.attr("disabled", "disabled");
                  }
                }, 1000));

                jQuery("#registerForm").validate({
                  rules: {

                    "email": { email: true,required:true},
                    "hidden-grecaptcha": {
                      required: true,
                      minlength: "255"
                    },
                    "password":'required',
                    "password_confirmation":{
                          equalTo: "#password"
                        },
                  },
                  messages: {
                    "password":'Ingrese clave',
                    "password_confirmation":'Ingrese Clave',
                    "email": "Ingrese una dirección válida de correo",
                    "email": "Ingrese un Correo",
                    "hidden-grecaptcha":"Debe selecionar el captcha",
                  },
                  //submitHandler: submitRegister
                });
            });
        })(jQuery, this);







  </script>
  @endsection
