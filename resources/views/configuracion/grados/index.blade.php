@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de grados <a href="grados/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('configuracion.grados.search')
		</div>
	</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-bordered table-striped  table-condensed table-hover text-center">
				<thead>
					<th>Id Grado</th>
					<th>Nombre Grado</th>
					<th>Estado Grado</th>
					<th>Opciones</th>
				</thead>
				@foreach($grados as $grado)
				<tr>
					<td>{{ $grado->gr_idGrado}}</td>
					<td>{{ $grado->gr_nombre}}</td>
					@if($grado->gr_estado='1')
					<td>Activo</td>
					@endif
					<td>
						<a href="{{URL::action('GradosController@edit',$grado->gr_idGrado)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$grado->gr_idGrado}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('configuracion.grados.modal')
				@endforeach
			</table>
		</div>
		{{$grados->render()}}
	</div>
</div>
@endsection