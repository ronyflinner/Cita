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
			   	<li style="background-image: url({{ url('liga/images/Sliders-web/6.jpg') }});">

			   		</li>
			   	</ul>
		  	</div>
		  	</aside>
            <div class="col-md-12"></div>
            <div class="colorlib-classes">
			<div class="container">
				<div class="row">
					<div class="col-md-12 colorlib-heading center-heading text-center animate-box">
						<h1 class="heading-big">Servicios</h1>
						<h2>Servicios</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/servicios/1.jpg') }});">
							</div>
							<div class="wrap">
								<div class="desc">
								   <br>
									<h3><a href="#">DESPISTAJE GENERAL</a></h3>
									<p > Chequeo clínico de mama, piel, ganglios, tiroides y Papanicolaou.</p>
								</div>

							</div>
						</div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/servicios/2.jpg') }});">
							</div>
							<div class="wrap">
								<div class="desc">
									<br>
									<h3><a href="#">MAMOGRAFÍA</a></h3>
									<p>Estudio radiológico de las glándulas mamarias que localiza las lesiones.</p>
								</div>

							</div>
						</div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/servicios/3.jpg') }});">
							</div>
							<div class="wrap">
								<div class="desc">
							<br>
									<h3><a href="#">ECOGRAFÍA</a></h3>
									<p>Prueba sencilla e indolora en la que se visualiza detalles estructurales.</p>
								</div>

							</div>
						</div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/servicios/4.jpg') }});">
							</div>
							<div class="wrap">
								<div class="desc">
								    <br>
									<h3><a href="#">COLPOSCOPÍA </a></h3>
									<p>Procedimiento ginecológico que consiste en la exploración del cuello uterino.</p>
								</div>

							</div>
						</div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/servicios/5.jpg') }});">
							</div>
							<div class="wrap">
								<div class="desc">
									<br>
									<h3><a href="#">ENDOSCOPÍA</a></h3>
									<p>Exploración visual de las cavidades internas del cuerpo mediante un endoscopio.  </p>
								</div>

							</div>
						</div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/servicios/6.jpg') }});">
							</div>
							<div class="wrap">
								<div class="desc">
									<br>
									<h3><a href="#">COLONOSCOPÍA </a></h3>
									<p>Exploración del interior del recto, del colon e incluso de los últimos centímetros del intestino delgado.</p>
								</div>

							</div>
						</div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/servicios/7.jpg') }});">
							</div>
							<div class="wrap">
								<div class="desc">
									<br>
									<h3><a href="#">PROCTOSCOPÍA </a></h3>
									<p>Examen visual y directo de la mucosa del recto mediante un rectoscopio.</p>
								</div>

							</div>
						</div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/servicios/8.jpg') }});">
							</div>
							<div class="wrap">
								<div class="desc">
									<br>
									<h3><a href="#">PSICO – ONCOLOGÍA</a></h3>
									<p>Se ocupa de las relaciones entre el comportamiento, la salud, la prevención y el tratamiento.</p>
								</div>

							</div>
						</div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/servicios/9.jpg') }});">
							</div>
							<div class="wrap">
								<div class="desc">
									<br>
									<h3><a href="#">PSA</a></h3>
									<p>Prueba del antígeno prostático específico (PSA) y los exámenes de detección para el cáncer de próstata.</p>
								</div>
								</div>
						</div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/servicios/10.jpg') }});">
							</div>
							<div class="wrap">
								<div class="desc">
									<br>
									<h3><a href="#">EXÁMENES DE LABORATORIO</a></h3>
									<p>Lugar equipado con instrumentos con los que se realizan investigaciones.</p>
								</div>
								</div>
						   </div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/servicios/11.jpg') }});">
							</div>
							<div class="wrap">
								<div class="desc">
									<br>
									<h3><a href="#">PRUEBA VIRAL</a></h3>
									<p>Una prueba viral se hace para encontrar virus que causan infección.</p>
								</div>
								</div>
						   </div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/servicios/12.jpg') }});">
							</div>
							<div class="wrap">
								<div class="desc">
									<br>
									<h3><a href="#">TOMA DE BIOPSIAS</a></h3>
									<p>Consiste en la extracción de una muestra total o parcial de tejido para ser examinada al microscopio. </p>
								</div>
								</div>
						   </div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/servicios/13.jpg') }});">
							</div>
							<div class="wrap">
								<div class="desc">
									<br>
									<h3><a href="#">CIRUGÍAS PREVENTIVAS</a></h3>
									<p>Abarca cualquier especialidad la cual es necesaria para prevenir a largo plazo alguna lesión. </p>
								</div>
								</div>
						   </div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/servicios/14.jpg') }});">
							</div>
							<div class="wrap">
								<div class="desc">
									<br>
									<h3><a href="#">CONO LEEP</a></h3>
									<p>Se extrae del cuello uterino un pedazo de tejido en forma de cono. </p>
								</div>
								</div>
						   </div>
					</div>

					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/servicios/15.jpg') }});">
							</div>
							<div class="wrap">
								<div class="desc">
									<br>
									<h3><a href="#">HISTEROSCOPÍAS </a></h3>
									<p>Procedimiento clínico que permite ver el interior del útero por medio de una endoscopía. </p>
								</div>
								</div>
						   </div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/servicios/16.jpg') }});">
							</div>
							<div class="wrap">
								<div class="desc">
									<br>
									<h3><a href="#">VACUNAS CONTRA EL VPH</a></h3>
									<p>Protegen contra la infección por cepas del Virus del Papiloma Humano, que pueden causar hasta 9 tipos de cáncer tanto en hombres como en mujeres.  </p>
								</div>
								</div>
						   </div>
					</div>
				</div>
			</div>
		</div>
		</div>

@endsection
@section('scritps')	<!-- Main -->
    {{ Html::script('liga/js/main_principal.js') }}

@endsection