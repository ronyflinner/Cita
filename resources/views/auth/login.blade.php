@extends('layouts.principal')
@section('navT')
      @include('partials.nav1')


         <section id="intro" class="intro">
      <div class="intro-content">
        <div class="container">
             <div class="info">

                @include('errors.flash')
                 <div class="form-wrapper">
                    <div class="col-md-8 col-md-offset-2">
                     <div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">

                      <div class="panel panel-skin">
                        <div class="panel-heading">
                          <h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Ingreso al Sistema de Citas</h3>
                        </div>
                        <div class="panel-body">
                          <div id="sendmessage">Your message has been sent. Thank you!</div>
                          <div id="errormessage"></div>

                          <form class="form-horizontal" method="POST" action="{{ route('login') }}" id="registerForm">
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
                                    <input id="password" name='password' type="password" class="form-control" name="password" >

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
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
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary button-register ">
                                        Ingresar
                                    </button>

                                    <a class="btn btn-link" style="color: #33bdc2;" href="{{ route('password.request') }}">
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
         </div>
      </div>
    </section>


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
                    "password": "required",
                    "email": { email: true,required:true},
                    "hidden-grecaptcha": {
                      required: true,
                      minlength: "255"
                    }
                  },
                  messages: {
                    "password":'Ingrese una clave',
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