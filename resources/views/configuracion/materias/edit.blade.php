@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3>Editar Materia {{$materias->ma_nombre}}</h3>
			@include('errores/errores')
		</div>
	</div>
			{!!Form::model($materias,['method'=>'PATCH','route'=>['materias.update',$materias->ma_idMateria]])!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" value="{{$materias->ma_nombre}}" placeholder="Nombre de la materia">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="nombre">Intensidad</label>
				<input type="text" name="intensidad" class="form-control" value="{{$materias->ma_intensidad}}" placeholder="Intensidad">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="idDocenteAsignado">Docente</label>
				<select name="idDocenteAsignado" class="form-control">
					<option value="0">Elije una opción</option>
					@foreach($docentes as $docente)
					@if($docente->us_idUsuario==$materias->ma_docenteAsignadoFK)
					<option value="{{$docente->us_idUsuario}}" selected>{{$docente->us_nombre}}</option>
					@else
					<option value="{{$docente->us_idUsuario}}">{{$docente->us_nombre}}</option>
					@endif
					@endforeach
				</select>
			</div>
		</div>
	</div>	
			<div class="form-group">
				<button class="btn btn-primary" type="sumbmit">Agregar</button>
				<button class="btn btn-danger" type="reset">Borrar</button>
				<a href="materias/index"><button class="btn btn-dark">Regresar</button></a>
			</div>
			{!!Form::close()!!}
@endsection