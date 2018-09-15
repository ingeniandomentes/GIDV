@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de tipo de observaciones <a href="tipoobservaciones/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('configuracion.tipoobservaciones.search')
		</div>
	</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover text-center">
				<thead>
					<th>Id Tipo Observacion</th>
					<th>Nombre Tipo Observacion</th>
					<th>Estado Tipo Observacion</th>
					<th>Opciones</th>
				</thead>
				@foreach($tipoobservaciones as $tipoobservacion)
				<tr>
					<td>{{$tipoobservacion->to_idTipoObservacion}}</td>
					<td>{{$tipoobservacion->to_nombre}}</td>
					@if($tipoobservacion->to_estado='1')
					<td>Activo</td>
					@endif
					<td>
						<a href="{{URL::action('TipoObservacionesController@edit',$tipoobservacion->to_idTipoObservacion)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$tipoobservacion->to_idTipoObservacion}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('configuracion.tipoobservaciones.modal')
				@endforeach
			</table>
		</div>
		{{$tipoobservaciones->render()}}
	</div>
</div>
@endsection