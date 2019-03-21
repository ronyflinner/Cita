<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Liga Contra el Cáncer</title>
	<link rel="shortcut icon" type="images/x-icon" href="{{ url('favicon.ico') }}" />

	@include('frontend.layout.meta')
	@include('frontend.layout.css')

	</head>

	<!-- LigaContraElcancer-->
	<link rel="stylesheet" href="https://www.donaliga.org.pe/donacion/css/ligabanner.css">
	<script src="https://www.donaliga.org.pe/donacion/js/ligabanner.js"></script>
	<!-- END LigaContraElcancer-->

	<div class="colorlib-loader"></div>

	<div id="page">
		@include('frontend.layout.menu')

 	@yield('content')

		<footer id="colorlib-footer">
			<div class="copy">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<p>
							<small class="block"> Central telefónica *5442 | Av. Brasil 2746, Pueblo Libre | Av. Nicolás de Piérola 727, Lima | Av. Angamos Este 2514, Surquillo <br> 2018 Liga Contra el Cáncer</small><br>
							</p>
						<div class="col-md-12">

						</div>
						<div class="col-md-12 col-lg-4 col-md-offset-4">
                            <a href="https://www.youtube.com/channel/UCSm6XdI7acLsUq_KXTt0Bhg/videos"><i class="fa fa-youtube" aria-haspopup="true"></i></a>
                            <a href="https://www.facebook.com/LigaCancer"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="https://www.instagram.com/ligacancer/"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="https://twitter.com/LigaCancerPeru"><i class="fa fa-twitter" aria-haspopup="true"></i></a>
                        </div>
						</div>
					</div>
				</div>
			</div>
		</footer>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>


	@include('frontend.layout.scripts')

	@yield('scritps')

	</body>
</html>



