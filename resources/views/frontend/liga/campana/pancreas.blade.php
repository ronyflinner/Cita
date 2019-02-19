@extends('frontend.layout.principal')
@section('content')
	<style type="text/css">
		 .gallery-title
			{
			    font-size: 36px;
			    color: #FF0C39;
			    text-align: center;
			    font-weight: 500;
			    margin-bottom: 70px;
			}
			.gallery-title:after {
			    content: "";
			    position: absolute;
			    width: 7.5%;
			    left: 46.5%;
			    height: 45px;
			    border-bottom: 1px solid #5e5e5e;
			}
			.filter-button
			{
			    font-size: 18px;
			    border: 1px solid #FF0C39;
			    border-radius: 5px;
			    text-align: center;
			    color: #FF0C39;
			    margin-bottom: 30px;

			}
			.filter-button:hover
			{
			    font-size: 18px;
			    border: 1px solid #FF0C39;
			    border-radius: 5px;
			    text-align: center;
			    color: #ffffff;
			    background-color: #FF0C39;

			}
			.btn-default:active .filter-button:active
			{
			    background-color: #FF0C39;
			    color: white;
			}

			.port-image
			{
			    width: 100%;
			}

			.gallery_product
			{
			    margin-bottom: 30px;
			}
				.panel-body > address > ul >li {
				color: #ffffff;
				font-size: 13px;
			}

			.panel-body > h3 {
				color:#ffffff;
				font-size: 15px;
				font-weight: 300px;

			}
	</style>




		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url({{ url('liga/images/Sliders-web/16.jpg') }});">

			   		</li>
			   	</ul>
		  	</div>
		  	</aside>
            <div class="col-md-12"></div>


	            <div class="colorlib-classes">
				<div class="container">
						<div class="row">
							<div class="col-md-12 colorlib-heading center-heading text-center animate-box">
								<h1 class="heading-big">Prevención del Cáncer de Páncreas</h1>
								<h2>Prevención del Cáncer de Páncreas</h2>
							</div>
						</div>
							<div class="row">
								<div class="col-md-12">

								        <a href="#" class="thumbnail animate-box" style="border: 0;">
								             <img src="{{ url('liga/images/logo/1.png') }}" width="400px" height="400px" class="img-responsive">
								        </a>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12 animate-box text-justify">
									<p>
									&nbsp;&nbsp;&nbsp;&nbsp;Por el Día Mundial de la Prevención del Cáncer de Páncreas, a celebrarse el 16 de noviembre, la Liga Contra el Cáncer, la Sociedad Peruana de Oncología Médica, Clínica Internacional, Aliada y Oncosalud, lanzan la campaña “DALE SU LUGAR AL PÁNCREAS”, con el objetivo de dar a conocer a la población que el cáncer de páncreas es una enfermedad peligrosa y mortal, por ello la importancia de conocer las señales de alarma, así como practicar estilos de vida saludable para prevenirlo. </p>
									 <p>
									&nbsp;&nbsp;&nbsp;&nbsp;La campaña “DALE SU LUGAR AL PÁNCREAS” constará de la difusión de contenidos que permitan a la población conocer más de la enfermedad, logrando despertar el interés de hombres y mujeres con el propósito de generar una cultura de prevención.</p>

									<p>&nbsp;&nbsp;&nbsp;&nbsp;Durante la campaña, a través de la Liga Contra el Cáncer, se realizarán charlas, ferias y talleres en diferentes distritos de la ciudad de Lima durante todo el mes de noviembre. Además, se invitará a todos los peruanos a unirse a la campaña difundiendo en sus redes sociales información de prevención contra el cáncer de páncreas junto con los hashtags
									<mark>#DALESULUGARALPANCREAS</mark> y <mark>#DIAMUNDIALDECANCERDEPANCREAS.</mark>
									</p>
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
        <br/>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 1 animate-box">
            	<a href="{{ url('liga/images/galeria/pancreas/1.png') }}" data-toggle="lightbox" data-gallery="pancreas">
	                <img src="{{ url('liga/images/galeria/pancreas/1.png') }}" class="img-responsive img-fluid">
	            </a>

            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 2">
            	<a href="{{ url('liga/images/galeria/pancreas/2.png') }}" data-toggle="lightbox" data-gallery="pancreas">
	                <img src="{{ url('liga/images/galeria/pancreas/2.png') }}" class="img-responsive img-fluid">
	            </a>

            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 1">
            	<a href="{{ url('liga/images/galeria/pancreas/3.png') }}" data-toggle="lightbox" data-gallery="pancreas">
	                <img src="{{ url('liga/images/galeria/pancreas/3.png') }}" class="img-responsive img-fluid">
	            </a>

            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 3">
            	<a href="{{ url('liga/images/galeria/pancreas/4.png') }}" data-toggle="lightbox" data-gallery="pancreas">
	                <img src="{{ url('liga/images/galeria/pancreas/4.png') }}" class="img-responsive img-fluid">
	            </a>

            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 4">
            	<a href="{{ url('liga/images/galeria/pancreas/5.png') }}" data-toggle="lightbox" data-gallery="pancreas">
	                <img src="{{ url('liga/images/galeria/pancreas/5.png') }}" class="img-responsive img-fluid">
	            </a>

            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter irrigation">
            	<a href="{{ url('liga/images/galeria/pancreas/6.png') }}" data-toggle="lightbox" data-gallery="pancreas">
	                <img src="{{ url('liga/images/galeria/pancreas/6.png') }}" class="img-responsive img-fluid">
	            </a>

            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 4">
            	<a href="{{ url('liga/images/galeria/pancreas/7.png') }}" data-toggle="lightbox" data-gallery="pancreas">
	                <img src="{{ url('liga/images/galeria/pancreas/7.png') }}" class="img-responsive img-fluid">
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