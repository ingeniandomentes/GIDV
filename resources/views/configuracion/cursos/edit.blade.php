@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3>Editar Curso {{$cursos->cu_nombre}}</h3>
			@include('errores/errores')
		</div>
	</div>
			{!!Form::model($cursos,['method'=>'PATCH','route'=>['cursos.update',$cursos->cu_idCurso]])!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" value="{{$cursos->cu_nombre}}">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="idGrado">Grado</label>
				<select name="idGrado" class="form-control">
					<option value="0">Elije una opción</option>
					@foreach($grados as $grado)
					@if($grado->gr_idGrado==$cursos->cu_idGradoFK)
					<option value="{{$grado->gr_idGrado}}" selected>{{$grado->gr_nombre}}</option>
					@else
					<option value="{{$grado->gr_idGrado}}">{{$grado->gr_nombre}}</option>
					@endif
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