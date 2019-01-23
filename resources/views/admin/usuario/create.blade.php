@extends('layouts.principal')
@section('navT')
        @include('partials.navAdmin')
@endsection
@section('seccion_c')

<div class="container">
	<br><br>
	 <div class="row">
      <div class="col text-center mt-3">
        <div class="section_title">Crear Usuario</div>
      </div>
    </div>
	<br><br>

		<div class="container">
			<div class="col-md-10 offset-1">
					<form>
						<div class="form-group">
					    <label for="correo">DNI</label>
					    <input type="text" class="form-control" id="correo" aria-describedby="emailHelp" >
					  </div>
					  <div class="form-group">
					    <label for="correo">Correo</label>
					    <input type="text" class="form-control" id="correo" aria-describedby="emailHelp" >
					  </div>
					  <div class="form-group">
					    <label for="nombre">Nombre</label>
					    <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" >
					  </div>
					   <div class="form-group">
					    <label for="apellido">Apellido</label>
					    <input type="text" class="form-control" id="apellido" aria-describedby="emailHelp" >
					  </div>
					  <div class="form-group">
					    <label for="clave">Clave</label>
					    <input type="password" class="form-control" id="clave" placeholder="Password">
					  </div>
					    <div class="form-group">
					    <label for="repetirClave">Repetir clave</label>
					    <input type="password" class="form-control" id="repetirClave" placeholder="Password">
					  </div>
					   <div class="form-group">
					    <label for="apellido">Role</label>
					   	<select name="role" id="" class="form-control form-control-lg" id="role">
					   		<option value="">Selecionar</option>
					   	</select>
					  </div>
					  <br>

					  <button type="submit" class="btn btn-primary">Enviar</button>
					  <a href="{{ route('usuario.index') }}" class="btn btn-warning">Regresar</a>
					</form>

			</div>


		</div>





</div>

@endsection