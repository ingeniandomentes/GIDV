@extends('layouts.admin')
@section('contenido')
@include('success.success')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de estudiantes
				@if($user=Auth::user()->us_idRolFK==3)
				@else
				<a href="estudiantes/create"><button class="btn btn-success">Nuevo</button></a>
				@endif
			</h3>
			@include('configuracion.estudiantes.search')
		</div>
	</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover text-center">
				<thead>
					<th>Id</th>
					<th>Nombre(s)</th>
					<th>Apellidos</th>
					<th>Codigo</th>
					<th>Tipo Documento</th>
					<th>Numero Documento</th>
					<th>Jornada</th>
					<th>Grado</th>
					<th>Curso</th>
					<th>Foto</th>
					<th>Estado</th>
					@if($user=Auth::user()->us_idRolFK!=3)
					<th>Opciones</th>
					@endif
				</thead>
				@foreach($estudiantes as $estudiante)
				<tr>
					@if($curso=Auth::user()->us_idCursoFK==$estudiante->es_idCursoFK && $user=Auth::user()->us_idRolFK==3)
						<td>{{$estudiante->es_idEstudiante}}</td>
						<td>{{$estudiante->es_nombre}}</td>
						<td>{{$estudiante->es_apellido}}</td>
						<td>{{$estudiante->es_codigo}}</td>
						<td>{{$estudiante->documento}}</td>
						<td>{{$estudiante->es_numeroDocumento}}</td>
						<td>{{$estudiante->es_jornada}}</td>
						<td>{{$estudiante->grado }}</td>
						<td>{{$estudiante->curso}}</td>
						<td>
							<img src="{{asset('imagenes/fotosEstudiantes/'.$estudiante->es_fotoEstudiante)}}" alt="{{ $estudiante->es_nombre}}" height="100px" width="100px" class="img-thumbnail">
						</td>
						@if($estudiante->es_estado==1)
							<td>Activo</td>
							@else
							<td>Incativo</td>
							@endif
					@elseif($user=Auth::user()->us_idRolFK==1 || $user=Auth::user()->us_idRolFK==2)
						<td>{{$estudiante->es_idEstudiante}}</td>
						<td>{{$estudiante->es_nombre}}</td>
						<td>{{$estudiante->es_apellido}}</td>
						<td>{{$estudiante->es_codigo}}</td>
						<td>{{$estudiante->documento}}</td>
						<td>{{$estudiante->es_numeroDocumento}}</td>
						<td>{{$estudiante->es_jornada}}</td>
						<td>{{$estudiante->grado }}</td>
						<td>{{$estudiante->curso}}</td>
						<td>
							<img src="{{asset('imagenes/fotosEstudiantes/'.$estudiante->es_fotoEstudiante)}}" alt="{{ $estudiante->es_nombre}}" height="100px" width="100px" class="img-thumbnail">
						</td>
							@if($estudiante->es_estado==1)
							<td>Activo</td>
							<td>
								<a href="{{URL::action('EstudiantesController@edit',$estudiante->es_idEstudiante)}}"><button class="btn btn-info">Editar</button></a>
								<a href="" data-target="#modal-delete-{{$estudiante->es_idEstudiante}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
							</td>
							@else
							<td>Incativo</td>
							<td>
								<a href="{{URL::action('EstudiantesController@edit',$estudiante->es_idEstudiante)}}"><button class="btn btn-info">Activar</button></a>
							</td>
							@endif
					@else
					@endif
				</tr>
				@include('configuracion.estudiantes.modal')
				@endforeach
			</table>
		</div>
		{{$estudiantes->render()}}
	</div>
</div>
@endsection