@extends('frontend.layout.principal')
@section('content')
<style type="text/css">

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
			   	<li style="background-image: url({{ url('liga/images/Sliders-web/8.jpg') }});">

			   		</li>
			   	</ul>
		  	</div>
		  	</aside>
           <div class="colorlib-classes">
			<div class="container">
				<div class="row">
					<div class="col-md-12 colorlib-heading center-heading text-center animate-box">
					    <h1 class="heading-big">CAMPAÑA PUBLICITARIA</h1>
						<h2 style="color: #FF0C39">CAMPAÑA PUBLICITARIA</h2>
					</div>
					<div class="col-md-8 col-md-offset-2 animate-box">
					<p align="justify"> Este año, la Liga Contra el Cáncer, bajo la idea creativa de la agencia MULLENLOWE, ha creado un novedoso concepto para la Colecta Pública 2018, el cual busca resaltar el mensaje de que padecer de cáncer es una de las situaciones más dolorosas que puede pasar una persona y su entorno y no hay forma de llevar un momento así, solo estar JUNTOS: <strong>“Estar juntos para prevenir, estar juntos para colaborar, estar juntos por si algo pasa. Contra el Cáncer tenemos que estar juntos. Porque el cáncer lo prevenimos juntos”. </strong> </p>
					</div>
					<div class="col-md-12"></div>
				</div>
			  <div class="col-md-12 animate-box col-md-offset-2 fadeInUp animated-fast">
                 <div class="col-md-4" align="center">
                 <a href="{{ url('liga/images/colecta/imagenes-1/1.jpg') }}" data-toggle="lightbox" data-gallery="example-gallery">
                 <img src="{{ url('liga/images/colecta/imagenes-1/1-1.jpg') }}" width="300px" height="300px"  class="img-fluid"></a>
                 <div class="classes-entry">
                 <div class="desc">
					 <h3>Despistajes Preventivos</h3>
			    </div>
                </div>
                 </div>
                 <div class="col-md-4"  align="center">
                 <a href="{{ url('liga/images/colecta/imagenes-1/2.jpg') }}" data-toggle="lightbox" data-gallery="example-gallery">
                 <img src="{{ url('liga/images/colecta/imagenes-1/2-2.jpg') }}" width="300px" height="300px"  class="img-fluid text-center"></a>
                 <div class="classes-entry">
                 <div class="desc"><h3>Programas educativos</h3></div>
                </div>
                </div>

			</div>
       </div>
</div>
		</div>

@endsection

@section('scritps')
{{ Html::script('liga/js/main_principal.js') }}
	<script>
	$(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
	</script>s

@endsection