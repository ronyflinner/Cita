@extends('frontend.layout.principal')
@section('content')

		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url({{ url('liga/images/Sliders-web/14.jpg') }});">

			   		</li>
			   	</ul>
		  	</div>
		  	</aside>
            <div class="col-md-12"></div>


	            <div class="colorlib-classes">
				<div class="container">
						<div class="row">
							<div class="col-md-12 colorlib-heading center-heading text-center animate-box">
								<h1 class="heading-big">Prevención del Cáncer de Cuello Uterino</h1>
								<h2>Prevención del Cáncer de Cuello Uterino</h2>
							</div>
						</div>
						<div class="row">
								<div class="col-md-12">

								        <a href="#" class="thumbnail animate-box" style="border: 0;">
								             <img src="{{ url('liga/images/campañas/Camp2.jpg') }}" width="400px" height="400px" class="img-responsive">
								        </a>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12 animate-box text-justify">
									<p>
									&nbsp;&nbsp;&nbsp;&nbsp;El cáncer de cuello uterino es la primera causa de muerte por cáncer en la mujer peruana. Al día 8 mujeres fallecen a causa del cáncer de cuello uterino, enfermedad que en la mayoría de casos es causada por la infección del Virus del Papiloma Humano, el cual podría ser evitado a través de chequeos preventivos y la vacunación.
									</p>
									<p>
									&nbsp;&nbsp;&nbsp;&nbsp;Desde el 2011, el Gobierno del Perú incluyó en el calendario de inmunizaciones la vacuna para prevenir el cáncer de cuello uterino en niñas de 5to grado de primaria de colegios públicos y privados. Es por ello que, en el 2015 la Liga Contra el Cáncer creó la campaña “YO CAMBIO LA HISTORIA”, una campaña educativa que tiene por objetivo dar a conocer a los padres de familia la existencia de la vacuna y la importancia de aplicarla a sus hijas.</p>
									<p>
									&nbsp;&nbsp;&nbsp;&nbsp;Desde la ejecución de la campaña se logró visitar más de 30 ciudades del país para sensibilizar a más 200 mil padres de familia, alumnos, docentes y público en general.
									 </p>
								</div>

							</div>

			<!--	<br><br><br>
				<div class="row">
						<div class="col-md-12 colorlib-heading center-heading text-center animate-box">
							<h1 class="heading-big">Galería</h1>
							<h2>Galería</h2>
						</div>
					</div>


				<div class="container">
        <div class="row">

        <div align="center" class="animate-box">
            <button class="btn btn-default filter-button" data-filter="all">Todo</button>
            <button class="btn btn-default filter-button" data-filter="1">1</button>
            <button class="btn btn-default filter-button" data-filter="2">2</button>
            <button class="btn btn-default filter-button" data-filter="3">3</button>
            <button class="btn btn-default filter-button" data-filter="4">4</button>
        </div>
        <br/>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 1 animate-box">
                <img src="http://fakeimg.pl/365x365/" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 2">
                <img src="http://fakeimg.pl/365x365/" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 1">
                <img src="http://fakeimg.pl/365x365/" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 3">
                <img src="http://fakeimg.pl/365x365/" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 4">
                <img src="http://fakeimg.pl/365x365/" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter irrigation">
                <img src="http://fakeimg.pl/365x365/" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 4">
                <img src="http://fakeimg.pl/365x365/" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 1">
                <img src="http://fakeimg.pl/365x365/" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 1">
                <img src="http://fakeimg.pl/365x365/" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 2">
                <img src="http://fakeimg.pl/365x365/" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 4">
                <img src="http://fakeimg.pl/365x365/" class="img-responsive">
            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 1">
                <img src="http://fakeimg.pl/365x365/" class="img-responsive">
            </div>
        </div>
    </div>-->

			</div>
		</div>
@endsection
@section('scritps')
{{ Html::script('liga/js/main_principal.js') }}



@endsection