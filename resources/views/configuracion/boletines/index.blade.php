@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de competencias <a href="competencias/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('configuracion.competencias.search')
		</div>
	</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover text-center">
				<thead>
					<th>Id competencia</th>
					<th>Descripcion competencia</th>
					<th>Proceso competencia</th>
					<th>Estado competencia</th>
					<th>Opciones</th>
				</thead>
				@foreach($competencias as $competencia)
				<tr>
					<td>{{ $competencia->co_idCompetencia}}</td>
					<td>{{ $competencia->co_descripcion}}</td>
					<td>{{ $competencia->proceso}}</td>
					@if($competencia->pro_estado='1')
					<td>Activo</td>
					@endif
					<td>
						<a href="{{URL::action('CompetenciasController@edit',$competencia->co_idCompetencia)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$competencia->co_idCompetencia}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('configuracion.competencias.modal')
				@endforeach
			</table>
		</div>
		{{$competencias->render()}}
	</div>
</div>
@endsection