@extends('frontend.layout.principal')
@section('content')



		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url({{ url('liga/images/Sliders-web/4.jpg') }});">
			   		</li>
			   	</ul>
		  	</div>
		  	</aside>

            <div id="colorlib-services animate-box">
			<div class="container" >
				<div class="row">
					<div class="col-md-12 services-wrap animate-box" align="center">
						<div class="row">
							<h3 class="text-center text-sm-right">
								CENTRO DE DETECCI&Oacute;N
							</h3>
							<p>Contamos con 3 modernos centros de detecci&oacute;n de c&aacute;ncer que cuentan con lo &uacute;ltimo en tecnolog&iacute;a y un staff m&eacute;dico altamente calificado <br> para la prevenci&oacute;n del c&aacute;ncer</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<style type="text/css">

		.text-gris{
		  vertical-align:middle;
		  text-transform: uppercase;
		  color: grey !important;

		}
	</style>
     <div class="colorlib-classes">
			<div class="container">
				<div class="row">
					<div class="col-md-12 colorlib-heading center-heading text-center animate-box">
						<h1 class="heading-big">LIMA</h1>
						<h2 style="color: #FF0C39">LIMA</h2>
						<p>3 MODERNOS CENTRO DE PREVENCI&Oacute;N</p>
					</div>
				</div>
				<div class="row ">
					<div class="container">
							<div class="col-sm-6 col-md-4 w3-animate-left">
						    <div class="thumbnail">
						      <img src="{{ url('liga/images/sedes/2.jpg') }}" alt="...">
						      <div class="caption text-center" style="padding: 10px 10px">

						        <p class="text-center">Av. Brasil 2746,
										<br><span>PUEBLO LIBRE</span></p>
						        <p><a href="https://www.google.com.pe/maps/place/Av+Brasil+2746,+Pueblo+Libre+15084/@-12.0854211,-77.0616894,18.57z/data=!4m5!3m4!1s0x9105c900d2802cd9:0xf7fab29c0086f2ab!8m2!3d-12.0849336!4d-77.0620367?hl=es-419" class="btn btn-primary r" role="button" target="_blank">Ver Ubicación</a> </p>
						      </div>
						    </div>
						  </div>
						  	<div class="col-sm-6 col-md-4 w3-animate-top">
						    <div class="thumbnail">
						     <img src="{{ url('liga/images/sedes/3.jpg') }}" alt="...">
						      <div class="caption text-center">

						        <p class="text-center">Av. Nicolás de Piérola 727,
									<br><span>CENTRO DE LIMA</span></p>
						        <p><a href="https://www.google.com.pe/maps/place/Av.+Nicol%C3%A1s+de+Pi%C3%A9rola+727,+Cercado+de+Lima+15001/@-12.0501724,-77.0374874,18.32z/data=!4m5!3m4!1s0x9105c8c8fa63b581:0x7a438c52d95b1d5!8m2!3d-12.050061!4d-77.0368244?hl=es-419" class="btn btn-primary" role="button" target="_blank">Ver Ubicación</a> </p>

						      </div>
						    </div>
						  </div>
						  	<div class="col-sm-6 col-md-4 w3-animate-right">
						    <div class="thumbnail">
						      <img src="{{ url('liga/images/sedes/1.jpg') }}" alt="...">
						      <div class="caption text-center">

						        <p class="text-center">Av. Angamos 2514,<br> <pan class="text-gris">SURQUILLO</pan>
								</p>

						        <p><a href="https://www.google.com.pe/maps/place/Av.+Angamos+Este+2514,+Lima+15038/@-12.1116087,-77.0032284,17.47z/data=!4m5!3m4!1s0x9105c7e6803da7c7:0xe39437e31d48844a!8m2!3d-12.1114536!4d-77.0018545?hl=es-419" class="btn btn-primary" role="button" target="_blank">Ver Ubicación</a> </p>
						      </div>
						    </div>
						  </div>

					</div>
				</div>
			</div>
		</div>


		   <div id="colorlib-services" >
			<div class="container" >
				<div class="row">
					<div class="col-md-12 services-wrap animate-box" align="center">
						<div class="row">
							<h3 class="text-center text-sm-right">
								CINCO UNIDADES M&Oacute;VILES
							</h3>
							<p>Consultorios itinerantes que realizan campañas informativas
							Y chequeos gratuitos</p>
						</div>
					</div>
					<div class="row">
						<div class=" col-md-offset-2 col-lg-offset-2  col-xs-12 col-sm-12  col-md-8 col-lg-8 animate-box" data-animate-effect="fadeIn">

					<div id="owl-carousel-2" class=" owl-theme">

						<div class="item"><img src="{{ url('liga/images/unidadesmoviles/1.jpg') }}" class="imagen img-responsive" alt="Seventh slide" >
						</div>

						<div class="item"><img src="{{ url('liga/images/unidadesmoviles/2.jpg') }}"  class="imagen img-responsive" alt="third Slide" >
						</div>

						<div class="item"><img src="{{ url('liga/images/unidadesmoviles/3.jpg') }}"  class="imagen img-responsive" alt="fourth Slide" >
						</div>

						<div class="item"><img src="{{ url('liga/images/unidadesmoviles/4.jpg') }}" class="imagen img-responsive" alt="fifth Slide" >
						</div>

						 <div class="item">
							<img src="{{ url('liga/images/unidadesmoviles/5.jpg') }}"  class="imagen img-responsive" alt="sixth Slide" >
						</div>

						 <div class="item">
							<img src="{{ url('liga/images/unidadesmoviles/6.jpg') }}"  class="imagen img-responsive" alt="sixth Slide" >
						</div>

						<div class="item">
							<img src="{{ url('liga/images/unidadesmoviles/7.jpg') }}"  class="imagen img-responsive" alt="sixth Slide" >
						</div>
						  <div class="item">
							<img src="{{ url('liga/images/unidadesmoviles/8.jpg') }}"  class="imagen img-responsive" alt="sixth Slide" >
						</div>
						</div>
				</div>
					</div>


				</div>
			</div>
		</div>



		<style type="text/css">


		</style>

		<div class="colorlib-event">
			<div class="container">
				<div class="row">
				<div class="col-md-12 colorlib-heading center-heading text-center animate-box">
						<h1 class="heading-big">A NIVEL NACIONAL</h1>
						<h2 style="color: #FF0C39">A NIVEL NACIONAL</h2>
					</div>
				<div class=" animate-box">

					  <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 animate-box">
			            <div class="box">
			                <div class="box-icon">
			                    <span class="fa fa-2x fa-map-pin"></span>
			                </div>
			                <div class="info">
			                    <h4 class="text-center">Arequipa</h4>
			                    <p>Presidente: Wilmer Cesar Sierra Cahuata
									 <br>Dirección: Urb. Álvarez Thomas E – 10, Cercado
									 <br>Teléfono: 054 – 214091 / 054 - 404259
									 <br>www.ligacontraelcanceraqp.com
									 <br>ligcanceraqp@ligcancer.org.pe </p>

			                </div>
			            </div>
			        </div>

			          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 animate-box">
			            <div class="box">
			                <div class="box-icon">
			                    <span class="fa fa-2x fa-map-pin"></span>
			                </div>
			                <div class="info">
			                    <h4 class="text-center">Cajamarca</h4>
			                    <p>Presidente: Sonia Díaz Estacio
									 <br>Dirección: Jr. Daniel Alcides Carrión <br>N° 220
									 <br>RPM: 832583 / Tlf: 076 - 366605
									 <br>ligacancercajamarca@yahoo.es </p>

			                </div>
			            </div>
			        </div>
			          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 animate-box">
			            <div class="box">
			                <div class="box-icon">
			                    <span class="fa fa-2x fa-map-pin"></span>
			                </div>
			                <div class="info">
			                    <h4 class="text-center">Cusco</h4>
			                    <p>Presidente: Rosario Calderón Díaz
									 <br>Dirección: Cruz verde 315 int. A, 4to piso
									 <br>Telefax: 084–245886 <br>Móvil: 984-652031
									 <br>ligacancercusco@hotmail.com</p>

			                </div>
			            </div>
			        </div>

			          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 animate-box">
			            <div class="box">
			                <div class="box-icon">
			                    <span class="fa fa-2x fa-map-pin"></span>
			                </div>
			                <div class="info">
			                    <h4 class="text-center">Chep&eacute;n</h4>
			                    <p>Presidente: Gladys Violeta Ugas Vera
									 <br>Dirección: Jr. Junín 465 Chepén
									 <br>Telefax: 044-573057
									 <br>gladysugasperu@hotmail.com </p>

			                </div>
			            </div>
			        </div>

			        	  <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 animate-box">
			            <div class="box">
			                <div class="box-icon">
			                    <span class="fa fa-2x fa-map-pin"></span>
			                </div>
			                <div class="info">
			                    <h4 class="text-center">Chiclayo</h4>
			                    <p>Presidente: Manuel del Castillo Johnson
									 <br>Dirección: Av. Balta 970, Chiclayo
									 <br>Telefax: 074-231391
									 <br>ligacancerchiclayo@hotmail.com </p>

			                </div>
			            </div>
			        </div>

			          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 animate-box">
			            <div class="box">
			                <div class="box-icon">
			                    <span class="fa fa-2x fa-map-pin"></span>
			                </div>
			                <div class="info">
			                    <h4 class="text-center">Chincha</h4>
			                    <p>Presidente: Mercedes Soto de Olivares
									 <br>Dirección: Av. Fátima, Pasaje de las Madres s/n
									 <br>2do Piso
									 <br>Teléfono: 056 - 273216
									 <br>ligacancerchincha@ligacancer.org.pe</p>

			                </div>
			            </div>
			        </div>
			          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 animate-box">
			            <div class="box">
			                <div class="box-icon">
			                    <span class="fa fa-2x fa-map-pin"></span>
			                </div>
			                <div class="info">
			                    <h4 class="text-center">Guadalupe</h4>
			                    <p>Presidente: Rodolfo Pico Torres
									 <br>Dirección: Centro Cívico, Piso 2, Plaza de Armas s/n,
									 <br>Guadalupe, La Libertad
									 <br>Telefax: 044 - 567264
									 <br>ligacancerguadalupe@yahoo.es </p>

			                </div>
			            </div>
			        </div>

			          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 animate-box">
			            <div class="box">
			                <div class="box-icon">
			                    <span class="fa fa-2x fa-map-pin"></span>
			                </div>
			                <div class="info">
			                    <h4 class="text-center">Hu&aacute;nuco</h4>
			                    <p>Presidente: Lucy del Pino López
									 <br>Dirección: Jr. Crespo Castillo 660, Huánuco
									 <br>Telefax: 062 – 514402
									 <br>lucydelpino@hotmail.com </p>

			                </div>
			            </div>
			        </div>
			        	  <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 animate-box">
			            <div class="box">
			                <div class="box-icon">
			                    <span class="fa fa-2x fa-map-pin"></span>
			                </div>
			                <div class="info">
			                    <h4 class="text-center">Huaraz</h4>
			                    <p>Presidente: Roger César Ramírez Rojas/
								 <br>Alicia Rodríguez
								 <br>Dirección: Jr. Octavio Hinostroza 578, Belén, Huaraz
								 <br>Telefax: 043 – 426630
								 <br>rogramirezro@hotmail.com -
								<br> alrodrios@hotmail.com </p>

			                </div>
			            </div>
			        </div>

			          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 animate-box">
			            <div class="box">
			                <div class="box-icon">
			                    <span class="fa fa-2x fa-map-pin"></span>
			                </div>
			                <div class="info">
			                    <h4 class="text-center">Ilo</h4>
			                    <p>Presidente: Elizabeth Díaz de Valdivia
									 <br>Dirección: Jr. Pichincha 534-536, Ilo
									 <br>Teléfono: 053-481359 <br>Móvil: 984-652031
									 <br>ligacancerilo@ligacancer.org.pe </p>

			                </div>
			            </div>
			        </div>
			          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 animate-box">
			            <div class="box">
			                <div class="box-icon">
			                    <span class="fa fa-2x fa-map-pin"></span>
			                </div>
			                <div class="info">
			                    <h4 class="text-center">Madre de Dios</h4>
			                    <p>Presidente: Carmen Cabrera de Woolcott
									 <br>Dirección: Jr. Loreto s/n Cuadra 2, Plaza de Armas,
									 <br>Puerto Maldonado
									 <br>Teléfono: 051-364822
									 <br>ligacancermdedios@ligacancer.org.pe</p>

			                </div>
			            </div>
			        </div>

			          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 animate-box">
			            <div class="box">
			                <div class="box-icon">
			                    <span class="fa fa-2x fa-map-pin"></span>
			                </div>
			                <div class="info">
			                    <h4 class="text-center">Moquegua</h4>
			                    <p>Presidente: Irma Ramírez Ramos
									 <br>Dirección: Jr. Ayacucho 669, 4to Piso
									 <br>Teléfono: 953-977-541 <br> Móvil: 984-652031
									 <br>ligacancermoquegua@ligacancer.org.pe </p>

			                </div>
			            </div>
			        </div>

			          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 animate-box">
			            <div class="box">
			                <div class="box-icon">
			                    <span class="fa fa-2x fa-map-pin"></span>
			                </div>
			                <div class="info">
			                    <h4 class="text-center">Piura</h4>
                                <p>Presidente: Jorge Mas Sánchez
							      <br>Dirección: Av. Ramón Castilla 355, Castilla
							      <br> Teléfono: 073-33748
							      <br>ligacancerpiura@ligacancer.org.pe
							      <br>	Lianebc23@hotmail.com </p>

			                </div>
			            </div>
			        </div>

			          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 animate-box">
			            <div class="box">
			                <div class="box-icon">
			                    <span class="fa fa-2x fa-map-pin"></span>
			                </div>
			                <div class="info">
			                    <h4 class="text-center">Puno</h4>
			                    <p>Presidente: Jorge Mas Sánchez
								 <br>Dirección: Av. Ramón Castilla 355, Castilla
								 <br>Teléfono: 073-33748
								 <br>ligacancerpiura@ligacancer.org.pe
								 <br>Lianebc23@hotmail.com </p>

			                </div>
			            </div>
			        </div>

			          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 animate-box">
			            <div class="box">
			                <div class="box-icon">
			                    <span class="fa fa-2x fa-map-pin"></span>
			                </div>
			                <div class="info">
			                    <h4 class="text-center">Tacna</h4>
			                    <p>Presidente: Margarita Alcázar de Vargas
									 <br>Dirección: Calle España 800, Plaza Leoncio Prado
									 <br>Telefax: 052-413052
									 <br>ligacancertacna@ligacancer.org.pe </p>

			                </div>
			            </div>
			        </div>

			          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 animate-box">
			            <div class="box">
			                <div class="box-icon">
			                    <span class="fa fa-2x fa-map-pin"></span>
			                </div>
			                <div class="info">
			                    <h4 class="text-center">Tingo Mar&iacute;a</h4>
			                    <p>Presidente: Ana María Isusqui Guerra
								 <br>Dirección: Av. Enrique Pimentel cuadra 1, 2do Piso
								 <br>Teléfono: 062-562572
								 <br>ligacancertingo@ligacancer.org.pe </p>

			                </div>
			            </div>
			        </div>

			          <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3 text-center col-md-offset-5 animate-box">
			            <div class="box">
			                <div class="box-icon">
			                    <span class="fa fa-2x fa-map-pin"></span>
			                </div>
			                <div class="info">
			                    <h4 class="text-center">Trujillo</h4>
			                    <p>Presidente: Dr. Luis Miguel González Rosell
									 <br>Dirección: Justiniano Borgoño 332, Trujillo
									 <br>Teléfono: 044-241224
									 <br>Móvil: 949960681 / RPM: #070744
									 <br>presidencia@ligacancertrujillo.org.pe </p>

			                </div>
			            </div>
			        </div>

				</div>
				</div>
			</div>
		</div>
		</div>


@endsection
@section('scritps')
 {{ Html::script('liga/js/main_principal.js') }}

@endsection