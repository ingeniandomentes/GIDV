@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3>Nuevo Competencia</h3>
			@include('errores/errores')
		</div>
	</div>
			{!!Form::open(array('url'=>'competencias','method'=>'POST','autocomplete'=>'off'))!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="descripcion">Descripcion</label>
				<textarea row="6" type="text" name="descripcion" class="form-control" placeholder="Descripcion de la competencia"></textarea>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="proceso">Proceso</label>
				<select name="proceso" class="form-control">
					<option value="0" selected>Elije una opción</option>
					@foreach($procesos as $proceso)
					<option value="{{$proceso->pro_idProceso}}">{{$proceso->pro_nombre}}</option>
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