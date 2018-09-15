@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3>Nueva Materia</h3>
			@include('errores/errores')
		</div>
	</div>
			{!!Form::open(array('url'=>'materias','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" placeholder="Nombre de la materia">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="nombre">Intensidad</label>
				<input type="text" name="intensidad" class="form-control" placeholder="Intensidad">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="idDocenteAsignado">Docente</label>
				<select name="idDocenteAsignado" class="form-control">
					<option value="0" selected>Elije una opción</option>
					@foreach($docentes as $docente)
					<option value="{{$docente->us_idUsuario}}">{{$docente->us_nombre}} {{$docente->us_apellido}}</option>
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