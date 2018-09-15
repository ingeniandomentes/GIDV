@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3>Nuevo Periodo</h3>
			@include('errores/errores')
		</div>
	</div>
			{!!Form::open(array('url'=>'periodos','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
		<div class="row">
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" name="nombre" class="form-control" placeholder="Nombre del periodo">
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label for="fechaInicial">Fecha Inicial</label>
					<input type="date" name="fechaInicial" class="form-control" placeholder="Fecha Inicial">
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label for="fechaFinal">Fecha Final</label>
					<input type="date" name="fechaFinal" class="form-control" placeholder="Fecha Final">
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<button class="btn btn-primary" type="sumbmit">Agregar</button>
					<button class="btn btn-danger" type="reset">Borrar</button>
				</div>
			</div>
			{!!Form::close()!!}
		</div>
@endsection