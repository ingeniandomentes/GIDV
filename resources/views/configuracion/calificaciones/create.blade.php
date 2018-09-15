@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3>Calificaciones</h3>
			@include('errores/errores')
		</div>
	</div>
	@php($cont=0)
	@php($est=0)
	@php($mat=0)
			{!!Form::open(array('url'=>'calificaciones','method'=>'POST','autocomplete'=>'off','files'=>'true'))!!}
			{{Form::token()}}
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6" id="periodo">
				<div class="form-group">
					<label for="periodo">Elija el Periodo</label>
					<select name="ca_idPeriodoFK" id="ca_idPeriodoFK" class="form-control" onchange="anio();cambio()" required>
						<option value="0" selected>Elije una opción</option>
						@foreach($periodos as $periodo)
						<option value="{{$periodo->pe_idPeriodo}}">{{$periodo->pe_nombre}}</option>
						@endforeach
					</select>
				</div>
			</div>
			@php($periodo=0)
			{{ $periodo }}
			@php($perido=\Request::get('ca_periodoFK'))
			{{ $periodo }}
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6" id="anio">
				<div class="form-group">
					<label for="ca_anioCalificacion">Elija el Año</label>
					<select name="ca_anioCalificacion" id="ca_anioCalificacion" class="form-control" onchange="calificaciones();" required>
						<option value="0" selected>Elije una opción</option>
						<option value="1">2018</option>
					</select>
				</div>
			</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<div id="calificaciones">
					<h1>Calificaciones por Competencias</h1>
					<!--class="table table-striped table-bordered table-condensed table-hover"-->
					<table  border>
						<thead>
						<tr>
						<th scope="col"></th>
								@foreach($materias as $ma)
									@foreach($procesos as $pro)
										@if($ma->ma_idMateria==$pro->pro_idMateriaFK && $pro->pro_idPeriodoFK==2 && $pro->pro_idGradoFK==Auth::user()->us_idGradoFK)
											@foreach($competencias as $co)
													@if($co->co_idProcesoFK==$pro->pro_idProceso)
														@php($mat=$mat+1)
													@endif
											@endforeach
										@endif
									@endforeach
								@endforeach
						<th colspan="{{ $mat }}" class="text-center" scope="col">Materias</th>
						</tr>
						</thead>
						<thead>
							<tr>
							<th></th>
							@foreach($materias as $ma)
								@foreach($procesos as $pro)
									@if($ma->ma_idMateria==$pro->pro_idMateriaFK && $pro->pro_idPeriodoFK==2 && $pro->pro_idGradoFK==Auth::user()->us_idGradoFK)
										@foreach($competencias as $co)
												@if($co->co_idProcesoFK==$pro->pro_idProceso)
												@php($cont=$cont+1)
												@endif
										@endforeach
										<th class="text-center" colspan="{{ $cont }}" scope="col" name="ca_idMateriaFK" id="ca_idMateriaFK" value="{{ $ma->ma_idMateria }}">{{ $ma->ma_nombre }}</th>
									@endif
								@php($cont=0)
								@endforeach
							@endforeach
							</tr>
						</thead>
						<thead>
							<tr>
							<th class="text-center" scope="col">Procesos</th>
						@foreach($materias as $ma)
								@foreach($procesos as $pro)
									@if($ma->ma_idMateria==$pro->pro_idMateriaFK && $pro->pro_idPeriodoFK==2 && $pro->pro_idGradoFK==Auth::user()->us_idGradoFK)
										@foreach($competencias as $co)
												@if($co->co_idProcesoFK==$pro->pro_idProceso)
												@php($cont=$cont+1)
												@endif
										@endforeach
										<th class="text-center" colspan="{{ $cont }}" scope="col" name="ca_idProcesoFK" id="ca_idProcesoFK" value="{{ $pro->pro_idProceso }}">{{ $pro->pro_nombre }}</th>	
									@endif
								@php($cont=0)
								@endforeach
						@endforeach
						</tr>
						</thead>
						<thead>
							<tr>
						<th scope="col">Competencias</th>
						@foreach($materias as $ma)
							@foreach($procesos as $pro)
								@if($ma->ma_idMateria==$pro->pro_idMateriaFK && $pro->pro_idPeriodoFK==2 && $pro->pro_idGradoFK==Auth::user()->us_idGradoFK)
									@foreach($competencias as $co)
										@if($co->co_idProcesoFK==$pro->pro_idProceso)
										@php($cont=$cont+1)
											<th class="text-center" title="{{ $co->co_descripcion }}" scope="col" name="ca_idCompetenciaFK" id="ca_idCompetenciaFK" value="{{ $co->co_idCompetencia }}"><div class="size">{{ $cont }}°</div></th>
										@endif
									@endforeach
									@php($cont=0)
								@endif
							@endforeach
						@endforeach
						</tr>
						</thead>
						<tbody>
							@foreach($estudiantes as $es)
								@if($es->es_idCursoFK==Auth::user()->us_idCursoFK)
								<tr>
									<th class="text-center" scope="row" name="estudiante" id="estudiante" value="{{ $es->es_idEstudiante }}">{{ $es->es_nombre }} {{ $es->es_apellido }}</th>
									@foreach($materias as $ma)
										@foreach($procesos as $pro)
											@if($ma->ma_idMateria==$pro->pro_idMateriaFK && $pro->pro_idPeriodoFK==2 && $pro->pro_idGradoFK==Auth::user()->us_idGradoFK)
												@foreach($competencias as $co)
													@if($co->co_idProcesoFK==$pro->pro_idProceso)
													@php($cont=$cont+1)
														<td>
															<div class="col-lg-11 col-sm-11 col-md-11 col-xs-11">
																<div class="form-group">
																	<select name="ca_idNotaFK" class="form-control text-center">
																		@foreach($notas as $nt)
																		<option value="{{$nt->no_idNota}}">{{$nt->no_nombre}}</option>
																		@endforeach
																	</select>
																</div>
															</div>
														</td>
													@endif
												@endforeach
												@php($cont=0)
											@endif
										@endforeach
									@endforeach
								</tr>
								@endif
							@endforeach
						</tbody>
					</table>
					<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 panel panel-primary">
						<div class="form-group panel-heading mask flex-center rgba-red-strong text-center">
							<label onclick="calificacionesf()" class="text-center" style="cursor: pointer;">Siguiente</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<div id="calificacionesf">
					<h1>Calificaciones Finales</h1>
					<!--class="table table-striped table-bordered table-condensed table-hover"-->
					<table  border>
						<thead>
						<tr>
						<th scope="col"></th>
								@foreach($materias as $ma)
									@php($mat=$mat+1)
								@endforeach
						<th colspan="{{ $mat }}" class="text-center" scope="col">Materias</th>
						</tr>
						</thead>
						<thead>
							<tr>
							<th></th>
							@foreach($materias as $ma)
								<th class="text-center" scope="col" name="ng_idMateriaFK" id="ng_idMateriaFK" value="{{ $ma->ma_idMateria }}"><div class="size2">{{ $ma->ma_nombre }}</div></th>
							@endforeach
							</tr>
						</thead>
						<tbody>
							@foreach($estudiantes as $es)
								@if($es->es_idCursoFK==Auth::user()->us_idCursoFK)
								<tr>
									<th class="text-center" scope="row" name="estudiante" id="estudiante" value="{{ $es->es_idEstudiante }}">{{ $es->es_nombre }} {{ $es->es_apellido }}</th>
									@foreach($materias as $ma)
										<td>
											<div class="col-lg-11 col-sm-11 col-md-11 col-xs-11">
												<div class="form-group">
													<select name="ca_idNotaFK" class="form-control text-center">
														@foreach($notas as $nt)
														<option value="{{$nt->no_idNota}}">{{$nt->no_nombre}}</option>
														@endforeach
													</select>
												</div>
											</div>
										</td>
									@endforeach
								</tr>
								@endif
							@endforeach
						</tbody>
					</table>
					<div class="col-lg-2 col-sm-2 col-md-2 col-xs-2 panel panel-primary">
						<div class="form-group panel-heading mask flex-center rgba-red-strong text-center">
							<label onclick="observaciones()" class="text-center" style="cursor: pointer;">Siguiente</label>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<div id="observaciones">
					<h1>Observaciones</h1>
					<!--class="table table-striped table-bordered table-condensed table-hover"-->
					<table  border>
						<thead>
						<tr>
						<th scope="col"></th>
						<th class="text-center" scope="col" colspan="2">Observaciones</th>
						</tr>
						</thead>
						<tbody>
							@foreach($estudiantes as $es)
								@if($es->es_idCursoFK==Auth::user()->us_idCursoFK)
								<tr>
									<th class="text-center" scope="row" name="estudiante" id="estudiante" value="{{ $es->es_idEstudiante }}">{{ $es->es_nombre }} {{ $es->es_apellido }}</th>
									<td>
										<div class="col-lg-11 col-sm-11 col-md-11 col-xs-11">
											<div class="form-group size3">
												<select name="og_idTipoObservacionFK" class="form-control text-center">
													<option value="0">Elija una opción</option>
													@foreach($tobservaciones as $tob)
													<option value="{{$tob->to_idTipoObservacion}}">{{$tob->to_nombre}}</option>
													@endforeach
												</select>
											</div>
										</div>
									</td>
									<td>
									<div class="col-lg-11 col-sm-11 col-md-11 col-xs-11">
											<div class="form-group size4">
												<select name="og_idObservacionesFK" class="form-control text-center">
													<option value="0">Elija una opción</option>
													@foreach($observaciones as $ob)
													<option value="{{$ob->ob_idObservaciones}}">{{$ob->ob_descripcion}}</option>
													@endforeach
												</select>
											</div>
										</div>
									</td>
								</tr>
								@endif
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
			
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6" id="btnCalificaciones">
			<div class="form-group">
				<button class="btn btn-primary" type="sumbmit">Agregar</button>
				<button class="btn btn-danger" type="reset">Borrar</button>
			</div>
		</div>
			{!!Form::close()!!}
@endsection