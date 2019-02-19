@extends('frontend.layout.principal')
@section('content')


	<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   		<li style="background-image: url({{ url('liga/images/Sliders-web/2.jpg') }});">
			   		</li>
			   	</ul>
		  	</div>
		  	</aside>

    <div id="colorlib-counter" class="colorlib-counters">
			<div class="container">
				<div class="row">
					<div class="col-md-7 animate-box">
						<div class="about-desc">
							<div class="about-img-1" style="background-image: url({{ url('liga/images/quienesomos/1.jpg') }});"></div>
							<div class="about-img-2" style="background-image: url({{ url('liga/images/quienesomos/2.jpg') }});"></div>
						</div>
					</div>
					<div class="col-md-5 animate-box">
						<div class="row">
							<div class="col-md-12 colorlib-heading">
								<h2>¿Quiénes somos?</h2>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<p><strong>La Liga Contra el Cáncer</strong></p>
								<p>Somos la primera institución en el Perú en realizar acciones de prevención y detección de cáncer. Desde nuestra fundación en el año 1950, hemos contribuido a disminuir la alta incidencia de la enfermedad en nuestro país a través de acciones de prevención como campañas informativas, educativas y despistajes que permiten lograr una cultura preventiva y hábitos de vida saludable.</p>
                                <p><strong>Misión</strong></p>
								<p>Luchar contra el cáncer en todas las modalidades conocidas o que el futuro se conozcan, a través de la detección temprana, la investigación y la educación para mejorar la calidad de vida de la población de bajos recursos.</p>
								 <p><strong>Visión</strong></p>
								<p>Disminuir la incidencia de cáncer como un problema de salud pública, previniéndolo, detectándolo tempranamente y disminuyendo el sufrimiento que causa. </p>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
<div class="colorlib-classes">
			<div class="container">
				<div class="row">
					<div class="col-md-12 colorlib-heading center-heading text-center animate-box">
						<h2 style="color: #FF0C39">RECONOCIMIENTOS</h2>
					</div>
				</div>
			  <div class="col-md-12 animate-box">
                 <div class="col-md-4" align="center">
                 <a href="{{ url('liga/images/reconocimientos/CarlosSlim/1.jpg') }}" data-toggle="lightbox" data-gallery="example-gallery">
                 <img src="{{ url('liga/images/reconocimientos/CarlosSlim/1.jpg') }}" width="300px" height="300px"  class="img-fluid"></a>
                 <div class="classes-entry">
                 <div class="desc">
					 <h3>Carlos Slim</h3>
			    </div>
                </div>
                 </div>
                 <div class="col-md-4"  align="center">
                 <a href="{{ url('liga/images/reconocimientos/Ordendelsol/1.jpg') }}" data-toggle="lightbox" data-gallery="example-gallery">
                 <img src="{{ url('liga/images/reconocimientos/Ordendelsol/1.jpg') }}" width="300px" height="300px"  class="img-fluid text-center"></a>
                 <div class="classes-entry">
                 <div class="desc"><h3>Orden del Sol de Perú</h3></div>
                </div>
                </div>
                 <div class="col-md-4"  align="center">
                <a href="{{ url('liga/images/reconocimientos/Medalladelima/1.jpg') }}" data-toggle="lightbox" data-gallery="example-gallery">
                <img src="{{ url('liga/images/reconocimientos/Medalladelima/1.jpg') }}"  width="300px" height="300px" class="img-fluid"></a>
				<div class="classes-entry">
                <div class="desc"><h3>Medalla de Lima</h3></div>
                </div>
                </div>
				<div class="col-md-12 "></div>
                 <div class="col-md-4" align="center">
                 <a href="{{ url('liga/images/reconocimientos/Clarence/1.jpg') }}" data-toggle="lightbox" data-gallery="example-gallery">
                 <img src="{{ url('liga/images/reconocimientos/Clarence/1.jpg') }}" width="300px" height="300px"  class="img-fluid"></a>
                 <div class="classes-entry">
                 <div class="desc">
					 <h3>Premio Clarence H. Moore</h3>
			    </div>
                </div>
                 </div>
                 <div class="col-md-4 " align="center">
                 <a href="{{ url('liga/images/reconocimientos/PlanEsperanza/1.jpg') }}" data-toggle="lightbox" data-gallery="example-gallery">
                 <img src="{{ url('liga/images/reconocimientos/PlanEsperanza/1.jpg') }}"  width="300px" height="300px"  class="img-fluid"></a>
                 <div class="classes-entry">
                 <div class="desc">
				<h3>Reconocimiento Plan Esperanza</h3>
			    </div>
                </div>
                 </div>
           </div>

			</div>
</div>


<div class="colorlib-socios">
	<div class="container">
	<div class="row">
		<div class="col-md-12 colorlib-heading center-heading text-center animate-box">
			<h2 style="color: #FFFFFF">SOCIOS</h2>
		</div>
	</div>
	<div class="row">
					<div class="col-md-8 col-md-offset-2 text-center">
						<div class="row animate-box">
							<div class="owl_socio">
								<div class="item">
									<div class="socios-slide">
										<div class="socios-wrap">
											<div class="socios-circle">
											<img src="{{ url('liga/images/socios/1.png') }}" alt="" width="10px">
											</div>
											<div class="text-center owl_socio-text">
												<p style="color: #FFFFFF">UICC – Unión Internacional Contra el Cáncer</p>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="socios-slide">
										<div class="socios-wrap">
											<div class="socios-circle">
											<img src="{{ url('liga/images/socios/2.png') }}" alt="" width="10px">
											</div>
											<div class="text-center owl_socio-text">
												<p style="color: #FFFFFF">Asociación de Ligas Iberoamericanas Contra el Cáncer</p>
											</div>
										</div>
									</div>
								</div>
								<div class="item">
									<div class="socios-slide">
										<div class="socios-wrap">
											<div class="socios-circle">
											<img src="{{ url('liga/images/socios/3.png') }}" alt="" width="10px">
											</div>
											<div class="text-center owl_socio-text">
												<p style="color: #FFFFFF">Sociedad Americana del Cáncer</p>
											</div>
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>

</div>
</div>

<div class="colorlib">
	<div class="container">
		<div class="col-md-12"> </div>
		<div class="row">
			<div class="col-md-12 colorlib-heading center-heading text-center animate-box">
				<h2>DIRECTORIO</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-8 col-md-offset-2 text-center">
				<div class="row animate-box">
                    <h4>PRESIDENTE</h4>
					<p>Adolfo Dammert Ludowieg</p>
					<h4>VICEPRESIDENTE</h4>
					<p>Roberto Muttini Bertolero</p>
					<h4>TESORERO</h4>
					<p>Manuel José Ayulo Polo</p>
					<h4>SECRETARIO</h4>
					<p>Fernando de la Flor Belaunde</p>
					<h4>VOCAL</h4>
					<p>Inés Temple Arciniega<br>
					Marino Costa Bauer<br>
					Caridad de la Puente Wiese<br>
					Alba San Martín Piaggio<br>
					Jaime Cáceres Sayán<br>
					Daniella Raffo Porcari<br>
					Gonzalo De Losada Leon<br>
					Elias Petrus Erasmo Fernandini Bohlin</p>
					<h4>DIRECTOR MÉDICO</h4>
					<p>Raúl Velarde Galdós</p>
	           </div>
             </div>
             <div class="col-md-12"></div>
	     </div>
	 </div>
	</div>
</div>


@endsection

@section('scritps')	<!-- Main -->
    {{ Html::script('liga/js/main_principal.js') }}
<script>
	$(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
</script>
@endsection