@extends('layouts.admin')
@section('contenido')
@include('success.success')
	<div class="row ">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de roles <a href="roles/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('configuracion.roles.search')
		</div>
	</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover text-center">
				<thead>
					<th>Id Rol</th>
					<th>Nombre Rol</th>
					<th>Estado Rol</th>
					<th>Opciones</th>
				</thead>
				@foreach($roles as $rol)
				<tr>
					<td>{{ $rol->ro_idRol}}</td>
					<td>{{ $rol->ro_nombre}}</td>
					@if($rol->ro_estado='1')
					<td>Activo</td>
					@endif
					<td>
						<a href="{{URL::action('RolesController@edit',$rol->ro_idRol)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$rol->ro_idRol}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('configuracion.roles.modal')
				@endforeach
			</table>
		</div>
		{{$roles->render()}}
	</div>
</div>
@endsection