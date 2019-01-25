@extends('layouts.principal')

@section('navT')

        @include('partials.navO')
@endsection
@section('seccion_c')


<div class="container">


	<div class="info">
		<div class="container">
			<div class="row row-eq-height">

				<!-- Info Box -->
				<div class="offset-2 col-lg-4 info_box_col">
					<div class="info_box">
						<div class="info_image"><img src="images/info_1.jpg" alt=""></div>
						<div class="info_content">
							<div class="info_title">Paciente</div>
							<div class="info_text">Haz clic en el botón "Ingresa" y coloca tus datos para generar la cita. </div>
							<div class="button info_button"><a href="{{ route('crearcita.index') }}"><span>Ingresa</span><span>Ingresa</span></a></div>
						</div>
					</div>
				</div>

				<!-- Info Box -->
				<div class="col-lg-4 info_box_col">
					<div class="info_box">
						<div class="info_image"><img src="images/info_2.jpg" alt=""></div>
						<div class="info_content">
							<div class="info_title">Administrador</div>
							<div class="info_text">Solo de uso para el personal autorizado de la institución.</div>
							<div class="button info_button"><a href="{{ route('programarcita.index') }}"><span>Ingresa</span><span>Ingresa</span></a></div>
						</div>
					</div>
				</div>


			</div>
		</div>
	</div>



@endsection