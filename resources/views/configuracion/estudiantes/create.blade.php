@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3>Nuevo Estudiante</h3>
			@include('errores/errores')
		</div>
	</div>
			{!!Form::open(array('url'=>'estudiantes','method'=>'POST','autocomplete'=>'off','files'=>'true','name'=>"crearEstudiante"))!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="nombre">Nombre(s)</label>
				<input type="text" name="nombre" class="form-control" value="{{old('nombre')}}" placeholder="Nombre del estudiante">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="apellido">Apellidos</label>
				<input type="text" name="apellido" class="form-control" value="{{old('apellido')}}" placeholder="Apellidos del estudiante">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="codigo">Codigo</label>
				<input type="text" name="codigo" class="form-control" value="{{old('codigo')}}" placeholder="Codigo del estudiante">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="numeroDocumeto">Numero Documento</label>
				<input type="text" name="numeroDocumento" class="form-control" value="{{old('numeroDocumento')}}" placeholder="Numero de Documento del estudiante">
			</div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="idCurso">Curso</label>
				<select name="idCurso" class="form-control" id="curso">
					<option value="0" selected>Elije una opción</option>
					@foreach($cursos as $curso)
					@if($curso->cu_idCurso==10)
					@else
					<option value="{{$curso->cu_idCurso}}">{{$curso->cu_nombre}}</option>
					@endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="fotoEstudiante">Foto Estudiante</label>
				<input type="file" name="fotoEstudiante" class="form-control">
			</div>
		</div>		
	</div>
			
			<div class="form-group">
				<button class="btn btn-primary" type="sumbmit">Agregar</button>
				<button class="btn btn-danger" type="reset">Borrar</button>
			</div>
			{!!Form::close()!!}
@endsection