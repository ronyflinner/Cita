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
			   	<li style="background-image: url({{ url('liga/images/Sliders-web/7.jpg') }});">

			   		</li>
			   	</ul>
		  	</div>
		  	</aside>
            <div class="col-md-12"></div>
            <div class="colorlib-classes">
			<div class="container">
				<div class="row">
					<div class="col-md-12 colorlib-heading center-heading text-center animate-box">
						<h1 class="heading-big">Especialidades</h1>
						<h2>Especialidades</h2>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/especialidades/1.jpg') }});">
							</div>
							<div class="wrap">
								<div class="desc">
								   <br>
									<h3><a href="#">MEDICINA GENERAL</a></h3>
								</div>

							</div>
						</div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/especialidades/2.jpg') }});">
							</div>
							<div class="wrap">
								<div class="desc">
									<br>
									<h3><a href="#">CABEZA, CUELLO Y PIEL</a></h3>
									</div>

							</div>
						</div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/especialidades/3.jpg') }});">
							</div>
							<div class="wrap">
								<div class="desc">
							<br>
									<h3><a href="#">SENOS Y TUMORES MIXTOS</a></h3>

								</div>

							</div>
						</div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/especialidades/4.jpg') }});">
							</div>
							<div class="wrap">
								<div class="desc">
								    <br>
									<h3><a href="#">GINECOLOGÍA ONCOLÓGICA</a></h3>

								</div>

							</div>
						</div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/especialidades/5.jpg') }});">
							</div>
							<div class="wrap">
								<div class="desc">
									<br>
									<h3><a href="#">UROLOGÍA ONCOLÓGICA</a></h3>

								</div>

							</div>
						</div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/especialidades/6.jpg') }});">
							</div>
							<div class="wrap">
								<div class="desc">
									<br>
									<h3><a href="#">GASTROENTEROLOGÍA ONCOLÓGICA</a></h3>

								</div>

							</div>
						</div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/especialidades/7.jpg') }});">
							</div>
							<div class="wrap">
								<div class="desc">
									<br>
									<h3><a href="#"></a>ABDOMEN</h3>

								</div>

							</div>
						</div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/especialidades/8.jpg') }});">
							</div>
							<div class="wrap">
								<div class="desc">
									<br>
									<h3><a href="#"></a>CIRUGÍA ONCOLÓGICA</h3>
									<br>

								</div>

							</div>
						</div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/especialidades/9.jpg') }});">
							</div>
							<div class="wrap">
								<div class="desc">
									<br>
									<h3><a href="#"></a>RADIOLOGÍA</h3>
									<br>
									</div>
								</div>
						</div>
					</div>
					<div class="col-md-4 animate-box">
						<div class="classes">
							<div class="classes-img" style="background-image: url({{ url('liga/images/especialidades/10.jpg') }});">
							</div>
							<div class="wrap">
								<div class="desc">
									<br>
									<h3><a href="#"></a>PATOLOGÍA</h3>

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