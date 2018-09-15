@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3>Editar Rol {{$roles->ro_nombre}}</h3>
			@include('errores/errores')
			{{Form::model($roles,['method'=>'PUT','route'=>['roles.update',$roles->ro_idRol]])}}
			{!!Form::token()!!}
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" value="{{$roles->ro_nombre}}" placeholder="Nombre del Rol">
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="sumbmit">Editar</button>
				<button class="btn btn-danger" type="reset">Borrar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection