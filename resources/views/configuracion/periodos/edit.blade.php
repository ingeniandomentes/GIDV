@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3>Editar Periodo {{$periodos->pe_nombre}}</h3>
			@include('errores/errores')
			{!!Form::model($periodos,['method'=>'PATCH','route'=>['periodos.update',$periodos->pe_idPeriodo]])!!}
			{{Form::token()}}
		</div>
	</div>
	<div class="row">
			@if($periodos->pe_estado==1)
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" value="{{$periodos->pe_nombre}}" placeholder="Nombre del periodo">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="fechaInicial">Fecha Inicial</label>
				<input type="date" name="fechaInicial" class="form-control" value="{{$periodos->pe_fechaInicial}}" placeholder="Fecha Inicial">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="fechaFinal">Fecha Final</label>
				<input type="date" name="fechaFinal" class="form-control" value="{{$periodos->pe_fechaFinal}}" placeholder="Fecha Final">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="estado">Estado</label>
				<select name="estado" class="form-control">
					<option value="1" selected>Activo</option>
				</select>
			</div>
		</div>
			@else
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" value="{{$periodos->pe_nombre}}" placeholder="Nombre del periodo" readonly>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="fechaInicial">Fecha Inicial</label>
				<input type="date" name="fechaInicial" class="form-control" value="{{$periodos->pe_fechaInicial}}" placeholder="Fecha Inicial" readonly>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="fechaFinal">Fecha Final</label>
				<input type="date" name="fechaFinal" class="form-control" value="{{$periodos->pe_fechaFinal}}" placeholder="Fecha Final" readonly>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="estado">Estado</label>
				<select name="estado" class="form-control">
					<option value="1">Activo</option>
					<option value="0" selected>Inactivo</option>
				</select>
			</div>
		</div>
			@endif
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<button class="btn btn-primary" type="sumbmit">Editar</button>
				<button class="btn btn-danger" type="reset">Borrar</button>
			</div>
		</div>
			{!!Form::close()!!}
		</div>
@endsection