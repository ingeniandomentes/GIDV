@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3>Nueva Nota</h3>
			@include('errores/errores')
			{!!Form::open(array('url'=>'notas','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" placeholder="Nombre de la nota">
			</div>
			<div class="form-group">
				<label for="nombre">Descripcion</label>
				<input type="text" name="descripcion" class="form-control" placeholder="Descripcion de la nota">
			</div>
			<div class="form-group">
				<button class="btn btn-primary" type="sumbmit">Agregar</button>
				<button class="btn btn-danger" type="reset">Borrar</button>
			</div>
			{!!Form::close()!!}
		</div>
	</div>
@endsection