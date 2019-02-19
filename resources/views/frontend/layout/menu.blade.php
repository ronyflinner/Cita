<nav class="colorlib-nav" role="navigation">
			<div class="upper-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-4 col-lg-4">
		                <a href="https://www.youtube.com/channel/UCSm6XdI7acLsUq_KXTt0Bhg/videos"><i class="fa fa-youtube" aria-haspopup="true"></i></a>
		                <a href="https://www.facebook.com/LigaCancer"><i class="fa fa-facebook" aria-hidden="true"></i></a>
		                <a href="https://www.instagram.com/ligacancer/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
		                <a href="https://twitter.com/LigaCancerPeru"><i class="fa fa-twitter" aria-haspopup="true"></i></a>
                        </div>
					</div>
				</div>
			</div>
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-md-2">
							<div><a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('liga/images/logo.png') }}" alt=""></a></div>
						</div>
						<div class="col-md-10 text-right menu-1">
								<ul>
							   <li class="has-dropdown">
									<a href="">Nosotros</a>
									<ul class="dropdown">
										<li><a href="{{ route('quienesSomos') }}">¿Quiénes somos?</a></li>
										<li><a href="{{ route('queHacemos') }}">¿Qué hacemos?</a></li>
										<li><a href="{{ route('centroDeteccion') }}">Centros de detección</a></li>
										<li><a href="{{ route('staffMedico') }}">Staff Médico</a></li>
									</ul>
								</li>
								<li class="has-dropdown">
									<a href="">Servicios</a>
									<ul class="dropdown">
										<li><a href="{{ route('especialidades') }}">Especialidades</a></li>
										<li><a href="{{ route('servicio') }}">Servicios</a></li>
										<li><a href="#">Paquetes preventivos</a></li>
										<li><a href="#">Campañas corporativas</a></li>
										<li><a href="#">Preguntas frecuentes</a></li>
									</ul>
								</li>
								<li class="has-dropdown">
									<a href="colecta.html">Colecta Pública</a>
									<ul class="dropdown">
									    <li><a href="{{route('donaciones')}}">Formas de donación</a></li>
									    <li><a href="{{ route('campanaPublicitaria') }}">Campaña publicitaria</a></li>
										<li><a href="{{ route('resultadoColecta') }}">Resultados de Colecta Pública</a></li>
									</ul>
								</li>
								<li class="has-dropdown">
									<a href="#">Campañas</a>
									<ul class="dropdown">
										<li><a href="{{ route('pancreas') }}">Prevención del Cáncer de Páncreas</a></li>
										<li><a href="{{ route('piel') }}">Prevención del Cáncer de Piel</a></li>
										<li><a href="{{ route('cuello') }}">Prevención de Cáncer del Cuello Uterino</a></li>
										<li><a href="{{ route('mama') }}">Prevención del Cáncer de Mama</a></li>
										<li><a href="{{ route('bolas') }}">Prevención del Cáncer de Cáncer en Varones</a></li>
										<li><a href="{{ route('diaContraElCancer') }}">Día Mundial Contra el Cáncer</a></li>
									</ul>
								</li>
								<li class="has-dropdown">
									<a href="#">Aliados</a>
									<ul class="dropdown">
										<li><a href="{{ route('benefactor') }}">Benefactores de la Liga</a></li>
										<li><a href="{{ route('marcas') }}">Marcas colaboradores de la Liga</a></li>
									</ul>
								</li>

								<li><a href="#">Noticias</a></li>
								<li><a href="#">Blog</a></li>
								<li class="btn-cta"><a href="#"><span>Contacto</span></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>