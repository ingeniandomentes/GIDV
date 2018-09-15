@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3>Editar Observacion {{$observaciones->ob_idTipoObservacionFK}}</h3>
			@include('errores/errores')
		</div>
	</div>
			{!!Form::model($observaciones,['method'=>'PATCH','route'=>['observaciones.update',$observaciones->ob_idObservaciones]])!!}
			{{Form::token()}}

	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="idTipoObservacion">Tipo de Observación</label>
				<select name="idTipoObservacion" class="form-control">
					<option value="0">Elije una opción</option>
					@foreach($tipoobservaciones as $tipoobservacion)
					@if($tipoobservacion->to_idTipoObservacion==$observaciones->ob_idTipoObservacionFK)
					<option value="{{$tipoobservacion->to_idTipoObservacion}}" selected>{{$tipoobservacion->to_nombre}}</option>
					@else
					<option value="{{$tipoobservacion->to_idTipoObservacion}}">{{$tipoobservacion->to_nombre}}</option>
					@endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="descripcion">Descripcion</label>
				<input type="text" name="descripcion" class="form-control" value="{{$observaciones->ob_descripcion}}">
			</div>
		</div>
	</div>

	<div class="form-group">
		<button class="btn btn-primary" type="sumbmit">Agregar</button>
		<button class="btn btn-danger" type="reset">Borrar</button>
	</div>
	{!!Form::close()!!}
@endsection