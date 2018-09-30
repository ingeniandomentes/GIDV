@extends('layouts.admin')
@section('contenido')
@include('success.success')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de periodos <a href="periodos/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('configuracion.periodos.search')
		</div>
	</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover text-center">
				<thead>
					<th>Id Periodo</th>
					<th>Nombre Periodo</th>
					<th>Fecha Inicio Periodo</th>
					<th>Fecha Final Periodo</th>
					<th>Estado Periodo</th>
					<th>Opciones</th>
				</thead>
				@foreach($periodos as $periodo)
				<tr>
					<td>{{ $periodo->pe_idPeriodo}}</td>
					<td>{{ $periodo->pe_nombre}}</td>
					<td>{{ $periodo->pe_fechaInicial}}</td>
					<td>{{ $periodo->pe_fechaFinal}}</td>
					@if($periodo->pe_estado=='1')
					<td>Activo</td>
					<td>
						<a href="{{URL::action('PeriodosController@edit',$periodo->pe_idPeriodo)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$periodo->pe_idPeriodo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
					@else
					<td>Inactivo</td>
					<td>
						<a href="{{URL::action('PeriodosController@edit',$periodo->pe_idPeriodo)}}"><button class="btn btn-info">Activar</button></a>
					</td>
					@endif
				</tr>
				@include('configuracion.periodos.modal')
				@endforeach
			</table>
		</div>
		{{$periodos->render()}}
	</div>
</div>
@endsection