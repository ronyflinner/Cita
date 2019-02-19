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
			   	<li style="background-image: url({{ url('liga/images/Sliders-web/17.png') }});">

			   		</li>
			   	</ul>
		  	</div>
		  	</aside>
            <div class="col-md-12"></div>


	            <div class="colorlib-classes">
				<div class="container">
						<div class="row">
							<div class="col-md-12 colorlib-heading center-heading text-center animate-box">
								<h1 class="heading-big">Día Mundial Contra el Cáncer</h1>
								<h2>Campaña por el Día Mundial Contra el Cáncer</h2>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12 col-md-6">
								 <a href="#" class="thumbnail animate-box" style="border: 0;">
						             <img src="{{ url('liga/images/logo/mundialLogo01_2019_enero.png') }}" width="400px" height="400px" class="img-responsive">
						        </a>
							</div>
							<div class="col-xs-12 col-md-6">
								  <a href="#" class="thumbnail animate-box" style="border: 0;">
						             <img src="{{ url('liga/images/logo/mundialLogo02_2019_enero.png') }}" width="400px" height="400px" class="img-responsive">
						        </a>
							</div>
						</div>
							<br>
							<br>
							<br>
							<div class="row">
								<div class="col-md-12 animate-box text-justify">
									<p>
									&nbsp;&nbsp;&nbsp;&nbsp;El Día Mundial Contra el Cáncer es una iniciativa realizada desde el año 2000, por la Unión Internacional Contra el Cáncer (UICC), organización que reúne a las sociedades más importantes del mundo con el objetivo de unir esfuerzos para reducir el número de muertes, aumentando la concientización sobre el cáncer en la población general y presionando a los gobiernos para que emprendan más medidas contra esta enfermedad. Esta fecha ofrece una oportunidad de demostrar estrategias de control en cada país y de identificar las mejores formas de difundir y acelerar la promoción y la educación, a fin de fomentar hábitos sanos y un estilo de vida saludable para garantizar que el cáncer afecte a menos personas.
									</p>
									<p>
									&nbsp;&nbsp;&nbsp;&nbsp;Este 2019, la Gran Cruzada de Prevención por el Día Mundial Contra el Cáncer (04 de febrero) será representada por la Liga Contra el Cáncer y llevará el nombre de <b>“YO SOY Y VOY A”</b>, con la cual se busca generar conciencia de cómo la población, de forma conjunta o individual, pueden realizar acciones de prevención para evitar más muertes a causa de esta enfermedad que es considerada la segunda causa de muerte en el mundo, responsable de 18.1 millones de nuevos casos y 9.6 millones de muertes a causa de esta enfermedad.
									</p>

									<p>
									&nbsp;&nbsp;&nbsp;&nbsp;Con la campaña <b>“YO SOY Y VOY A”</b>, se busca alcanzar el objetivo global de reducir un 25 % de las muertes prematuras por cáncer y enfermedades no transmisibles si se actúa a tiempo. Se podrían salvar hasta 3,7 millones de vidas cada año poniendo en práctica estrategias adecuadas de recursos para la prevención, detección temprana y tratamiento.
									</p>

									<p>
									&nbsp;&nbsp;&nbsp;&nbsp;Asimismo, la campaña por el Día Mundial Contra el Cáncer, invoca a los Gobiernos y a las organizaciones a tomar las medidas preventivas contra esta enfermedad e informar cómo el cáncer nos afecta a todos, bajo los siguientes conceptos:
									</p>



									</p>
								</div>

								<div class=" col-md-offset-4 col-md-6 animate-box text-justify">
									<ul class="">
										<li>
											Conciencia, entendimiento, mitos e información errónea
										</li>
										<li>
											Prevención y reducción de riesgos
										</li>
										<li>
											Acción y responsabilidad de los gobiernos
										</li>
										<li>
											Igualdad en el acceso a servicios oncológicos
										</li>
										<li>
											Impacto económico y financiero
										</li>
										<li>
											Reducción de la brecha de formación
										</li>
										<li>
											Impacto mental y emocional
										</li>
										<li>
											Trabajar juntos como una unidad
										</li>
									</ul>
								</div>
								<div class="col-md-3"></div>

							</div>

				<br><br><br>
				<div class="row">
					<div class="col-md-12 colorlib-heading center-heading text-center animate-box">
						<h1 class="heading-big">SITUACIÓN ACTUAL </h1>
						<h2>Análisis de la situación actual del cáncer en el Perú 2019<br> <small>Elaborado por la Liga Contra el Cáncer.</small></h2>
					</div>
				</div>
				<div class="row">
					<div class="container">
						<div class="col-xs-offset-3 col-md-offset-5 animate-box" style="">

							<a href="{{ url('liga/pdf/LCC_Informe_AnálisisdelaSituacióndelCáncerEnElPeru2019_DMCC.pdf') }}" download="LCCInformeAnálisisdelaSituacióndelCáncerEnElPeru2019_DMCC.pdf" target="_blanck"><img src="{{ url('liga/images/PDF-ico.png') }}" width="100px" height="170px" class="img-responsive ">
							</a>

						</div>
					</div>
				</div>


			</div>
		</div><br><br><br>

@endsection
@section('scritps')
{{ Html::script('liga/js/main_principal.js') }}



@endsection