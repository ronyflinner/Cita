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
			   	<li style="background-image: url({{ url('liga/images/Sliders-web/12.jpg') }});">

			   		</li>
			   	</ul>
		  	</div>
		  	</aside>
            <div class="col-md-12"></div>


	            <div class="colorlib-classes">
				<div class="container">
						<div class="row">
							<div class="col-md-12 colorlib-heading center-heading text-center animate-box">
								<h1 class="heading-big">Prevención del Cáncer de Mama</h1>
								<h2>Prevención del Cáncer de Mama</h2>
							</div>
						</div>
							<div class="row">
								<div class="col-md-12">

								        <a href="#" class="thumbnail animate-box" style="border: 0;">
								             <img src="{{ url('liga/images/logo/3.png') }}" width="400px" height="400px" class="img-responsive">
								        </a>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12 animate-box text-justify">
									<p>
									&nbsp;&nbsp;&nbsp;&nbsp;La Liga Contra el Cáncer por el Día Mundial de Prevención de Cáncer de Mama (19 de octubre), realiza su campaña de prevención de cáncer de mama con el objetivo de invitar a las personas a perder el miedo y darse un tiempo para realizarse un autoexamen de mama esté donde esté y además visitar al médico una vez al año para evitar la enfermedad.  </p>
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

        <div align="center" class="animate-box">
            <button class="btn btn-default filter-button" data-filter="all">Todo</button>
            <button class="btn btn-default filter-button" data-filter="1">Conferencias</button>
            <button class="btn btn-default filter-button" data-filter="2">Activaciones</button>
            <button class="btn btn-default filter-button" data-filter="3">Iluminación</button>

        </div>
        <br/>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 1 animate-box">

            	<a href="{{ url('liga/images/campañas/conferencia/1.jpg') }}" data-toggle="lightbox" data-gallery="conferencia">
	                <img src="{{ url('liga/images/campañas/conferencia/1.jpg') }}" class="img-responsive img-fluid">
	            </a>

            </div>
            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 1 animate-box">
            	<a href="{{ url('liga/images/campañas/conferencia/2.jpg') }}" data-toggle="lightbox" data-gallery="conferencia">
	                <img src="{{ url('liga/images/campañas/conferencia/2.jpg') }}" class="img-responsive img-fluid">
	            </a>

            </div>
            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 1 animate-box">
            	<a href="{{ url('liga/images/campañas/conferencia/3.jpg') }}" data-toggle="lightbox" data-gallery="conferencia">
	                <img src="{{ url('liga/images/campañas/conferencia/3.jpg') }}" class="img-responsive img-fluid">
	            </a>

            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 1 animate-box">
            	<a href="{{ url('liga/images/campañas/conferencia/4.jpg') }}" data-toggle="lightbox" data-gallery="conferencia">
	                <img src="{{ url('liga/images/campañas/conferencia/4.jpg') }}" class="img-responsive img-fluid">
	            </a>

            </div>

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 1 animate-box">
            	<a href="{{ url('liga/images/campañas/conferencia/11.jp') }}g" data-toggle="lightbox" data-gallery="conferencia">
	                <img src="{{ url('liga/images/campañas/conferencia/11.jp') }}g" class="img-responsive img-fluid">
	            </a>

            </div>


            <!-- Activaciones -->

            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 2 animate-box">
            	<a href="{{ url('liga/images/campañas/activacionconbloggers/2.jpg') }}" data-toggle="lightbox" data-gallery="bloggers">
	                <img src="{{ url('liga/images/campañas/activacionconbloggers/2.jpg') }}" class="img-responsive img-fluid">
	            </a>

            </div>
            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 2 animate-box">
            	<a href="{{ url('liga/images/campañas/activacionconbloggers/3.jpg') }}" data-toggle="lightbox" data-gallery="bloggers">
	                <img src="{{ url('liga/images/campañas/activacionconbloggers/3.jpg') }}" class="img-responsive img-fluid">
	            </a>

            </div>
            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 2 animate-box">
            	<a href="{{ url('liga/images/campañas/activacionconbloggers/4.jpg') }}" data-toggle="lightbox" data-gallery="bloggers">
	                <img src="{{ url('liga/images/campañas/activacionconbloggers/4.jpg') }}" class="img-responsive img-fluid">
	            </a>

            </div>
            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 2 animate-box">
            	<a href="{{ url('liga/images/campañas/activacionconbloggers/5.jpg') }}" data-toggle="lightbox" data-gallery="bloggers">
	                <img src="{{ url('liga/images/campañas/activacionconbloggers/5.jpg') }}" class="img-responsive img-fluid">
	            </a>

            </div>
            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 2 animate-box">
            	<a href="{{ url('liga/images/campañas/activacionconbloggers/6.jpg') }}" data-toggle="lightbox" data-gallery="bloggers">
	                <img src="{{ url('liga/images/campañas/activacionconbloggers/6.jpg') }}" class="img-responsive img-fluid">
	            </a>

            </div>
            <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 animate-box filter 2 animate-box">
            	<a href="{{ url('liga/images/campañas/activacionconbloggers/7.jpg') }}" data-toggle="lightbox" data-gallery="bloggers">
	                <img src="{{ url('liga/images/campañas/activacionconbloggers/7.jpg') }}" class="img-responsive img-fluid">
	            </a>

            </div>

            <!-- Iluminación -->



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


			    $(".filter-button").click(function(){
			        var value = $(this).attr('data-filter');

			        if(value == "all")
			        {
			            //$('.filter').removeClass('hidden');
			            $('.filter').show('1000');
			        }
			        else
			        {
					//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
					//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
			            $(".filter").not('.'+value).hide('3000');
			            $('.filter').filter('.'+value).show('3000');

			        }
			    });

			    if ($(".filter-button").removeClass("active")) {
					$(this).removeClass("active");
				}
					$(this).addClass("active");

			});
	</script>
@endsection