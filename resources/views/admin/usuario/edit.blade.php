@extends('layouts.principal')
@section('navT')
        @include('partials.navAdmin')
@endsection
@section('seccion_c')
<div class="container">
	<br><br>
	 <div class="row">
      <div class="col text-center mt-3">
        <div class="section_title">Editar Usuario</div>
      </div>
    </div>
	<br><br>

		<div class="container">
		{{Form::model($user, array('route' => array('usuario.update', $user[0]->id),'id'=>'form'))}}
			<div class="col-md-10 offset-1">
			{{ Form::token() }}
            <div class="form-group">
              {{ Form::label('tipoDocumento', 'Tipo de Documento') }}
              {!! Form::select('tipo',$tipoDocumento, '', ['class'=>'form-control form-control-lg single1 select', 'data-parsley-required', 'id'=>'tipo'
                                  ]) !!}
            </div>

            @php
            		$var=exploid_blade($user[0]->numero,1);

            @endphp
			<div class="form-group">
		    {{ Form::label('numero_documento', 'Número de Documento') }}
		    {{ Form::text('numero',$var[1] ,['class'=>'form-control dni','data-parsley-required  ','id'=>'dni']) }}
		    </div>
		    <div class="form-group">
			{{ Form::label('email', 'Correo') }}
		    {{ Form::email('email', $user[0]->email,  ['class'=>'form-control', 'data-parsley-type="email" data-parsley-required','id'=>'correo']) }}
		    </div>
		    <div class="form-group">
			{{ Form::label('nombre', 'Nombre') }}
		    {{ Form::text('nombre', $user[0]->name,['class'=>'form-control','data-parsley-required','id'=>'nombre']) }}
		    </div>
		    <div class="form-group">
		   	{{ Form::label('apellidoP', 'Apellido Paterno') }}
		    {{ Form::text('apellido_paterno', $user[0]->apellidoP,['class'=>'form-control','data-parsley-required','id'=>'apellidoP']) }}
		    </div>
            <div class="form-group">
              {{ Form::label('apellidoM', 'Apellido Materno') }}
              {{ Form::text('apellido_materno', $user[0]->apellidoM,['class'=>'form-control','data-parsley-required','id'=>'apellidoM']) }}
            </div>
            <div class="form-group">
              {{ Form::label('telefono', 'Telefóno') }}
              {{ Form::text('telefono', $user[0]->numero,['class'=>'form-control','data-parsley-required','id'=>'telefono']) }}
            </div>
		    <div class="form-group">
			    {{ Form::label('clave', 'Clave') }}
			    {{ Form::password('clave', ['class' => 'form-control','data-parsley-required data-parsley-equalto="#repetir-clave"','id'=>'clave']) }}
		 	</div>
		    <div class="form-group">
			    {{ Form::label('repetir-clave', 'Clave') }}
			    {{ Form::password('repetir-clave', ['class' => 'form-control','data-parsley-required data-parsley-equalto="#clave"','id'=>'repetir-clave']) }}
		    </div>
  			<div class="form-group">
	          {{ Form::label('tipo', 'Tipo') }}
	          {!! Form::select('tipoUsuario',[''=>'Selecionar','2'=>'Usuario','3'=>'Doctor'], '', ['class'=>'form-control form-control-lg single select','data-parsley-required', 'id'=>'role']) !!}
			</div>
	        <div class="form-group">
			    {{ Form::label('role', 'Role') }}
			   	{!! Form::select('role',$role, '', ['class'=>'form-control form-control-lg single select', 'data-parsley-required', 'id'=>'role']) !!}
			</div>
		    <br>
		    <button type="submit" class="btn btn-primary">Enviar</button>
		    <a href="{{ route('usuario.index') }}" class="btn btn-warning">Regresar</a>
			{!! Form::close() !!}

			</div>
		</div>
</div>

<!-- Token -->
<input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
@endsection
