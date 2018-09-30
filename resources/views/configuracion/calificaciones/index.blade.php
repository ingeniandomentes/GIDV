@extends('layouts.admin')
@section('contenido')
@include('success.success')
@php($tr=0)
@php($peri=0)
@php($calific=0)
@foreach($periodos as $pee)
	@if($pee->pe_estado==0)
		@php($peri++)
	@endif
	@foreach($calificaciones as $cal)
		@php($calific++)
		@if($pee->pe_nombre==$cal->periodo && $pee->pe_estado==1)
			@php($tr++)
		@endif
	@endforeach
@endforeach

<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de calificaciones 
			<a href="calificaciones/create">
			@if($peri!=4)
				@if($tr==0 && $user=Auth::user()->us_idRolFK==3)
				<button class="btn btn-success">Nuevo</button>
				@endif
			@endif
			</a>
		</h3>
		@include('configuracion.calificaciones.search')
	</div>
</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover text-center">
				@if($calific!=0)
				<thead>
					<!--Calificaciones-->
					<th>Id Calificacion</th>
					<th>Año</th>
					<th>Estudiante</th>
					<th>Periodo</th>
					<th>Materia</th>
					<th>Proceso</th>
					<th>Competencia</th>
					<th>Nota Competencia</th>
					@if($tr!=0)
						<th>Opciones</th>
					@elseif($user=Auth::user()->us_idRolFK==2)
						<th>Opciones</th>
					@endif
				</thead>
				@endif
				@foreach($periodos as $pe)
				@php($per=$pe->pe_nombre)
				@endforeach
				@foreach($calificaciones as $calificacion)
				<tr>
					@if($user=Auth::user()->us_idRolFK==3)
						<td>{{$calificacion->ca_idCalificacion}}</td>
						<td>{{$calificacion->ca_anioCalificacion}}</td>
						<td>{{$calificacion->nombreEs}} {{$calificacion->apellidoEs}}</td>
						<td>{{$calificacion->periodo}}</td>
						<td>{{$calificacion->materia}}</td>
						<td>{{$calificacion->proceso}}</td>
						<td>{{$calificacion->competencia}}</td>
						<td>{{$calificacion->nota}}</td>
						@if($tr!=0)
						<td>
							<a href="{{URL::action('CalificacionesController@edit',$calificacion->ca_idCalificacion)}}"><button class="btn btn-info">Editar</button></a>
						</td>
						@else
						@endif
					@elseif($user=Auth::user()->us_idRolFK==1 || $user=Auth::user()->us_idRolFK==2)
						<td>{{$calificacion->ca_idCalificacion}}</td>
						<td>{{$calificacion->ca_anioCalificacion}}</td>
						<td>{{$calificacion->nombreEs}} {{$calificacion->apellidoEs}}</td>
						<td>{{$calificacion->periodo}}</td>
						<td>{{$calificacion->materia}}</td>
						<td>{{$calificacion->proceso}}</td>
						<td>{{$calificacion->competencia}}</td>
						<td>{{$calificacion->nota}}</td>
						<td>
							<a href="{{URL::action('CalificacionesController@edit',$calificacion->ca_idCalificacion)}}"><button class="btn btn-info">Editar</button></a>
							</td>
					@else
					@endif
				</tr>
				@endforeach
			</table>
		</div>
		{{$calificaciones->render()}}
	</div>
</div>
<!--Notas Generales-->
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover text-center">
				@if($calific!=0)
				<thead>
					<!--Notas Generales-->
					<th>Id Nota General</th>
					<th>Estudiante</th>
					<th>Periodo</th>
					<th>Docente</th>
					<th>Materia</th>
					<th>Fallas</th>
					<th>Nota General</th>
					@if($tr!=0)
						<th>Opciones</th>
					@elseif($user=Auth::user()->us_idRolFK==2)
						<th>Opciones</th>
					@endif
				</thead>
				@endif
				@foreach($notasgenerales as $notageneral)
				<tr>
					@if($user=Auth::user()->us_idRolFK==3)
						<td>{{$notageneral->ng_idNotaGeneral}}</td>
						<td>{{$notageneral->nombreEs}} {{$notageneral->apellidoEs}}</td>
						<td>{{$notageneral->periodo}}</td>
						<td>{{$notageneral->docente1}} {{$notageneral->docente2}}</td>
						<td>{{$notageneral->materia}}</td>
						<td>{{$notageneral->ng_fallas}}</td>
						<td>{{$notageneral->nota}}</td>
						@if($tr!=0)
						<td>
							<a href="{{URL::action('NotasGeneralesController@edit',$notageneral->ng_idNotaGeneral)}}"><button class="btn btn-info">Editar</button></a>
						</td>
						@else
						@endif
					@elseif($user=Auth::user()->us_idRolFK==1 || $user=Auth::user()->us_idRolFK==2)
						<td>{{$notageneral->ng_idNotaGeneral}}</td>
						<td>{{$notageneral->nombreEs}} {{$notageneral->apellidoEs}}</td>
						<td>{{$notageneral->periodo}}</td>
						<td>{{$notageneral->docente1}} {{$notageneral->docente2}}</td>
						<td>{{$notageneral->materia}}</td>
						<td>{{$notageneral->ng_fallas}}</td>
						<td>{{$notageneral->nota}}</td>
						<td>
							<a href="{{URL::action('NotasGeneralesController@edit',$notageneral->ng_idNotaGeneral)}}"><button class="btn btn-info">Editar</button></a>
						</td>
					@else
					@endif
				</tr>
				@endforeach
			</table>
		</div>
		{{$notasgenerales->render()}}
	</div>
</div>
<!--Observaciones-->
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover text-center">
				@if($calific!=0)
				<thead>
					<!--Observaciones-->
					<th>Id Observacion</th>
					<th>Estudiante</th>
					<th>Periodo</th>
					<th>Observacion</th>
					@if($tr!=0)
						<th>Opciones</th>
					@elseif($user=Auth::user()->us_idRolFK==2)
						<th>Opciones</th>
					@endif
				</thead>
				@endif
				@foreach($observacionesgenerales as $observaciongeneral)
				<tr>
					@if($user=Auth::user()->us_idRolFK==3)
						<td>{{$observaciongeneral->og_idObservacionGeneral}}</td>
						<td>{{$observaciongeneral->nombreEs}} {{$observaciongeneral->apellidoEs}}</td>
						<td>{{$observaciongeneral->periodo}}</td>
						<td>{{$observaciongeneral->observacion}}</td>
						@if($tr!=0)
						<td>
							<a href="{{URL::action('ObservacionesGeneralesController@edit',$observaciongeneral->og_idObservacionGeneral)}}"><button class="btn btn-info">Editar</button></a>
						</td>
						@else
						@endif
					@elseif($user=Auth::user()->us_idRolFK==1 || $user=Auth::user()->us_idRolFK==2)
						<td>{{$observaciongeneral->og_idObservacionGeneral}}</td>
						<td>{{$observaciongeneral->nombreEs}} {{$observaciongeneral->apellidoEs}}</td>
						<td>{{$observaciongeneral->periodo}}</td>
						<td>{{$observaciongeneral->observacion}}</td>
						<td>
							<a href="{{URL::action('ObservacionesGeneralesController@edit',$observaciongeneral->og_idObservacionGeneral)}}"><button class="btn btn-info">Editar</button></a>
						</td>
					@else
					@endif
				</tr>
				@endforeach
			</table>
		</div>
		{{$observacionesgenerales->render()}}
	</div>
</div>
@endsection