@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de procesos <a href="procesos/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('configuracion.procesos.search')
		</div>
	</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover text-center">
				<thead>
					<th>Nombre proceso</th>
					<th>Materia proceso</th>
					<th>Periodo proceso</th>
					<th>Grado proceso</th>
					<th>Estado proceso</th>
					<th>Opciones</th>
				</thead>
				@foreach($procesos as $proceso)
				<tr>
					<td>{{ $proceso->pro_nombre}}</td>
					<td>{{ $proceso->materia}}</td>
					<td>{{ $proceso->periodo}}</td>
					<td>{{ $proceso->grado}}</td>
					@if($proceso->pro_estado='1')
					<td>Activo</td>
					@endif
					<td>
						<a href="{{URL::action('ProcesosController@edit',$proceso->pro_idProceso)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$proceso->pro_idProceso}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('configuracion.procesos.modal')
				@endforeach
			</table>
		</div>
		{{$procesos->render()}}
	</div>
</div>
@endsection