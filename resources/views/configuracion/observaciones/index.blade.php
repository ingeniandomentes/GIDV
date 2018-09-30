@extends('layouts.admin')
@section('contenido')
@include('success.success')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de observaciones <a href="observaciones/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('configuracion.observaciones.search')
		</div>
	</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover text-center">
				<thead>
					<th>Id Observacion</th>
					<th>Tipo Observacion</th>
					<th>Descripcion Observacion</th>
					<th>Estado Observacion</th>
					<th>Opciones</th>
				</thead>
				@foreach($observaciones as $observacion)
				<tr>
					<td>{{ $observacion->ob_idObservaciones}}</td>
					<td>{{ $observacion->nombre}}</td>
					<td>{{ $observacion->ob_descripcion}}</td>
					@if($observacion->ob_estado=='1')
					<td>Activo</td>
					<td>
						<a href="{{URL::action('ObservacionesController@edit',$observacion->ob_idObservaciones)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$observacion->ob_idObservaciones}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
					@else
					<td>Inactivo</td>
					@endif
					
				</tr>
				@include('configuracion.observaciones.modal')
				@endforeach
			</table>
		</div>
		{{$observaciones->render()}}
	</div>
</div>
@endsection