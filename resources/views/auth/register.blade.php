@extends('layouts.principal')
@section('navT')
        @include('partials.nav1')

 <section id="intro" class="intro">
 <div class="intro-content">
        <div class="container">
             <div class="info">

                 <div class="form-wrapper">
                    <div class="col-md-8 col-md-offset-2">
                     <div class="wow fadeInRight" data-wow-duration="2s" data-wow-delay="0.2s">

                      <div class="panel panel-skin">
                        <div class="panel-heading">
                          <h3 class="panel-title"><span class="fa fa-pencil-square-o"></span> Registrar Usuarios</h3>
                        </div>
                        <div class="panel-body">
                          <div id="sendmessage">Your message has been sent. Thank you!</div>
                          <div id="errormessage"></div>

                           <form class="form-horizontal" id="registerForm" method="POST" action="{{ route('register') }}">
                             {{ csrf_field() }}

                         <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                             {{ Form::label('tipoDocumento', 'Tipo de Documento',['class'=>'col-md-4 control-label']) }}

                            <div class="col-md-6">
                                {!! Form::select('tipo',$tipoDocumento, '', ['class'=>'form-control form-control single', 'required', 'id'=>'tipo'
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
                            <div class="row2">
                                  <h4 class="text-center"><b>Terminos y Condiciones</b></h4>
                                <p class="primeralinea text-justify">
                                En cumplimiento de lo dispuesto por la Ley N°29733, Ley de Protección de Datos Personales y su Reglamento, le comunicamos que sus datos personales serán almacenados  en las bases de datos de la Liga Contra el Cáncer, con el fin de poderle prestar y ofrecer nuestros servicios y novedades de la organización. La Liga Contra el Cáncer manifiesta cumplir con la normativa vigente en materia de protección de datos personales, y en particular con las medidas de protección correspondientes
                                </p>
                            </div>
                            <div class="row2 text-center">

                                <label class="radio-inline"><input type="radio" name="terminos[]" class="terminos" value="1" required="" checked>Acuerdo</label>
                                <label class="radio-inline"><input type="radio" name="terminos[]" class="terminos" value="0">Desacuerdo</label>


                        </div>


                        <br><br>
                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary checkRegister button-register" >
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

 </section>


@endsection
@section('javascript')

  <!-- recapcha -->
  {{ Html::script('https://www.google.com/recaptcha/api.js') }}

  {{ Html::script('medico/js/jquery.validate.min.js') }}


<script>
       $(function() {
                //arranque de funciones y procesos que estan en el init
              $('.dni').mask('000000000');
              $('#telefono').mask('(51)000000000');
              $('.single').select2();

              $(".terminos").click(function(event) {
                  /* Act on the event */
                    if($(this).val()==1){
                        $(".checkRegister").prop('disabled', false);
                     }else{
                        $(".checkRegister").prop('disabled', true);
                    }
              });

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
                    "tipo":"required",
                    "numero":"required",
                    "name":"required",
                    "apellido_paterno":"required",
                    "apellido_materno":"required",
                    "telefono":"required",
                    "password":"required",
                    "password_confirmation":"required",
                    "terminos[]":"required",
                    "password": "required",
                    "email": { email: true,required:true},
                    "hidden-grecaptcha": {
                      required: true,
                      minlength: "255"
                    }
                  },
                  messages: {
                    "tipo":"Debe selecionar un tipo",
                    "numero":"Ingrese su documento",
                    "name":"Ingrese su nombre",
                    "apellido_materno":"Ingrese su apellido materno",
                    "apellido_paterno":"Ingrese su apellido paterno",
                    "telefono":"Ingrese su teléfono",
                    "password_confirmation":"Ingrese clave",
                    "terminos":"Debe aceptar los terminos",

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













