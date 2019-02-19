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
			   	<li style="background-image: url({{ url('liga/images/Sliders-web/5.jpg') }});">
			   		</li>
			   	</ul>
		  	</div>
		  	</aside>

            <div id="colorlib-services" >
			<div class="container" >
				<div class="row">
					<div class="col-md-12 services-wrap " align="center">
						<div class="row animate-box">
							<h3 class="text-center text-sm-right ">
								STAFF M&Eacute;DICO
							</h3>

						</div>
                          <div class="col-md-12"></div>
                           <div class="row">
							<div class="container">
								<div class="col-md-4 animate-box">
									<div class="panel panel-default">
								      <div class="panel-body"  style="margin-top: -10px; height:  700px;
									  background-repeat: repeat-x;
								      background-image: url({{ url('liga/images/staff/1.jpg') }});">

								         <h3 class="panel-title" >PREVENCIÓN DE CÁNCER <br>DE MAMA</h3><br>
								         	<address class="text-left">
								         	    <br> <br> <br> <br> <br> <br><br>
								         	    <p align="center" style="color: #FFFFFF"> Dr. Raúl Velarde Galdón <br>
												Mastólogo / Director de la LCC </p>
														<!--<p align="center" style="color: #FFFFFF">Dr. Mario Cosser Herrera <br>
															Mastólogo	</p>-->
														<p align="center" style="color: #FFFFFF">Dr. Marco Mauricio Velarde Méndez <br>
															Mastólogo / Piel y Tejidos Blandos </p>
														<p align="center" style="color: #FFFFFF">Dr. Pino Gabriel Lino <br>
															Mastólogo	</p>
											<p align="center" style="color: #FFFFFF">Dr. Marcia Carrasco Collantes <br>
												Mastólogo / Piel y Tejidos Blandos </p>
											</address>
                                         </div>
								    </div>
								</div>
								<div class="col-md-4 animate-box">
									<div class="panel panel-default">
								    <div class="panel-body" style="margin-top: -10px; height: 700px;
									  background-repeat: repeat-x;
								      background-image: url({{ url('liga/images/staff/2.jpg') }});">
								      	      <h3 class="panel-title ">PREVENCIÓN DE CÁNCER DE <br>CUELLO UTERINO</h3><br>
								          <address class="text-left">
								          <br>
											<p align="center" style="color: #FFFFFF">Dr. Gilmar Fernando Grisson Barro <br>
												Gineco Oncólogo</p>
												<p align="center" style="color: #FFFFFF; font-size: 14px;" >Dr. Henry Valdivia Franco <br>
												Gineco Oncólogo</p>
												<p align="center" style="color: #FFFFFF ; font-size: 14px;">Dra. Nancy Elena Muñoz Quispe <br>
												Gineco Oncólogo</p>
												<p align="center" style="color: #FFFFFF ; font-size: 14px;">Dr. Carlos Albino Lama Calle <br>
												Gineco Oncólogo</p>
												<p align="center" style="color: #FFFFFF ; font-size: 14px;">Dr. Aldo López Blanco <br>
												Gineco Oncólogo</p>
												<p align="center" style="color: #FFFFFF ; font-size: 14px;">
												Dr. Pedro Aguilar Ramos <br>
												Gineco Oncólogo</p>
												<p align="center" style="color: #FFFFFF ; font-size: 14px;">
												Dra. Mirtha Magaly Malca tocas <br>
												Gineco Oncólogo</p>
												<p align="center" style="color: #FFFFFF ; font-size: 14px;">
												Dr. Jhony Ever Carrera Araujo <br>
												Ginecólogo</p>
												<p align="center" style="color: #FFFFFF ; font-size: 14px;">Dra. Mónica Connie Huerta Valdivia <br>
												Ginecólogo</p>
                                                <p align="center" style="color: #FFFFFF ; font-size: 14px;">Dr. Ricardo Enrique Mier Cruz<br>
												Ginecólogo</p>
										</address>
                                        </div>
								    </div>
								</div>
								<div class="col-md-4 animate-box">
									<div class="panel panel-default">
								      <div class="panel-body" style="margin-top: -10px; height: 700px;
									  background-repeat: repeat-x;
								      background-image: url({{ url('liga/images/staff/3.jpg') }});">
								      	   <h3 class="panel-title ">PREVENCIÓN DE CÁNCER <br>DE ESTÓMAGO</h3><br>
								      <br> <br> <br> <br> <br>
										 <p align="center" style="color: #FFFFFF ; font-size: 14px;"> Dr. Landeo ítalo <br>
											Gastroenterólogo</p>
											<p align="center" style="color: #FFFFFF ; font-size: 14px;">Dr. Paredes Méndez Juan <br>
											Gastroenterólogo</p>
											<p align="center" style="color: #FFFFFF ; font-size: 14px;">Dr. Luis Alberto Lazo Molina<br>
											Gastroenterólogo</p>
											<p align="center" style="color: #FFFFFF ; font-size: 14px;">Dr. Juan Felipe Ramírez García<br>
											Gastroenterólogo</p>
											<p align="center" style="color: #FFFFFF ; font-size: 14px;">Dr. Jorge Fernández Luque<br>
											Gastroenterólogo</p>
											<p align="center" style="color: #FFFFFF; font-size: 14px;">Dr. Néstor Juárez Herrera<br>
											Abdomen</p>
											<p align="center" style="color: #FFFFFF; font-size: 14px;">Dr. Carlos Pérez Ramos<br>
											Abdomen</p>
								      </div>
								    </div>
								</div>
                                   <div class="col-md-4">
									<div class="panel panel-default">
								    <div class="panel-body"  style="margin-top: -10px; height:  700px;
									  background-repeat: repeat-x;
								      background-image: url({{ url('liga/images/staff/4.jpg') }});">
								        <h3 class="panel-title ">PREVENCIÓN DE CÁNCER
										DE CABEZA, CUELLO Y PIEL</h3><br>
							         	       <br> <br> <br> <br> <br><br> <br> <br>
								         	 <p align="center" style="color: #FFFFFF ; font-size: 14px;">Dr. Christian Daniel Loayza Fernández Baca <br>
                                         Cirugía Oncológica Cabeza, cuello y piellogo / Piel y Tejidos Blandos</p>
                                      </div>
								    </div>
								</div>
								<div class="col-md-4 animate-box">
									<div class="panel panel-default">
								      <div class="panel-body" style="margin-top: -10px; height:  700px;
									  background-repeat: repeat-x;
								      background-image: url({{ url('liga/images/staff/5.jpg') }});">
								      	  <h3 class="panel-title ">PREVENCIÓN DE CÁNCER
									EN VARONES (PRÓSTATA, PENE Y PIEL)</h3><br>
							        <br> <br><br> <br> <br>
								    <p align="center" style="color: #FFFFFF ; font-size: 14px;"> Dr. José Medina Holguin <br>
								    Urólogo</p>
									<p align="center" style="color: #FFFFFF ; font-size: 14px;">Dra. Rocío Zavala Zavala <br>
									Urólogo</p>
									<p align="center" style="color: #FFFFFF ; font-size: 14px;">Dr. Luis Cohaila Ramos <br>
									Urólogo</p>
									<p align="center" style="color: #FFFFFF ; font-size: 14px;">Dr. Javier Renato Marquillo Romero <br>
									Urólogo</p>
                                    </div>
								    </div>
								</div>
								<div class="col-md-4 animate-box">
									<div class="panel panel-default">


								      <div class="panel-body "  style="margin-top: -10px; height:  700px;
									  background-repeat: repeat-x;
								      background-image: url({{ url('liga/images/staff/6.jpg') }});" >

								          <h3 class="panel-title ">OTRAS ESPECIALIDADES
												DE CABEZA, CUELLO Y PIEL</h3><br>
							            <br>
								        <p align="center" style="color: #FFFFFF ; font-size: 14px;">Dra. Gloria Bravo Muro <br>
											Anatomía Patológica</p>
											<p align="center" style="color: #FFFFFF ; font-size: 14px;">Dra. Jackeline Limas Cline <br>
											Radiólogo</p>
											<p align="center" style="color: #FFFFFF ; font-size: 14px;">Dra. Roxana Fernández Castillo<br>
										    Radiólogo</p>
											<p align="center" style="color: #FFFFFF ; font-size: 14px;">Dra. Judith Chávez Pacheco<br>
											Radiólogo</p>
											<p align="center" style="color: #FFFFFF ; font-size: 14px;">Dra. Magaly Medina Aparcana<br>
											Radiólogo</p>
										    <p align="center" style="color: #FFFFFF ; font-size: 14px;">Dr. Cristian Roomel Salcedo Miranda<br>
											Radiólogo</p>
											<p align="center" style="color: #FFFFFF ; font-size: 14px;">Dr. Carlos Torres Mandujano<br>
											Radiólogo</p>
                                            <p align="center" style="color: #FFFFFF ; font-size: 14px;">Dr. Marco Antonio Uriol Fajardo<br>
											Médico de Familia</p>
											<p align="center" style="color: #FFFFFF ; font-size: 14px;">Dr. José Luis Núñez Viera<br>
								            Anestesiólogo</p>

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


@endsection

@section('scritps')	<!-- Main -->
    {{ Html::script('liga/js/main_principal.js') }}

@endsection