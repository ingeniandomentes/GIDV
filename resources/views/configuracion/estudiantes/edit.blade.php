@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3>Editar Estudiante {{$estudiantes->es_nombre}} {{$estudiantes->es_apellido}}</h3>
			@include('errores/errores')
		</div>
	</div>
			{!!Form::model($estudiantes,['method'=>'PATCH','route'=>['estudiantes.update',$estudiantes->es_idEstudiante],'files'=>'true'])!!}
			{{Form::token()}}
		<div class="row">
			@if($estudiantes->es_estado==1)
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label for="nombre">Nombre(s)</label>
					<input type="text" name="nombre" class="form-control" value="{{$estudiantes->es_nombre}}">
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label for="apellido">Apellidos</label>
					<input type="text" name="apellido" class="form-control" value="{{$estudiantes->es_apellido}}">
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label for="codigo">Codigo</label>
					<input type="text" name="codigo" class="form-control" value="{{$estudiantes->es_codigo}}">
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label for="numeroDocumeto">Numero Documento</label>
					<input type="text" name="numeroDocumento" class="form-control" value="{{$estudiantes->es_numeroDocumento}}">
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label>Curso</label>
					<select name="idCurso" class="form-control">
						<option value="0">Elije una opción</option>
						@foreach($cursos as $curso)
							@if($curso->cu_idCurso==$estudiantes->es_idCursoFK)
							<option value="{{$curso->cu_idCurso}}"  selected>{{$curso->cu_nombre}}</option>
							@else
							@if($curso->cu_idCurso==10)
							@else
							<option value="{{$curso->cu_idCurso}}">{{$curso->cu_nombre}}</option>
							@endif
							@endif
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label for="fotoEstudiante">Foto Estudiante</label>
					<input type="file" name="fotoEstudiante" class="form-control">
					@if(($estudiantes->es_fotoEstudiante)!="")
					<img src="{{asset('imagenes/fotosEstudiantes/'.$estudiantes->es_fotoEstudiante)}}" height="300px" width="300px">
					@endif
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
					<label for="nombre">Nombre(s)</label>
					<input type="text" name="nombre" class="form-control" value="{{$estudiantes->es_nombre}}" readonly>
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label for="apellido">Apellidos</label>
					<input type="text" name="apellido" class="form-control" value="{{$estudiantes->es_apellido}}" readonly>
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label for="codigo">Codigo</label>
					<input type="text" name="codigo" class="form-control" value="{{$estudiantes->es_codigo}}" readonly>
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label for="numeroDocumeto">Numero Documento</label>
					<input type="text" name="numeroDocumento" class="form-control" value="{{$estudiantes->es_numeroDocumento}}" readonly>
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label>Curso</label>
					<select name="idCurso" class="form-control" readonly>
						@foreach($cursos as $curso)
							@if($curso->cu_idCurso==$estudiantes->es_idCursoFK)
							<option value="{{$curso->cu_idCurso}}"  selected>{{$curso->cu_nombre}}</option>
							@else
							<option value="{{$curso->cu_idCurso}}">{{$curso->cu_nombre}}</option>
							@endif
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label for="fotoEstudiante">Foto Estudiante</label>
					<input type="file" name="fotoEstudiante" class="form-control" readonly>
					@if(($estudiantes->es_fotoEstudiante)!="")
					<img src="{{asset('imagenes/fotosEstudiantes/'.$estudiantes->es_fotoEstudiante)}}" height="300px" width="300px">
					@endif
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
		</div>
			
			<div class="form-group">
				<button class="btn btn-primary" type="sumbmit">Agregar</button>
				<button class="btn btn-danger" type="reset">Borrar</button>
			</div>
		{!!Form::close()!!}
@endsection