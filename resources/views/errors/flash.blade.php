@if (Session::has('mensaje_errors'))

	<div class="alert alert-danger" id="destiny">
	<!--	<h4 class="alert-heading">Uy!!! tenemos un problema</h4>-->
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong>Observación</strong>

			<span>{{ Session::get('mensaje_errors') }}</span>
		<br />
	</div>


@endif

@if (Session::has('mensaje_info'))

	<div class="alert alert-info" id="destiny">
	<!--	<h4 class="alert-heading">Recordemos!!!</h4>-->
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong>Observación!</strong>

			<span>{{ Session::get('mensaje_info') }}</span>
		<br />
	</div>


@endif


@if (Session::has('mensaje_success'))
	<!-- <h4 class="alert-heading">Bien!!! lo has logrado.</h4>-->
	<div class="alert alert-success" id="destiny">
		<button type="button" class="close" data-dismiss="alert">
			<i class="ace-icon fa fa-times"></i>
		</button>
		<strong>Satisfactorio!</strong>

			<span>{{ Session::get('mensaje_success') }}</span>
		<br />
	</div>


@endif