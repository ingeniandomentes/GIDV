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
					<select name="ca_idPeriodoFK[]" id="ca_idPeriodoFK" class="form-control" onchange="anio();cambio()" required>
						<option value="0" selected>Elije una opción</option>
						@foreach($periodos as $periodo)
						<option value="{{$periodo->pe_idPeriodo}}">{{$periodo->pe_nombre}}</option>
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6" id="anio">
				<div class="form-group">
					<label for="ca_anioCalificacion">Elija el Año</label>
					<select name="ca_anioCalificacion[]" id="ca_anioCalificacion" class="form-control" onchange="calificaciones();" required>
						<option value="0" selected>Elije una opción</option>
						<option value="2018">2018</option>
					</select>
				</div>
			</div>

	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div id="calificaciones">
					<div class="table-responsive">
					<h1>Calificaciones por Competencias</h1>
					<!--class="table table-striped table-bordered table-condensed table-hover"-->
					<table  border>
						<thead>
						<tr>
						<th scope="col"></th>
						@foreach($periodos as $periodo)
							@foreach($materias as $ma)
								@foreach($procesos as $pro)
									@if($ma->ma_idMateria==$pro->pro_idMateriaFK && $pro->pro_idPeriodoFK==$periodo->pe_idPeriodo && $pro->pro_idGradoFK==Auth::user()->us_idGradoFK)
										@foreach($competencias as $co)
												@if($co->co_idProcesoFK==$pro->pro_idProceso)
													@php($mat=$mat+1)
												@endif
										@endforeach
									@endif
								@endforeach
							@endforeach
						@endforeach
						<th colspan="{{ $mat }}" class="text-center" scope="col">Materias</th>
						</tr>
						</thead>
						<thead>
							<tr>
							<th></th>
							@foreach($periodos as $periodo)
								@foreach($materias as $ma)
									@foreach($procesos as $pro)
										@if($ma->ma_idMateria==$pro->pro_idMateriaFK && $pro->pro_idPeriodoFK==$periodo->pe_idPeriodo && $pro->pro_idGradoFK==Auth::user()->us_idGradoFK)
											@foreach($competencias as $co)
													@if($co->co_idProcesoFK==$pro->pro_idProceso)
													@php($cont=$cont+1)
													@endif
											@endforeach
											<th class="text-center" colspan="{{ $cont }}" scope="col">
												<input type="hidden" name="ca_idMateriaFK[]" value="{{ $ma->ma_idMateria}}">
												{{ $ma->ma_nombre }}
												<!--
												<select class="se" name="ca_idMateriaFK" id="ca_idMateriaFK" readonly>
													<option value="{{ $ma->ma_idMateria}}">{{ $ma->ma_nombre }}</option>
												</select>-->
											</th>
										@endif
									@php($cont=0)
									@endforeach
								@endforeach
							@endforeach
							</tr>
						</thead>
						<thead>
							<tr>
							<th class="text-center" scope="col">Procesos</th>
						@foreach($periodos as $periodo)
							@foreach($materias as $ma)
								@foreach($procesos as $pro)
									@if($ma->ma_idMateria==$pro->pro_idMateriaFK && $pro->pro_idPeriodoFK==$periodo->pe_idPeriodo && $pro->pro_idGradoFK==Auth::user()->us_idGradoFK)
										@foreach($competencias as $co)
												@if($co->co_idProcesoFK==$pro->pro_idProceso)
												@php($cont=$cont+1)
												@endif
										@endforeach
										<th class="text-center" colspan="{{ $cont }}" scope="col">
											<input type="hidden" name="ca_idProcesoFK[]" value="{{ $pro->pro_idProceso }}">
											{{ $pro->pro_nombre }}
											<!--
											<select class="se2" name="ca_idProcesoFK" id="ca_idProcesoFK" readonly>
												<option class="opt" value="{{ $pro->pro_idProceso }}">{{ $pro->pro_nombre }}</option>
											</select>-->
										</th>	
									@endif
								@php($cont=0)
								@endforeach
							@endforeach
						@endforeach
						</tr>
						</thead>
						<thead>
						<tr>
						<th scope="col">Competencias</th>
						@foreach($periodos as $periodo)
							@foreach($materias as $ma)
								@foreach($procesos as $pro)
									@if($ma->ma_idMateria==$pro->pro_idMateriaFK && $pro->pro_idPeriodoFK==$periodo->pe_idPeriodo && $pro->pro_idGradoFK==Auth::user()->us_idGradoFK)
										@foreach($competencias as $co)
											@if($co->co_idProcesoFK==$pro->pro_idProceso)
											@php($cont=$cont+1)
												<th class="text-center" scope="col">
													<input type="hidden" name="ca_idCompetenciaFK[]" value="{{ $co->co_idCompetencia }}">
													<!--
													<select class="se4" name="ca_idCompetenciaFK" id="ca_idCompetenciaFK" readonly>
														<option class="text-center" value="{{ $co->co_idCompetencia }}">{{ $cont }}°</option>
													</select>-->
													{{ $cont }}° <span class="glyphicon glyphicon-info-sign" title="{{ $co->co_descripcion }}"></span>
												</th>
											@endif
										@endforeach
										@php($cont=0)
									@endif
								@endforeach
							@endforeach
						@endforeach
						</tr>
						</thead>
						<tbody>
							@foreach($estudiantes as $es)
								@if($es->es_idCursoFK==Auth::user()->us_idCursoFK)
								<tr>
									<th class="text-center" scope="row">
										<input type="hidden" name="ca_idEstudianteFK[]" value="{{ $es->es_idEstudiante }}">
										{{ $es->es_nombre }} {{ $es->es_apellido }}
										<!--
										<select class="se4" name="estudiante" id="estudiante" readonly>
											<option class="text-center" value="{{ $es->es_idEstudiante }}">{{ $es->es_nombre }} {{ $es->es_apellido }}</option>
										</select>-->
									</th>
									@foreach($periodos as $periodo)
										@foreach($materias as $ma)
											@foreach($procesos as $pro)
												@if($ma->ma_idMateria==$pro->pro_idMateriaFK && $pro->pro_idPeriodoFK==$periodo->pe_idPeriodo && $pro->pro_idGradoFK==Auth::user()->us_idGradoFK)
													@foreach($competencias as $co)
														@if($co->co_idProcesoFK==$pro->pro_idProceso)
														@php($cont=$cont+1)
															<td class="text-center">
																<div class="col-lg-11 col-sm-11 col-md-11 col-xs-11" style="text-align:center;">
																	<div class="form-group">
																		<select name="ca_idNotaFK[]" id="ca_idNotaFK" class="se3 text-center">
																			@foreach($notas as $nt)
																			@if($nt->no_idNota==2)
																			<option value="{{$nt->no_idNota}}" selected>{{$nt->no_nombre}}</option>
																			@else
																			<option value="{{$nt->no_idNota}}">{{$nt->no_nombre}}</option>
																			@endif
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
									@endforeach
								</tr>
								@endif
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="text-center arriba col-lg-2 col-sm-2 col-md-2 col-xs-2 panel panel-primary">
					<span class="form-group">
						<label onclick="calificacionesf()" style="cursor: pointer;">Siguiente</label>
					</span>
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
								@php($mat=$mat+1)
						<th colspan="{{ $mat }}" class="text-center" scope="col">Materias</th>
						</tr>
						</thead>
						<thead>
							<tr>
							<th class="text-center">Docentes</th>
								@foreach($materias as $ma)
									@foreach($users as $us)
									@if($us->id==$ma->ma_docenteAsignadoFK)
										<th class="text-center" scope="col" colspan="2">
													<input type="hidden" name="ca_idUsuarioFK[]" value="{{ $us->id }}">
													{{ $us->name }} {{ $us->us_apellido }}
										</th>
									@endif
									@endforeach
								@endforeach
							</tr>
						</thead>
						<thead>
							<tr>
							<th></th>
							@foreach($materias as $ma)
								<th class="text-center" scope="col">
									<input type="hidden" name="ng_idMateriaFK[]" value="{{ $ma->ma_idMateria }}">
									{{ $ma->ma_nombre }}
									<!--
									<select class="se" name="ng_idMateriaFK" id="ng_idMateriaFK" readonly>
										<option value="{{ $ma->ma_idMateria }}">{{ $ma->ma_nombre }}</option>
									</select>-->
								</th>
								<th class="text-center" rowspan="2">Fallas</th>
							@endforeach
							<th class="text-center" scope="col"></th>
							</tr>
						</thead>
						<tbody>
							@foreach($estudiantes as $es)
								@if($es->es_idCursoFK==Auth::user()->us_idCursoFK)
								<tr>
									<th class="text-center" scope="row">
										<input type="hidden" name="ng_idEstudianteFK[]" value="{{ $es->es_idEstudiante }}">
										{{ $es->es_nombre }} {{ $es->es_apellido }}
										<!--
										<select class="se4" name="estudianteN" id="estudianteN" readonly>
											<option class="text-center" value="{{ $es->es_idEstudiante }}">{{ $es->es_nombre }} {{ $es->es_apellido }}</option>
										</select>-->
									</th>
									@foreach($materias as $ma)
										<td class="text-center">
											<div class="col-lg-11 col-sm-11 col-md-11 col-xs-11" style="text-align:center;">
												<div class="form-group">
													<select name="ng_idNotaFK[]" id="ng_idNotaFK" class="se3 text-center">
														@foreach($notas as $nt)
														@if($nt->no_idNota==2)
														<option value="{{$nt->no_idNota}}" selected>{{$nt->no_nombre}}</option>
														@else
														<option value="{{$nt->no_idNota}}">{{$nt->no_nombre}}</option>
														@endif
														@endforeach
													</select>
												</div>
											</div>
										</td>
										<td>
											<input  class="size5 text-center" type="number" min="0" value="0" name="ng_fallas[]" id="ng_fallas">
										</td>
									@endforeach
								</tr>
								@endif
							@endforeach
						</tbody>
					</table>
					<div class="text-center arriba col-lg-2 col-sm-2 col-md-2 col-xs-2 panel panel-primary">
						<span class="form-group">
							<label onclick="observaciones()"style="cursor: pointer;">Siguiente</label>
						</span>
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

						<thead>
						<tr>
						<th scope="col"></th>
						<th class="text-center" scope="col">Fortalezas</th>
						<th class="text-center" scope="col">Debilidades<span class="glyphicon glyphicon-info-sign" title="Nota: Las debilidades son opcionales"></span></th>
						</tr>
						</thead>

						<tbody>
							@foreach($estudiantes as $es)
								@if($es->es_idCursoFK==Auth::user()->us_idCursoFK)
								<tr>
									<th class="text-center" scope="row">
										<input type="hidden" name="og_idEstudianteFK[]" value="{{ $es->es_idEstudiante }}">
										{{ $es->es_nombre }} {{ $es->es_apellido }}
										<!--
										<select class="se4" name="estudianteO" id="estudianteO" readonly>
											<option class="text-center" value="{{ $es->es_idEstudiante }}">{{ $es->es_nombre }} {{ $es->es_apellido }}</option>
										</select>-->
									</th>
									<td class="text-center">
										<div class="col-lg-11 col-sm-11 col-md-11 col-xs-11">
											<div class="form-group size3">
												<select name="og_idObservacionesFK[]" class="form-control text-center">
													<option value="0">Elija una opción</option>
													<optgroup label="Fortalezas">
														@foreach($observaciones as $ob)
															<!--<option value="{{$ob->ob_idObservaciones}}">{{$ob->ob_descripcion}}</option>-->
															@if($ob->ob_idTipoObservacionFK==1)
																<option value="{{$ob->ob_idObservaciones}}">{{$ob->ob_descripcion}}</option>
																<input type="hidden" name="og_idTipoObservacionFK[]" value="{{$ob->ob_idTipoObservacionFK}}">
															@endif
														@endforeach
													</optgroup>
												</select>
											</div>
										</div>
									</td>
									<td class="text-center">
										<div class="col-lg-11 col-sm-11 col-md-11 col-xs-11">
											<div class="form-group size3">
												<select name="og_idObservacionesFK[]" class="form-control text-center">
													<option value="0">Elija una opción</option>
													<optgroup label="Debilidades">
														@foreach($observaciones as $ob)
															@if($ob->ob_idTipoObservacionFK==2)
																<option value="{{$ob->ob_idObservaciones}}">{{$ob->ob_descripcion}}</option>
																<input type="hidden" name="og_idTipoObservacionFK[]" value="{{$ob->ob_idTipoObservacionFK}}">
															@endif
														@endforeach
													</optgroup>
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