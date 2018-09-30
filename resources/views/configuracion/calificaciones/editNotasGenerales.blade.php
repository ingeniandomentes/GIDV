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
				@if($es->es_idEstudiante==$notasgenerales->ng_idEstudianteFK)
					<h3>Editar Nota del Estudiante: {{$es->es_nombre}} {{$es->es_apellido}}</h3>
				@endif
			@endforeach
			@include('errores/errores')
		</div>
	</div>
			{!!Form::model($notasgenerales,['method'=>'PATCH','route'=>['notasgenerales.update',$notasgenerales->ng_idNotaGeneral]])!!}
			{{Form::token()}}
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="table-responsive">
						<h1>Calificaciones Finales</h1>
						<table class="table table-striped table-bordered table-condensed table-hover text-center">
							<thead>
								<!--Notas Generales-->
								<th>Estudiante</th>
								<th>Periodo</th>
								<th>Docente</th>
								<th>Materia</th>
								<th>Fallas</th>
								<th>Nota General</th>
							</thead>
						<tbody>
						<tr>
							@foreach($estudiantes as $es)
								@if($es->es_idCursoFK==Auth::user()->us_idCursoFK)
									<th class="text-center" scope="row">
										<input type="hidden" name="ng_idEstudianteFK" value="{{ $notasgenerales->ng_idEstudianteFK }}">
										{{ $es->es_nombre }} {{ $es->es_apellido }}
									</th>
								@endif
							@endforeach

							@foreach($periodos as $pe)
								@if($pe->pe_idPeriodo==$notasgenerales->ng_idPeriodoFK)
									<th class="text-center" scope="col">
										<input type="hidden" name="ng_idPeriodoFK" value="{{ $notasgenerales->ng_idPeriodoFK }}">
										{{ $pe->pe_nombre }}
									</th>
								@endif
							@endforeach

							@foreach($users as $us)
								@if($us->id==$notasgenerales->ng_idUsuarioFK)
									<th class="text-center" scope="col">
										<input type="hidden" name="ng_idUsuarioFK" value="{{ $notasgenerales->ng_idUsuarioFK }}">
										{{ $us->name }} {{ $us->us_apellido }}
									</th>
								@endif
							@endforeach

							@foreach($materias as $ma)
								@if($ma->ma_idMateria == $notasgenerales->ng_idMateriaFK)
									<th class="text-center" scope="col">
										<input type="hidden" name="ng_idMateriaFK" value="{{ $notasgenerales->ng_idMateriaFK }}">
										{{ $ma->ma_nombre }}
									</th>
								@endif
							@endforeach

							<td>
								<input  class="size5 text-center" type="number" min="0" value="{{ $notasgenerales->ng_fallas }}" name="ng_fallas" id="ng_fallas">
							</td>

							<td class="text-center">
								<div class="col-lg-11 col-sm-11 col-md-11 col-xs-11" style="text-align:center;">
									<div class="form-group">
										<select name="ng_idNotaFK" id="ng_idNotaFK" class="se3 text-center">
											@foreach($notas as $nt)
											@if($nt->no_idNota==$notasgenerales->ng_idNotaFK)
											<option value="{{$nt->no_idNota}}" selected>{{$nt->no_nombre}}</option>
											@else
											<option value="{{$nt->no_idNota}}">{{$nt->no_nombre}}</option>
											@endif
											@endforeach
										</select>
									</div>
								</div>
							</td>

							</tr>
						</tbody>
					</table>
					<br>
				</div>
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
	Holis
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			@foreach($estudiantes as $es)
				@if($es->es_idEstudiante==$notasgenerales->ng_idEstudianteFK)
					<h3>Editar Nota del Estudiante: {{$es->es_nombre}} {{$es->es_apellido}}</h3>
				@endif
			@endforeach
			@include('errores/errores')
		</div>
	</div>
			{!!Form::model($notasgenerales,['method'=>'PATCH','route'=>['notasgenerales.update',$notasgenerales->ng_idNotaGeneral]])!!}
			{{Form::token()}}
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="table-responsive">
						<h1>Calificaciones Finales</h1>
						<table class="table table-striped table-bordered table-condensed table-hover text-center">
							<thead>
								<!--Notas Generales-->
								<th>Estudiante</th>
								<th>Periodo</th>
								<th>Docente</th>
								<th>Materia</th>
								<th>Fallas</th>
								<th>Nota General</th>
							</thead>
						<tbody>
						<tr>
							@foreach($estudiantes as $es)
								@if($es->es_idCursoFK==Auth::user()->us_idCursoFK)
									<th class="text-center" scope="row">
										<input type="hidden" name="ng_idEstudianteFK" value="{{ $notasgenerales->ng_idEstudianteFK }}">
										{{ $es->es_nombre }} {{ $es->es_apellido }}
									</th>
								@endif
							@endforeach

							@foreach($perio as $pe)
								@if($pe->pe_idPeriodo==$notasgenerales->ng_idPeriodoFK)
									<th class="text-center" scope="col">
										<input type="hidden" name="ng_idPeriodoFK" value="{{ $notasgenerales->ng_idPeriodoFK }}">
										{{ $pe->pe_nombre }}
									</th>
								@endif
							@endforeach

							@foreach($users as $us)
								@if($us->id==$notasgenerales->ng_idUsuarioFK)
									<th class="text-center" scope="col">
										<input type="hidden" name="ng_idUsuarioFK" value="{{ $notasgenerales->ng_idUsuarioFK }}">
										{{ $us->name }} {{ $us->us_apellido }}
									</th>
								@endif
							@endforeach

							@foreach($materias as $ma)
								@if($ma->ma_idMateria == $notasgenerales->ng_idMateriaFK)
									<th class="text-center" scope="col">
										<input type="hidden" name="ng_idMateriaFK" value="{{ $notasgenerales->ng_idMateriaFK }}">
										{{ $ma->ma_nombre }}
									</th>
								@endif
							@endforeach

							<td>
								<input  class="size5 text-center" type="number" min="0" value="{{ $notasgenerales->ng_fallas }}" name="ng_fallas" id="ng_fallas">
							</td>

							<td class="text-center">
								<div class="col-lg-11 col-sm-11 col-md-11 col-xs-11" style="text-align:center;">
									<div class="form-group">
										<select name="ng_idNotaFK" id="ng_idNotaFK" class="se3 text-center">
											@foreach($notas as $nt)
											@if($nt->no_idNota==$notasgenerales->ng_idNotaFK)
											<option value="{{$nt->no_idNota}}" selected>{{$nt->no_nombre}}</option>
											@else
											<option value="{{$nt->no_idNota}}">{{$nt->no_nombre}}</option>
											@endif
											@endforeach
										</select>
									</div>
								</div>
							</td>

							</tr>
						</tbody>
					</table>
					<br>
				</div>
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