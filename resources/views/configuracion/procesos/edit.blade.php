@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3>Editar Proceso {{$procesos->pro_nombre}}</h3>
			@include('errores/errores')
		</div>
	</div>
			{!!Form::model($procesos,['method'=>'PATCH','route'=>['procesos.update',$procesos->pro_idProceso]])!!}
			{{Form::token()}}
	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="nombre">Nombre</label>
				<input type="text" name="nombre" class="form-control" value="{{$procesos->pro_nombre}}" placeholder="Nombre de la materia">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="materia">Materia</label>
				<select name="materia" class="form-control">
					<option value="0">Elije una opción</option>
					@foreach($materias as $materia)
					@if($materia->ma_idMateria==$procesos->pro_idMateriaFK)
					<option value="{{$materia->ma_idMateria}}" selected>{{$materia->ma_nombre}}</option>
					@else
					<option value="{{$materia->ma_idMateria}}">{{$materia->ma_nombre}}</option>
					@endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="periodo">Periodo</label>
				<select name="periodo" class="form-control">
					<option value="0">Elije una opción</option>
					@foreach($periodos as $periodo)
					@if($periodo->pe_idPeriodo==$procesos->pro_idPeriodoFK)
					<option value="{{$periodo->pe_idPeriodo}}" selected>{{$periodo->pe_nombre}}</option>
					@else
					<option value="{{$periodo->pe_idPeriodo}}">{{$periodo->pe_nombre}}</option>
					@endif
					@endforeach
				</select>
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="grado">Grado</label>
				<select name="grado" class="form-control">
					<option value="0">Elije una opción</option>
					@foreach($grados as $grado)
					@if($grado->gr_idGrado==$procesos->pro_idGradoFK)
					<option value="{{$grado->gr_idGrado}}" selected>{{$grado->gr_nombre}}</option>
					@else
					<option value="{{$grado->gr_idGrado}}">{{$grado->gr_nombre}}</option>
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