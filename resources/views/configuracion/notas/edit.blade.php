@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3>Editar Grado {{$notas->no_nombre}}</h3>
			@include('errores/errores')
			{!!Form::model($notas,['method'=>'PATCH','route'=>['notas.update',$notas->no_idNota]])!!}
			{{Form::token()}}
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" value="{{$notas->no_nombre}}" placeholder="Nombre de la nota">
				<label for="nombre">Descripcion</label>
				<input type="text" name="descripcion" class="form-control" value="{{$notas->no_descripcion}}" placeholder="Descripcion de la nota">
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="sumbmit">Editar</button>
				<button class="btn btn-danger" type="reset">Borrar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection