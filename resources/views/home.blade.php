@extends('layouts.principal')

@section('navT')

        @include('partials.nav2')
@endsection
@section('seccion_c')


<div class="container">


	<div class="info">
		<div class="container">
			<div class="row row-eq-height">

				<!-- Info Box -->
				<div class="col-lg-4 info_box_col">
					<div class="info_box">
						<div class="info_image"><img src="images/info_1.jpg" alt=""></div>
						<div class="info_content">
							<div class="info_title">Usuario</div>
							<div class="info_text">Arcu neque, scelerisque eget ligula ac, congue tempor felis. Integer tempor, eros a egestas finibus, dolor risus mollis.</div>
							<div class="button info_button"><a href="#"><span>Has clic</span><span>Ingresar</span></a></div>
						</div>
					</div>
				</div>

				<!-- Info Box -->
				<div class="col-lg-4 info_box_col">
					<div class="info_box">
						<div class="info_image"><img src="images/info_2.jpg" alt=""></div>
						<div class="info_content">
							<div class="info_title">Administrador</div>
							<div class="info_text">Morbi arcu neque, scelerisque eget ligula ac, congue tempor felis. Integer tempor, eros a egestas finibus, dolor risus.</div>
							<div class="button info_button"><a href="#"><span>Has clic</span><span>Ingresar</span></a></div>
						</div>
					</div>
				</div>

				<!-- Info Form -->
				<div class="col-lg-4 info_box_col">
					<div class="info_form_container">
						<div class="info_form_title">Consultar</div>
						<form action="#" class="info_form" id="info_form">
							<select name="info_form_dep" id="info_form_dep" class="info_form_dep info_input info_select">
								<option>Department</option>
								<option>Department</option>
								<option>Department</option>
							</select>
							<select name="info_form_doc" id="info_form_doc" class="info_form_doc info_input info_select">
								<option>Doctor</option>
								<option>Doctor</option>
								<option>Doctor</option>
							</select>
							<input type="text" class="info_input" placeholder="Name" required="required">
							<input type="text" class="info_input" placeholder="Phone No">
							<button class="info_form_button">Igresar</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>



@endsection