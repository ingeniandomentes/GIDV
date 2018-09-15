@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3>Editar Competencia {{$competencias->co_nombre}}</h3>
			@include('errores/errores')
		</div>
	</div>
			{!!Form::model($competencias,['method'=>'PATCH','route'=>['competencias.update',$competencias->co_idCompetencia]])!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="descripcion">Descripcion</label>
				<textarea row="6" type="text" name="descripcion" class="form-control">{{$competencias->co_descripcion}}</textarea>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="proceso">Proceso</label>
				<select name="proceso" class="form-control">
					<option value="0">Elije una opción</option>
					@foreach($procesos as $proceso)
					@if($proceso->pro_idProceso==$competencias->co_idProcesoFK)
					<option value="{{$proceso->pro_idProceso}}" selected>{{$proceso->pro_nombre}}</option>
					@else
					<option value="{{$proceso->pro_idProceso}}">{{$proceso->pro_nombre}}</option>
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