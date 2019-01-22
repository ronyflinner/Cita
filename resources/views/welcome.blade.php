@extends('layouts.principal')
@section('navT')
        @include('partials.nav1')
        <div class="home_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_content">
                            <div class="home_title">Separa tu Cita</div>

                             <div class="home_text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo officiis iusto necessitatibus laboriosam earum officia perspiciatis velit, mollitia ab, repellendus deserunt unde eum ullam nobis. Quos pariatur illo id nihil!</div>
                            <div class="row">

                                <div class="col-md-2">


                            @if (Route::has('login'))

                                    @auth
                                        <div class="button home_button"><a href="{{ url('/home') }}"><span>Regresar</span><span>Regresar</span></a></div>


                                    @else
                                         <div class="button home_button"><a href="{{ route('login') }}"><span>Ingresar</span><span>Ingresar</span></a></div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="button home_button"><a href="{{ route('register') }}"><span>Registrarse</span><span>Registrarse</span></a></div>
                                    </div>


                                    @endauth

                            @endif
                         </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection


