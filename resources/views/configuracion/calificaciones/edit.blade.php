@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3>Editar Nota del Estudiante: {{$estudiantes->es_nombre}} {{$estudiantes->es_apellido}}</h3>
			@include('errores/errores')
		</div>
	</div>
		{!!Form::model($calificaciones,['method'=>'PATCH','route'=>['calificaciones.update',$calificaciones->ca_idCalificacion]])!!}
		{{Form::token()}}
		
		{!!Form::close()!!}
@endsection