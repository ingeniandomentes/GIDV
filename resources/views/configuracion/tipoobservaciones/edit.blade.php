@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3>Editar Tipo de Observacion {{$tipoobservaciones->to_nombre}}</h3>
			@include('errores/errores')
			{!!Form::model($tipoobservaciones,['method'=>'PATCH','route'=>['tipoobservaciones.update',$tipoobservaciones->to_idTipoObservacion]])!!}
			{{Form::token()}}
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" value="{{$tipoobservaciones->to_nombre}}" placeholder="Nombre del Tipo de Observacion">
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="sumbmit">Editar</button>
				<button class="btn btn-danger" type="reset">Borrar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection