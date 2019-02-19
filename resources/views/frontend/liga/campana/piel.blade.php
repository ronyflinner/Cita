@extends('frontend.layout.principal')
@section('content')

		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url({{ url('liga/images/campañas/piel/15.png') }});">

			   		</li>
			   	</ul>
		  	</div>
		  	</aside>
            <div class="col-md-12"></div>


	            <div class="colorlib-classes">
				<div class="container">
						<div class="row">
							<div class="col-md-12 colorlib-heading center-heading text-center animate-box">
								<h1 class="heading-big">Prevención del Cáncer de Piel</h1>
								<h2>Prevención del Cáncer de Piel</h2>

							</div>
						</div>
							<div class="row">
								<div class="col-md-12">

								        <a href="#" class="thumbnail animate-box" style="border: 0;">
								             <img src="{{ url('liga/images/campañas/Camp1.jpg') }}" width="400px" height="400px" class="img-responsive">
								        </a>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12 animate-box text-justify">
									<p>
									&nbsp;&nbsp;&nbsp;&nbsp;Todos los años la Liga Contra el Cáncer realiza su campaña de prevención de cáncer de piel con el objetivo de dar a conocer a la población que los rayos ultravioletas están en todos lados, afecta a todos los peruanos y exponerte a ellos sin protección es altamente peligroso para la salud, pues es el principal causante de cáncer de piel. Por ello, la importancia de tomar medidas de protección. </p>
								</div>

							</div>

				<br><br><br>
				<div class="row">
						<div class="col-md-12 colorlib-heading center-heading text-center animate-box">
							<h1 class="heading-big">Galería</h1>
							<h2>Galería</h2>
						</div>
					</div>


				<div class="container">
        <div class="row">

       <!-- <div align="center" class="animate-box">
            <button class="btn btn-default filter-button" data-filter="all">Todo</button>
            <button class="btn btn-default filter-button" data-filter="1">1</button>
            <button class="btn btn-default filter-button" data-filter="2">2</button>
            <button class="btn btn-default filter-button" data-filter="3">3</button>
            <button class="btn btn-default filter-button" data-filter="4">4</button>
        </div>-->
        <br/>



            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 1 animate-box">
            	<a href="{{ url('liga/images/campañas/piel/11.jpg') }}" data-toggle="lightbox" data-gallery="piel_1" height="40">
	                <img src="{{ url('liga/images/campañas/piel/11.jpg') }}" class="img-responsive img-fluid">
	            </a>

            </div>
            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 1 animate-box">
            	<a href="{{ url('liga/images/campañas/piel/14.jpg') }}" data-toggle="lightbox" data-gallery="piel_1">
	                <img src="{{ url('liga/images/campañas/piel/14.jpg') }}" class="img-responsive img-fluid">
	            </a>

            </div>
             <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 1 animate-box">
             	<a href="{{ url('liga/images/campañas/piel/13.jpg') }}" data-toggle="lightbox" data-gallery="piel_1">
	                <img src="{{ url('liga/images/campañas/piel/13.jpg') }}" class="img-responsive img-fluid">
	            </a>

            </div>







        </div>
    </div>

			</div>
		</div>
@endsection

@section('scritps')
{{ Html::script('liga/js/main_principal.js') }}

	<script type="text/javascript">
		$(function(){
				/*lightbox*/
				$(document).on('click', '[data-toggle="lightbox"]', function(event) {
	                event.preventDefault();
	                $(this).ekkoLightbox();
	            });

			});
	</script>

@endsection