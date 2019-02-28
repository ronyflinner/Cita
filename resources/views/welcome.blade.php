@extends('layouts.principal')
@section('navT')
    @include('partials.nav1')

      <section id="intro" class="intro t">
              <div class="intro-content">
                <div class="container">
                  <div class="row">
                    <div class="col-lg-6 col-md-offset-3">
                      <div class="wow fadeInDown" data-wow-offset="0" data-wow-delay="0.1s">
                        <h2 class="h-ultra">Agenda tu Cita</h2>
                      </div>
                      <div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.1s">
                        <h4 class="h-light">Programa tu cita en cualquier momento del día</h4>
                      </div>
                      <div class="well well-trans">
                        <div class="wow fadeInRight" data-wow-delay="0.1s">

                            <ul class="lead-list">
                                  <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Agenda tu cita a las 24 horas</strong><br /></span></li>
                                  <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Escoge el horario que más te guste</strong><br /></span></li>
                                  <li><span class="fa fa-check fa-2x icon-success"></span> <span class="list"><strong>Asegura tu cita cancelando al instante</strong><br /></span></li>
                            </ul>

                            @if (Route::has('login'))
                                  @auth
                                      <div class="btn btn-skin btn-lg"><a href="{{ route('logout') }}"><span>Regresar</span></div>

                                      <p class="text-right wow bounceIn" data-wow-delay="0.4s"><a class="btn btn-skin btn-lg" href="{{ url('/') }}">Ingresar<i class="fa fa-angle-right"></i></a></p>
                                  @else
                                       <p class="text-right wow bounceIn" data-wow-delay="0.4s"><a class="btn btn-skin btn-lg" href="{{ route('login') }}">Ingresar<i class="fa fa-angle-right"></i></a></p>
                                  </div>
                                  <p class="text-right wow bounceIn" data-wow-delay="0.4s">
                                      <a class="btn btn-skin btn-lg" href="{{ route('register') }}"><span>Registrarse <i class="fa fa-angle-right"></i></span></a>
                                  </p>
                                  @endauth
                             @endif
                        </div>
                      </div>

                    </div>
                </div>
              </div>
        </section>


@endsection

@section('javascript')



@endsection
