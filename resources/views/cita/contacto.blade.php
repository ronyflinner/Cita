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
                <form>
                <div class="row">
                    <div class="col-md-6">


                        <div class="form-group" height="40">
                            <label for="subject">
                                Tipo de mensaje</label>
                            <select id="subject" name="subject" class="form-control" required="required">
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
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <form>
            <legend><span class="glyphicon glyphicon-globe"></span> Nuestras Clinicas </legend>
            <address>
                <strong></strong><br>
                795 Folsom Ave, Suite 600<br>
                San Francisco, CA 94107<br>
                <abbr title="Phone">
                    P:</abbr>
                (123) 456-7890
            </address>
            <address>
                <strong>Full Name</strong><br>
                <a href="mailto:#">first.last@example.com</a>
            </address>
            </form>
        </div>
    </div>
</div>

  </div>
@endsection
