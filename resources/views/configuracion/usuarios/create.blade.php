@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3>Nuevo Usuario</h3>
			@include('errores/errores')
		</div>
	</div>
			{!!Form::open(array('url'=>'usuarios','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
			{{Form::token()}}
			{{ csrf_field() }}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
                <label for="email">Correo Electronico</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Correo Electronico del Usuario">
            </div>
        </div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="password">Contraseña</label>
				<input type="password" name="password" class="form-control" value="{{old('password')}}" placeholder="Contraseña del usuario">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
		 	<div class="form-group">
                <label for="password-confirm">Confirmar Contraseña</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Contraseña del usuario">
            </div>
        </div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="name">Nombre(s)</label>
				<input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Nombre del usuario">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="us_apellido">Apellidos</label>
				<input type="text" name="us_apellido" class="form-control" value="{{old('us_apellido')}}" placeholder="Apellidos del usuario">
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="us_idDocumentoFK">Tipo Documento</label>
				<select name="us_idDocumentoFK" class="form-control">
					<option value="0" selected>Elije una opción</option>
					@foreach($tipodocumentos as $td)
					<option value="{{$td->td_idDocumento}}">{{$td->td_nombre}}</option>
					@endforeach
				</select>
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="us_numeroDocumento">Numero Documento</label>
				<input type="text" name="us_numeroDocumento" class="form-control" value="{{old('us_numeroDocumento')}}" placeholder="Numero de Documento del usuario">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="us_idRolFK">Rol</label>
				<select name="us_idRolFK" class="form-control">
					<!--@foreach($roles as $rol)
					<option value="1">{{$rol->ro_nombre}}</option>
					@endforeach-->
					@if($rol=Auth::user()->us_idRolFK==1)
					<option value="0" selected>Elije una opción</option>
					<option value="1">Administrador</option>
					@else(($rol=Auth::user()->us_idRolFK==2)
					<option value="0" selected>Elije una opción</option>
					<option value="2">Directivo</option>
					<option value="3">Profesor</option>	
					@endif
				</select>
			</div>
		</div>	
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="us_idCursoFK">Curso</label>
				<select name="us_idCursoFK" class="form-control">
					<option value="0" selected>Elije una opción</option>
					@foreach($cursos as $curso)
					<option value="{{$curso->cu_idCurso}}">{{$curso->cu_nombre}}</option>
					@endforeach
				</select>
			</div>
		</div>
	</div>
			
	<div class="form-group">
		<button class="btn btn-primary" type="sumbmit">Agregar</button>
		<button class="btn btn-danger" type="reset">Borrar</button>
	</div>
	{!!Form::close()!!}
@endsection