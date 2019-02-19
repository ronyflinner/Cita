@extends('frontend.layout.principal')
@section('content')


      <aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url({{ url('liga/images/Sliders-web/3.jpg') }});">
			   		</li>
			   	</ul>
		  	</div>
		  	</aside>
            <div id="colorlib-services" >
			<div class="row">
					<div class="col-md-6 col-sm-12 animate-box" >
						<img src="{{ url('liga/images/Quehacemos/1.jpg') }}" class="img-responsive" style="height: 400px; width: 100%;">
					</div>
					<div class="col-md-6 col-sm-12 animate-box">
						<div class="container">
							<div class="row">
								<div class="col-md-6">
								<h2>¿Qu&eacute; hacemos?</h2>
								<p class="text-justify">

								Realizamos campañas educativas y preventivas de cáncer con el objetivo
								de generar conciencia en la población de la importancia de REALIZARSE
								EXÁMENES PERIÓDICOS para prevenir la enfermedad.<br>
								A través de nuestros modernos Centros de Prevención, realizamos despistajes
								de los diversos tipos de cáncer con mayor incidencia en el país. Además,
								brindamos apoyo social a las personas menos favorecidas con nuestras
								Unidades Móviles - consultorios ambulatorios
							    </p>
							</div>
							</div>
						</div>
					</div>
				</div>
		</div>
		<div class="colorlib-classes" style="padding:0 0;">
					<div class="row hidden-xs animate-box">
					<div class="col-md-4 col-md-sm-12"> <img src="{{ url('liga/images/Quehacemos/2.jpg') }}" width="100%" height="100%" class="img-responsive"></div>
					<div class="col-md-4 col-md-sm-12"> <img src="{{ url('liga/images/Quehacemos/3.jpg') }}" width="100%" height="100%" class="img-responsive"> </div>
					<div class="col-md-4 col-md-sm-12"> <img src="{{ url('liga/images/Quehacemos/4.jpg') }}" width="100%" height="100%" class="img-responsive"> </div>
					</div>
            </div>

       <div id="colorlib-services-2">
			<div class="row">
					<div class="col-md-6 col-sm-12 hidden-sm animate-box">
						<img src="{{ url('liga/images/Quehacemos/5.jpg') }}"  class="img-responsive" alt="" style="height:550px; width: 100%;">
					</div>
               <div class="col-md-6 col-sm-12 animate-box" >
						<div class="container">
							<div class="row">
								<div class="col-md-6 " style="margin-left: 20px;" >
								<h1>EDUCACI&Oacute;N</h1>
								<p class="text-justify">Nuestra Área de Educación capacita y actualiza continuamente a los profesionales
									de la salud sobre la prevención primaria y secundaria del cáncer y las nuevas
									técnicas de detección, con el objetivo de contribuir a la reducción de la incidencia,
									morbilidad y mortalidad del cáncer, y mejorar la calidad de vida de las personas.
									Hasta la fecha hemos realizado:<br></p>
									<ul>
									<li>El Primer Congreso Internacional de Colposcopia y patología del
									Tracto Genital Inferior.</li>
									<li>Curso de Asesoría Genética en Prevención de Cáncer Ginecológico.</li>
									<li>Cursos de Actualización en Manejo de Lesiones Premalignas de
									Cuello uterino y patología mamaria</li>
									<li>Más de 30 Jornadas Académicas</li>
									<li>Programa Educativo de Prevención de Cáncer de Cuello Uterino
									“Yo Cambio la Historia”</li>
									</ul>
								<p class="text-justify"> Además, realizamos un arduo trabajo de educación con la población más vulnerable
                                  a través de Talleres y Charlas sobre prevención de cáncer y estilos de vida saludable.</p>
							</div>
							</div>
						</div>
					</div>
				</div>
	         </div>
       <div id="colorlib-classes" >
			<div class="row">
				 <div class="col-md-12"></div>
					<div class="col-md-6 col-sm-12 animate-box">
						<div class="container">
							<div class="col-md-6 col-md-offset-1">
								<h2>INVESTIGACI&Oacute;N</h2>
								<p class="text-justify">
								<span></span>
								    Nuestra Unidad de Investigación desarrolla ensayos clínicos de prevención en
									las especialidades de Ginecología Oncológica y Patología Mamaria. Tiene por
									objetivo principal la investigación científica con el fin de establecer pautas para la
									prevención, detección temprana y manejo adecuado de los pacientes.
							    </p>
								<h3>ESTUDIOS:</h3>
							    <p>ESTAMPA: Estudio multicéntrico de tamizaje y triaje de cáncer de
								cuello uterino con pruebas del virus papiloma humano a mujeres
								entre 30 y 66 años del distrito de la Perla, Callao </p>
							</div>
							</div>
					    </div>
					<div class="col-md-6 col-sm-12 animate-box" >
					<img src="{{ url('liga/images/Quehacemos/6.jpg') }}" class="img-responsive" style="height: 550px; width: 100%;">
					</div>
				</div>
		</div>
	</div>

@endsection
@section('scritps')
 {{ Html::script('liga/js/main_principal.js') }}

@endsection