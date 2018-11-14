@extends('layouts.admin')
@section('contenido')
@include('success.error')
	<form method="Post" action="/boletines/cursosPDF">
		{{-- {!!Form::model($usuarios,['method'=>'PATCH','route'=>['usuarios.resetUpdate',$usuarios->id]])!!}--}}
		{{Form::token()}}
			<table>
	<table class="borde">
		<h1>Reporte por curso</h1>
		<div class="row">
			<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
				<div class="form-group">
					<label for="periodoCu">Periodo</label>
					<select name="periodoCu" class="form-control">
						<option value="0" selected>Elije una opción</option>
						@foreach($periodos as $pe)
						<option value="{{$pe->pe_idPeriodo}}">{{$pe->pe_nombre}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
				<div class="form-group">
					<label for="curso">Curso</label>
					<select name="curso" class="form-control">
						<option value="0" selected>Elije una opción</option>
						@foreach($cursos as $cu)
						<option value="{{$cu->cu_idCurso}}">{{$cu->cu_nombre}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
				<div class="form-group">
					<label for="anioCu">Año</label>
					<select name="anioCu" class="form-control">
						<option value="0" selected>Elije una opción</option>
						<option value="{{date('Y')}}">{{date('Y')}}</option>
					</select>
				</div>
			</div>
		</div>
		<div>
		<a href="{{URL::action('BoletinesController@cursosPDF')}}"><button class="btn btn-info">Generar PDF Curso</button></a>
		</div>
	</table>
	</form>
	<br>
	{{-- Estudiantes --}}
	<form method="Post" action="/boletines/estudiantesPDF">
	{{-- {!!Form::model($usuarios,['method'=>'PATCH','route'=>['usuarios.resetUpdate',$usuarios->id]])!!}--}}
	{{Form::token()}}
		<table>
		<h1>Reporte por estudiante</h1>
		<div class="row">
			<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
				<div class="form-group">
					<label for="periodoEs">Periodo</label>
					<select name="periodoEs" id="periodoEs" class="form-control">
						<option value="0" selected>Elije una opción</option>
						@foreach($periodos as $pe)
						<option value="{{$pe->pe_idPeriodo}}">{{$pe->pe_nombre}}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
				<div class="form-group">
					<label for="estudiante">Estudiante</label>
					<select name="estudiante" id="estudiante" class="form-control">
						<option value="0" selected>Elije una opción</option>
						@foreach($estudiantes as $es)
						<option value="{{$es->es_idEstudiante}}">{{$es->es_nombre}}  {{ $es->es_apellido }}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
				<div class="form-group">
					<label for="anioEs">Año</label>
					<select name="anioEs" id="anioEs" class="form-control" onchange="anio()">
						<option value="0" selected>Elije una opción</option>
						<option value="{{date('Y')}}">{{date('Y')}}</option>
					</select>
					
				</div>
			</div>
		</div>
		<div>
		<a href="{{URL::action('BoletinesController@estudiantesPDF')}}"><button class="btn btn-info" type="sumbmit">Generar PDF Estudiantes</button></a>
		</div>
	</table>
	</form>
	<br>
	{{-- Estudiantes --}}
	<form method="Post" action="/boletines/estudiantesQPDF">
	{{-- {!!Form::model($usuarios,['method'=>'PATCH','route'=>['usuarios.resetUpdate',$usuarios->id]])!!}
	{{Form::token()}}
		<table>
		<h1>Reporte por estudiante (5° Boletin)</h1>
		<div class="row">
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
				<div class="form-group">
					<label for="estudianteQ">Estudiante</label>
					<select name="estudianteQ" id="estudianteQ" class="form-control">
						<option value="0" selected>Elije una opción</option>
						@foreach($estudiantes as $es)
						<option value="{{$es->es_idEstudiante}}">{{$es->es_nombre}}  {{ $es->es_apellido }}</option>
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
				<div class="form-group">
					<label for="anioEsQ">Año</label>
					<select name="anioEsQ" id="anioEsQ" class="form-control" onchange="anio()">
						<option value="0" selected>Elije una opción</option>
						<option value="{{date('Y')}}">{{date('Y')}}</option>
					</select>
					
				</div>
			</div>
		</div>
		<div>
		<a href="{{URL::action('BoletinesController@estudiantesQPDF')}}"><button class="btn btn-info" type="sumbmit">Generar PDF Estudiantes</button></a>
		</div>
	</table>
	</form>--}}
	<!--<a class="btn btn-success" href="{{ URL::previous() }}">Volver</a>-->
@endsection