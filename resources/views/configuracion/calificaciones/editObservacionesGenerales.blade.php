@extends('layouts.admin')
@section('contenido')
	@php($tr=0)
	@php($peri=0)
	@foreach($perio as $pee)
		@if($pee->pe_estado==0)
			@php($peri++)
		@endif
		@foreach($cali as $cal)
			@if($pee->pe_idPeriodo==$cal->ca_idPeriodoFK && $pee->pe_estado==1)
				@php($tr++)
			@endif
		@endforeach
	@endforeach
	@if($tr!=0)
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			@foreach($estudiantes as $es)
				@if($es->es_idEstudiante==$observacionesgenerales->og_idEstudianteFK)
					<h3>Editar Nota del Estudiante: {{$es->es_nombre}} {{$es->es_apellido}}</h3>
				@endif
			@endforeach
			@include('errores/errores')
		</div>
	</div>
			{!!Form::model($observacionesgenerales,['method'=>'PATCH','route'=>['observacionesgenerales.update',$observacionesgenerales->og_idObservacionGeneral]])!!}
			{{Form::token()}}
				<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover text-center">
						<thead>
							<!--Observaciones-->
							<th>Año</th>
							<th>Estudiante</th>
							<th>Periodo</th>
							<th>Observacion</th>
						</thead>
						<tbody>
							<tbody>
							<tr>
							<th class="text-center" scope="row">
								<input type="hidden" name="og_anioCalificacion" value="{{ $observacionesgenerales->og_anioCalificacion }}">
								{{ $observacionesgenerales->og_anioCalificacion }}
							</th>

							@foreach($estudiantes as $es)
								@if($es->es_idEstudiante==$observacionesgenerales->og_idEstudianteFK)
									<th class="text-center" scope="row">
										<input type="hidden" name="og_idEstudianteFK" value="{{ $observacionesgenerales->og_idEstudianteFK }}">
										{{ $es->es_nombre }} {{ $es->es_apellido }}
									</th>
								@endif
							@endforeach
				
							@foreach($periodos as $pe)
								<th class="text-center" scope="row">
									<input type="hidden" name="og_idPeriodoFK" value="{{ $observacionesgenerales->og_idPeriodoFK }}">
									{{ $pe->pe_nombre }}
								</th>
							@endforeach

							<td class="text-center">
								<div class="col-lg-11 col-sm-11 col-md-11 col-xs-11">
									<div class="form-group">
										<select name="og_idObservacionesFK" class="form-control text-center">
											<optgroup label="Fortalezas">
												@foreach($observaciones as $ob)
													@if($observacionesgenerales->og_idObservacionesFK==$ob->ob_idObservaciones)
														@if($ob->ob_idObservaciones==1)
															<option value="{{$ob->ob_idObservaciones}}" selected>{{$ob->ob_descripcion}}</option>
														@endif
													@else
														@if($ob->ob_idObservaciones==1)
															<option value="{{$ob->ob_idObservaciones}}">{{$ob->ob_descripcion}}</option>
														@endif
													@endif
												@endforeach
											</optgroup>
											<optgroup label="Debilidades">
												@foreach($observaciones as $ob)
													@if($observacionesgenerales->og_idObservacionesFK==$ob->ob_idObservaciones)
														@if($ob->ob_idObservaciones==2)
															<option value="{{$ob->ob_idObservaciones}}" selected>{{$ob->ob_descripcion}}</option>
														@endif
													@else
														@if($ob->ob_idObservaciones==2)
															<option value="{{$ob->ob_idObservaciones}}">{{$ob->ob_descripcion}}</option>
														@endif
													@endif
												@endforeach
											</optgroup>
										</select>
									</div>
								</div>
							</td>
								</tr>
						</tbody>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<button class="btn btn-primary" type="sumbmit">Agregar</button>
					<button class="btn btn-danger" type="reset">Borrar</button>
				</div>
			</div>
			{!!Form::close()!!}
	@elseif($user=Auth::user()->us_idRolFK==2)
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			@foreach($estudiantes as $es)
				@if($es->es_idEstudiante==$observacionesgenerales->og_idEstudianteFK)
					<h3>Editar Nota del Estudiante: {{$es->es_nombre}} {{$es->es_apellido}}</h3>
				@endif
			@endforeach
			@include('errores/errores')
		</div>
	</div>
			{!!Form::model($observacionesgenerales,['method'=>'PATCH','route'=>['observacionesgenerales.update',$observacionesgenerales->og_idObservacionGeneral]])!!}
			{{Form::token()}}
				<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-condensed table-hover text-center">
						<thead>
							<!--Observaciones-->
							<th>Estudiante</th>
							<th>Periodo</th>
							<th>Observacion</th>
						</thead>
						<tbody>
							<tbody>
							<tr>
							@foreach($estudiantes as $es)
								@if($es->es_idEstudiante==$observacionesgenerales->og_idEstudianteFK)
									<th class="text-center" scope="row">
										<input type="hidden" name="og_idEstudianteFK" value="{{ $observacionesgenerales->og_idEstudianteFK }}">
										{{ $es->es_nombre }} {{ $es->es_apellido }}
									</th>
								@endif
							@endforeach
				
							@foreach($perio as $pe)
								@if($pe->pe_idPeriodo==$observacionesgenerales->og_idPeriodoFK)
									<th class="text-center" scope="row">
										<input type="hidden" name="og_idPeriodoFK" value="{{ $observacionesgenerales->og_idPeriodoFK }}">
										{{ $pe->pe_nombre }}
									</th>
								@endif
							@endforeach

							<td class="text-center">
								<div class="col-lg-11 col-sm-11 col-md-11 col-xs-11">
									<div class="form-group">
										<select name="og_idObservacionesFK" class="form-control text-center">
											<optgroup label="Fortalezas">
												@foreach($observaciones as $ob)
													@if($observacionesgenerales->og_idObservacionesFK==$ob->ob_idObservaciones)
														@if($ob->ob_idObservaciones==1)
															<option value="{{$ob->ob_idObservaciones}}" selected>{{$ob->ob_descripcion}}</option>
														@endif
													@else
														@if($ob->ob_idObservaciones==1)
															<option value="{{$ob->ob_idObservaciones}}">{{$ob->ob_descripcion}}</option>
														@endif
													@endif
												@endforeach
											</optgroup>
											<optgroup label="Debilidades">
												@foreach($observaciones as $ob)
													@if($observacionesgenerales->og_idObservacionesFK==$ob->ob_idObservaciones)
														@if($ob->ob_idObservaciones==2)
															<option value="{{$ob->ob_idObservaciones}}" selected>{{$ob->ob_descripcion}}</option>
														@endif
													@else
														@if($ob->ob_idObservaciones==2)
															<option value="{{$ob->ob_idObservaciones}}">{{$ob->ob_descripcion}}</option>
														@endif
													@endif
												@endforeach
											</optgroup>
										</select>
									</div>
								</div>
							</td>
								</tr>
						</tbody>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<button class="btn btn-primary" type="sumbmit">Agregar</button>
					<button class="btn btn-danger" type="reset">Borrar</button>
				</div>
			</div>
			{!!Form::close()!!}
	@else
	<div class="container">
		    <div class="row">
		        <div class="col-md-8 col-md-offset-2">
		            <div class="panel panel-danger text-center">
		                <div class="panel-heading">Usted no tiene acceso a esta sección</div>

		                <div class="panel-body">
		                    <img src="/imagenes/candado.jpg" class="img-responsive center-block">
		                </div>
		            </div>
		        </div>
		    </div>
		</div>
	@endif
@endsection