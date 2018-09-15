@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de notas <a href="notas/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('configuracion.notas.search')
		</div>
	</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover text-center">
				<thead>
					<th>Id Nota</th>
					<th>Nombre Nota</th>
					<th>Descripcion Nota</th>
					<th>Estado Nota</th>
					<th>Opciones</th>
				</thead>
				@foreach($notas as $nota)
				<tr>
					<td>{{ $nota->no_idNota}}</td>
					<td>{{ $nota->no_nombre}}</td>
					<td>{{ $nota->no_descripcion}}</td>
					@if($nota->no_estado='1')
					<td>Activo</td>
					@endif
					<td>
						<a href="{{URL::action('NotasController@edit',$nota->no_idNota)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$nota->no_idNota}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('configuracion.notas.modal')
				@endforeach
			</table>
		</div>
		{{$notas->render()}}
	</div>
</div>
@endsection