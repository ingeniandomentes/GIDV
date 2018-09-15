@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de calificaciones <a href="calificaciones/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('configuracion.calificaciones.search')
		</div>
	</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover text-center">
				<thead>
					<!--Calificaciones-->
					<th>Id Calificacion</th>
					<th>Año</th>
					<th>Estudiante</th>
					<th>Periodo</th>
					<th>Materia</th>
					<th>Docente</th>
					<th>Proceso</th>
					<th>Competencia</th>
					<th>Nota Competencia</th>
					<!--Notas Generales-->
					<th>Id Nota General</th>
					<th>Materia 2</th>
					<th>Fallas</th>
					<th>Nota General</th>
					<!--Observaciones-->
					<th>Id Observacion</th>
					<th>Tipo Observacion</th>
					<th>Observacion</th>
					@if($user=Auth::user()->us_idRolFK!=3)
					<th>Opciones</th>
					@endif
				</thead>
				@foreach($calificaciones as $calificacion)
				<tr>
					@if($user=Auth::user()->us_idRolFK==3)
						<td>{{$calificacion->ca_idCalificacion}}</td>
						<td>{{$calificacion->ca_anioCalificacion}}</td>
						<td>{{$calificacion->nombreEs}}</td>
						<td>{{$calificacion->periodo}}</td>
						<td>{{$calificacion->materia}}</td>
						<td>{{$calificacion->docente}}</td>
						<td>{{$calificacion->proceso}}</td>
						<td>{{$calificacion->competencia}}</td>
						<td>{{$calificacion->nota}}</td>
					@elseif($user=Auth::user()->us_idRolFK==1 || $user=Auth::user()->us_idRolFK==2)
						<td>{{$calificacion->ca_idCalificacion}}</td>
						<td>{{$calificacion->ca_anioCalificacion}}</td>
						<td>{{$calificacion->nombreEs}}</td>
						<td>{{$calificacion->periodo}}</td>
						<td>{{$calificacion->materia}}</td>
						<td>{{$calificacion->docente}}</td>
						<td>{{$calificacion->proceso}}</td>
						<td>{{$calificacion->competencia}}</td>
						<td>{{$calificacion->nota}}</td>
						<td>
							<a href="{{URL::action('CalificacionesController@edit',$calificacion->ca_idCalificacion)}}"><button class="btn btn-info">Editar</button></a>
							</td>
					@else
					@endif
				</tr>
				@include('configuracion.calificaciones.modal')
				@endforeach
				@foreach($notasgenerales as $notageneral)
				<tr>
					@if($user=Auth::user()->us_idRolFK==3)
						<td>{{$notageneral->ng_idNotaGeneral}}</td>
						<td>{{$notageneral->materia}}</td>
						<td>{{$notageneral->ng_fallas}}</td>
						<td>{{$notageneral->nota}}</td>
					@elseif($user=Auth::user()->us_idRolFK==1 || $user=Auth::user()->us_idRolFK==2)
						<td>{{$notageneral->ng_idNotaGeneral}}</td>
						<td>{{$notageneral->materia}}</td>
						<td>{{$notageneral->ng_fallas}}</td>
						<td>{{$notageneral->nota}}</td>
					@else
					@endif
				</tr>
				@endforeach
				@foreach($observacionesgenerales as $observaciongeneral)
				<tr>
					@if($user=Auth::user()->us_idRolFK==3)
						<td>{{$observaciongeneral->ng_idNotaGeneral}}</td>
						<td>{{$observaciongeneral->tipoobservacion}}</td>
						<td>{{$observaciongeneral->observacion}}</td>
					@elseif($user=Auth::user()->us_idRolFK==1 || $user=Auth::user()->us_idRolFK==2)
						<td>{{$observaciongeneral->ng_idNotaGeneral}}</td>
						<td>{{$observaciongeneral->tipoobservacion}}</td>
						<td>{{$observaciongeneral->observacion}}</td>
					@else
					@endif
				</tr>
				@endforeach
			</table>
		</div>
		{{$calificaciones->render()}}
		{{$notasgenerales->render()}}
		{{$observacionesgenerales->render()}}
	</div>
</div>
@endsection