@extends('layouts.principal')

@section('navT')

        @include('partials.nav')
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
                    Mensaje </h1>
            </div>
        </div>
    </div>

<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <div class="row">
                    <div class="col-md-12">

                        <div class="form-group">
                            <label for="name">
                                Ingresar mensaje</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                               ></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" id="men">
                            Enviar Mensaje</button>
                    </div>
                </div>



            </div>
        </div>
        <div class="col-md-4">
            <form>
            <legend><span class="fa fa-inbox"></span> Centros de Prevención </legend>
            <address>
                <strong></strong><br>
               Av. Brasil 2746 - Pueblo Libre <br> Av. Nicolás de Piérola 727 - Lima <br> Av. Angamos Este 2514 - Surquillo<br>

            </address>

            </form>
        </div>
    </div>
</div>


  </div>
@endsection

@section('javascript')

<script src="{{ url('health/plugins/ckeditor/ckeditor.js') }}"></script>
<script>
      var PlantillaContacto = {
              //Variables
                MesajeSaludo:'HelloWord',
                init : ()=> {

                    PlantillaContacto.General();

                },
                // Metodos
                sayMessage: mensaje=> {
                  alert("Hola como estas!!!");
                },
                General:()=>{

                      $('#men').click(function(event) {

                            alert('hola');
                            vurl='{{ url('admin/usuario/cargard') }}';
                                //vurl = `${vurl}/${url1}`;

                               //(Location).load(vurl, { id: url1 });
                             var parametros = {
                                       "mensaje" : $('#message').val(),
                                     };

                                console.log(vurl);
                              $.ajax({
                                url:   vurl,
                                data: parametros,
                                type:  'GET', //método de envio
                                dataType : 'json',
                                headers: {
                                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                          } ,
                                success:  function (data3) {
                                   console.log('data 6');
                                   console.log(data3);
                                   actualizar = data3;
                                   PlantillaContacto.toast_notification("success",'Guardado Correctaente!!!',2);
                                   setTimeout(
                                      function()
                                      {
                                        location.reload();
                                      }, 3000);

                                },
                                error: function (data2) {
                                   console.log('Error:', data2);
                                  },
                                  async: false
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

