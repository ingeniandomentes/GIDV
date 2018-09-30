@extends('layouts.admin')
@section('contenido')
@include('success.success')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de materias <a href="materias/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('configuracion.materias.search')
		</div>
	</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover text-center">
				<thead>
					<th>Id Materia</th>
					<th>Nombre Materia</th>
					<th>Intensidad Materia</th>
					<th>Docente Asignado</th>
					<th>Estado Materia</th>
					<th>Opciones</th>
				</thead>
				@foreach($materias as $materia)
				<tr>
					<td>{{ $materia->ma_idMateria}}</td>
					<td>{{ $materia->ma_nombre}}</td>
					<td>{{ $materia->ma_intensidad}}</td>
					<td>{{ $materia->docente1}} {{$materia->docente2}}</td>
					@if($materia->ma_estado='1')
					<td>Activo</td>
					@endif
					<td>
						<a href="{{URL::action('MateriasController@edit',$materia->ma_idMateria)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$materia->ma_idMateria}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('configuracion.materias.modal')
				@endforeach
			</table>
		</div>
		{{$materias->render()}}
	</div>
</div>
@endsection