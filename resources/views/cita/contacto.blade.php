@extends('layouts.principal')

@section('navT')

        @include('partials.nav2')
@endsection
@section('seccion_c')

  <style type="text/css">
    .jumbotron {
      background: #358CCE;
      color: #FFF;
      border-radius: 0px;
      }
      .jumbotron-sm { padding-top: 24px;
      padding-bottom: 24px; }
      .jumbotron small {
      color: #FFF;
      }
      .h1 small {
      font-size: 24px;
      }
  </style>
  <div class="container">

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">
                    Contactanos </h1>
            </div>
        </div>
    </div>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">


              {!! Form::open(['route'=>'contacto.store','name'=>'form', 'method'=>'POST',"class"=>"form ",'files' => false, 'id'=>'form']) !!}
              {!! Form::token() !!}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group" height="40">
                            <label for="subject">
                                Tipo de mensaje</label>
                            <select id="subject" name="subject" class="form-control form-control-lg" required="required">
                                <option value="na" selected="">Escoje uno:</option>
                                <option value="service">Ayuda</option>
                                <option value="suggestions">Pregunta</option>
                                <option value="product">Reclamación</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Mensaje</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                            Enviar Mensaje</button>
                    </div>
                </div>
                {!! Form::close() !!}



            </div>
        </div>
        <div class="col-md-4">
            <form>
            <legend><span class="fa fa-inbox"></span> Nuestras Clinicas </legend>
            <address>
                <strong></strong><br>
               Av. Brasil 2746, Pueblo Libre | Av. Nicolás de Piérola 727, Lima | Av. Angamos Este 2514, Surquillo<br>
                <abbr title="Phone">
                   Central telefónica *5442
                </abbr>
            </address>

            </form>
        </div>
    </div>
</div>

  </div>
@endsection

@section('javascript')
<script>
      var PlantillaContacto = {
              //Variables
                MesajeSaludo:'HelloWord',
                init : ()=> {

                    PlantillaContacto.General();
                    PlantillaContacto.buttonLugar();
                },
                // Metodos
                sayMessage: mensaje=> {
                  alert("Hola como estas!!!");
                },
                General:()=>{
                   $(function() {
                      /*Funcionnes Genericas*/
                      $('.single').select2();

                      $('div.alert').not('.alert-important').delay(3000).fadeOut(350);

                      var now = moment();
                      /*Limpieza*/


                      $('#form').on('submit', function(event){
                          event.preventDefault();
                          if($('#form').parsley().isValid())
                          {


                           // PlantillaContacto.dataAjaxhora($("#form").serialize(),2);
                          }
                      });


                   });
                },
                toast_notification:(message,data,flag)=>{
                      let listar;
                      if(flag==1){
                        listar="<ul>";
                          data.forEach( function(element, index) {
                            listar+=`<li>${element}</li>`;
                          });
                        listar+="</ul>";

                        toastr[message](listar);
                      }else{
                        toastr[message](data);
                      }

                      toastr.options = {
                       "closeButton": false,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-bottom-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                      }

                    },
                      clean_form_html:destiny=>{
                          $(destiny).html('');
                      },
                      hide_form_input:(destiny,property)=>{
                          $(destiny).attr({
                            style: `display:${property};`
                          });
                      },
                      clean_form_input:destiny=>{
                          $(destiny).empty();
                      },
                      form_option_append:(destiny,index,value)=>{
                          $(destiny).append('<option value='+index+'>'+ value+' </option>' );
                      },
                      form_option_disable:(value,boleano)=>{
                          $(value).prop('disabled', boleano);
                      },
                      form_select_default:destiny=>{
                          $(destiny).prepend('<option value="" selected>Selecionar</option>');
                      },



              };


              $(function() {
                //arranque de funciones y procesos que estan en el init
                  PlantillaContacto.init();
              });

</script>



@endsection

