@extends('layouts.principal')

@section('navT')

        @include('partials.nav1')
@endsection
@section('seccion_c')

<section id="intro" class="intro">
      <div class="intro-content">
        <div class="container">
             <div class="info">
        <div class="container">
    <div class="form-wrapper">
                <div class="row">
                	<div class="col-md-4">
                		<div class="wow fadeInUp" data-wow-delay="0.2s">
			              <div class="box text-center">

			                <i class="fa fa-list-alt fa-3x circled bg-skin"></i>
			                <h4 class="h-bold">Paciente</h4>
			                <p>
			                  Haz clic en el botón "Ingresa" y coloca tus datos para generar la cita.
			                </p>
			                <a href="{{ route('crearcita.index') }}"> <button type="submit" class="btn btn-primary">
                                    Ingresar
                                </button></a>
			              </div>

			            </div>
                	</div>
                	<div class="col-md-4">
                		<div class="wow fadeInUp" data-wow-delay="0.2s">
			              <div class="box text-center">

			                <i class="fa fa-list-alt fa-3x circled bg-skin"></i>
			                <h4 class="h-bold">Administrador</h4>
			                <p>
			                  Solo de uso para el personal autorizado de la institución.
			                </p>
                         <a href="{{ route('programarcita.index') }}">
                            <button type="submit" class="btn btn-primary">
                                    Ingresar
                            </button>
                          </a>
			              </div>
			            </div>
                	</div>

                  <div class="col-md-4">
                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                    <div class="box text-center">

                      <i class="fa fa-list-alt fa-3x circled bg-skin"></i>
                      <h4 class="h-bold">Asistencia</h4>
                      <p>
                        Solo de uso para el personal autorizado de la institución.
                      </p>


                               <a href="{{ route('verificarcita.index') }}"> <button type="submit" class="btn btn-primary">
                                    Ingresar
                                </button></a>

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