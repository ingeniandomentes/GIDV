@extends('layouts.admin')
@section('contenido')
@include('success.success')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de cursos <a href="cursos/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('configuracion.cursos.search')
		</div>
	</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover text-center">
				<thead>
					<th>Id Curso</th>
					<th>Nombre Curso</th>
					<th>Nombre Grado</th>
					<th>Estado Curso</th>
					<th>Opciones</th>
				</thead>
				@foreach($cursos as $curso)
				<tr>
					<td>{{ $curso->cu_idCurso}}</td>
					<td>{{ $curso->cu_nombre}}</td>
					<td>{{ $curso->grado}}</td>
					@if($curso->cu_estado='1')
					<td>Activo</td>
					@endif
					<td>
						<a href="{{URL::action('CursosController@edit',$curso->cu_idCurso)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$curso->cu_idCurso}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('configuracion.cursos.modal')
				@endforeach
			</table>
		</div>
		{{$cursos->render()}}
	</div>
</div>
@endsection