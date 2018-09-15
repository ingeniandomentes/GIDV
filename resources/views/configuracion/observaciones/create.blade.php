@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3>Nueva Observación</h3>
			@include('errores/errores')
		</div>
	</div>
			{!!Form::open(array('url'=>'observaciones','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="idTipoObservacion">Tipo de Observación</label>
				<select name="idTipoObservacion" class="form-control">
					<option value="0" selected>Elije una opción</option>
					@foreach($tipoobservaciones as $tipoobservacion)
					<option value="{{$tipoobservacion->to_idTipoObservacion}}">{{$tipoobservacion->to_nombre}}</option>
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="descripcion">Descripcion</label>
				<input type="text" name="descripcion" class="form-control" placeholder="Descripción">
			</div>
		</div>
	</div>	
			<div class="form-group">
				<button class="btn btn-primary" type="sumbmit">Agregar</button>
				<button class="btn btn-danger" type="reset">Borrar</button>
			</div>
	{!!Form::close()!!}
@endsection