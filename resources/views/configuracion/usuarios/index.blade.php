@extends('layouts.admin')
@section('contenido')

@include('success.success')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de usuarios <a href="usuarios/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('configuracion.usuarios.search')
		</div>
	</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover text-center">
				<thead>
					<th>Id</th>
					<th>Email</th>
					<th>Password</th>
					<th>Nombre(s)</th>
					<th>Apellidos</th>
					<th>Tipo Documento</th>
					<th>Numero Documento</th>
					<th>Rol</th>
					<th>Estado</th>
					<th>Opciones</th>
				</thead>
				@foreach($usuarios as $usuario)
				<tr>
					@if($usuario->id==auth()->id())
						@if($rol=Auth::user()->us_idRolFK==1 && $usuario->us_idRolFK==1)
						<td>{{$usuario->id}}</td>
						<td>{{$usuario->email}}</td>
						<td>**********</td>
						<td>{{$usuario->name}}</td>
						<td>{{$usuario->us_apellido}}</td>
						<td>{{$usuario->documento}}</td>
						<td>{{$usuario->us_numeroDocumento}}</td>
						<td>{{$usuario->rol}}</td>
							@if($usuario->us_estado=='1')
							<td>Activo</td>
							@else
							<td>Incativo</td>
							@endif
						@elseif($rol=Auth::user()->us_idRolFK==1 && $usuario->us_idRolFK==2)
						<td>{{$usuario->id}}</td>
							<td>{{$usuario->email}}</td>
							<td>**********</td>
							<td>{{$usuario->name}}</td>
							<td>{{$usuario->us_apellido}}</td>
							<td>{{$usuario->documento}}</td>
							<td>{{$usuario->us_numeroDocumento}}</td>
							<td>{{$usuario->rol}}</td>
								@if($usuario->us_estado=='1')
								<td>Activo</td>
								@else
								<td>Incativo</td>
								@endif
						@elseif($rol=Auth::user()->us_idRolFK==2 && $usuario->us_idRolFK==2)
						<td>{{$usuario->id}}</td>
							<td>{{$usuario->email}}</td>
							<td>**********</td>
							<td>{{$usuario->name}}</td>
							<td>{{$usuario->us_apellido}}</td>
							<td>{{$usuario->documento}}</td>
							<td>{{$usuario->us_numeroDocumento}}</td>
							<td>{{$usuario->rol}}</td>
								@if($usuario->us_estado=='1')
								<td>Activo</td>
								@else
								<td>Incativo</td>
								@endif
						@elseif($rol=Auth::user()->us_idRolFK==2 && $usuario->us_idRolFK==3)
							<td>{{$usuario->id}}</td>
							<td>{{$usuario->email}}</td>
							<td>**********</td>
							<td>{{$usuario->name}}</td>
							<td>{{$usuario->us_apellido}}</td>
							<td>{{$usuario->documento}}</td>
							<td>{{$usuario->us_numeroDocumento}}</td>
							<td>{{$usuario->rol}}</td>
								@if($usuario->us_estado=='1')
								<td>Activo</td>
								@else
								<td>Incativo</td>
								@endif
						@else
						@endif
						@else
						@if($rol=Auth::user()->us_idRolFK==1 && $usuario->us_idRolFK==1)
						<td>{{$usuario->id}}</td>
						<td>{{$usuario->email}}</td>
						<td>**********</td>
						<td>{{$usuario->name}}</td>
						<td>{{$usuario->us_apellido}}</td>
						<td>{{$usuario->documento}}</td>
						<td>{{$usuario->us_numeroDocumento}}</td>
						<td>{{$usuario->rol}}</td>
							@if($usuario->us_estado=='1')
							<td>Activo</td>
							<td>
								<a href="{{URL::action('UsuariosController@edit',$usuario->id)}}"><button class="btn btn-info">Editar</button></a>
								<a href="" data-target="#modal-delete-{{$usuario->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
							</td>
							@else
							<td>Incativo</td>
							<td>
								<a href="{{URL::action('UsuariosController@edit',$usuario->id)}}"><button class="btn btn-info">Activar</button></a>
							</td>
							@endif
						@elseif($rol=Auth::user()->us_idRolFK==1 && $usuario->us_idRolFK==2)
							<td>{{$usuario->id}}</td>
							<td>{{$usuario->email}}</td>
							<td>**********</td>
							<td>{{$usuario->name}}</td>
							<td>{{$usuario->us_apellido}}</td>
							<td>{{$usuario->documento}}</td>
							<td>{{$usuario->us_numeroDocumento}}</td>
							<td>{{$usuario->rol}}</td>
								@if($usuario->us_estado=='1')
								<td>Activo</td>
								<td>
									<a href="{{URL::action('UsuariosController@edit',$usuario->id)}}"><button class="btn btn-info">Editar</button></a>
									<a href="" data-target="#modal-delete-{{$usuario->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
								</td>
								@else
								<td>Incativo</td>
								<td>
									<a href="{{URL::action('UsuariosController@edit',$usuario->id)}}"><button class="btn btn-info">Activar</button></a>
								</td>
								@endif
						@elseif($rol=Auth::user()->us_idRolFK==2 && $usuario->us_idRolFK==2)
							<td>{{$usuario->id}}</td>
							<td>{{$usuario->email}}</td>
							<td>**********</td>
							<td>{{$usuario->name}}</td>
							<td>{{$usuario->us_apellido}}</td>
							<td>{{$usuario->documento}}</td>
							<td>{{$usuario->us_numeroDocumento}}</td>
							<td>{{$usuario->rol}}</td>
								@if($usuario->us_estado=='1')
								<td>Activo</td>
								<td>
									<a href="{{URL::action('UsuariosController@edit',$usuario->id)}}"><button class="btn btn-info">Editar</button></a>
									<a href="" data-target="#modal-delete-{{$usuario->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
								</td>
								@else
								<td>Incativo</td>
								<td>
									<a href="{{URL::action('UsuariosController@edit',$usuario->id)}}"><button class="btn btn-info">Activar</button></a>
								</td>
								@endif
						@elseif($rol=Auth::user()->us_idRolFK==2 && $usuario->us_idRolFK==3)
							<td>{{$usuario->id}}</td>
							<td>{{$usuario->email}}</td>
							<td>**********</td>
							<td>{{$usuario->name}}</td>
							<td>{{$usuario->us_apellido}}</td>
							<td>{{$usuario->documento}}</td>
							<td>{{$usuario->us_numeroDocumento}}</td>
							<td>{{$usuario->rol}}</td>
								@if($usuario->us_estado=='1')
								<td>Activo</td>
								<td>
									<a href="{{URL::action('UsuariosController@edit',$usuario->id)}}"><button class="btn btn-info">Editar</button></a>
									<a href="" data-target="#modal-delete-{{$usuario->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
								</td>
								@else
								<td>Incativo</td>
								<td>
									<a href="{{URL::action('UsuariosController@edit',$usuario->id)}}"><button class="btn btn-info">Activar</button></a>
								</td>
								@endif
						@else
						<td></td>
						@endif
					@endif
				</tr>
				@include('configuracion.usuarios.modal')
				@endforeach
			</table>
		</div>
		{{$usuarios->render()}}
	</div>
</div>
@endsection