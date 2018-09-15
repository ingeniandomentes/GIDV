@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3>Nuevo Proceso</h3>
			@include('errores/errores')
		</div>
	</div>
			{!!Form::open(array('url'=>'procesos','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" placeholder="Nombre del proceso">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="materia">Materia</label>
				<select name="materia" class="form-control">
					<option value="0" selected>Elije una opción</option>
					@foreach($materias as $materia)
					<option value="{{$materia->ma_idMateria}}">{{$materia->ma_nombre}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="periodo">Periodo</label>
				<select name="periodo" class="form-control">
					<option value="0" selected>Elije una opción</option>
					@foreach($periodos as $periodo)
					<option value="{{$periodo->pe_idPeriodo}}">{{$periodo->pe_nombre}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="grado">Grado</label>
				<select name="grado" class="form-control">
					<option value="0" selected>Elije una opción</option>
					@foreach($grados as $grado)
					<option value="{{$grado->gr_idGrado}}">{{$grado->gr_nombre}}</option>
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