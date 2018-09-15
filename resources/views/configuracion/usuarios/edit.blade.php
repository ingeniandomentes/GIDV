@extends('layouts.admin')
@section('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3>Editar Usuario {{$usuarios->name}} {{$usuarios->us_apellido}}</h3>
			@include('errores/errores')
		</div>
	</div>
			{!!Form::model($usuarios,['method'=>'PATCH','route'=>['usuarios.update',$usuarios->id],'files'=>'true'])!!}
			{{Form::token()}}
		<div class="row">
			@if($usuarios->us_estado==1)
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
	                <label for="email">Correo Electronico</label>
	                <input id="email" type="email" class="form-control" name="email" value="{{$usuarios->email}}">
	            </div>
       		</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label for="password">Contraseña</label>
					<input type="password" name="password" class="form-control" value="{{$usuarios->password}}">
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			 	<div class="form-group">
	                <label for="password-confirm">Confirmar Contraseña</label>
	                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{$usuarios->password}}">
	            </div>
        	</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label for="name">Nombre(s)</label>
					<input type="text" name="name" class="form-control" value="{{$usuarios->name}}">
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label for="us_apellido">Apellidos</label>
					<input type="text" name="us_apellido" class="form-control" value="{{$usuarios->us_apellido}}">
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label for="us_idDocumentoFK">Tipo Documento</label>
					<select name="us_idDocumentoFK" class="form-control">
						<option value="0">Elije una opción</option>
						@foreach($tipodocumentos as $td)
						@if($td->td_idDocumento==$usuarios->us_idDocumentoFK)
						<option value="{{$td->td_idDocumento}}" selected>{{$td->td_nombre}}</option>
						@else
						<option value="{{$td->td_idDocumento}}">{{$td->td_nombre}}</option>
						@endif
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label for="us_numeroDocumento">Numero Documento</label>
					<input type="text" name="us_numeroDocumento" class="form-control" value="{{$usuarios->us_numeroDocumento}}">
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label for="us_idRolFK">Rol</label>
					<select name="us_idRolFK" class="form-control">
						<!--@foreach($roles as $rol)
						@if($rol->ro_idRol==$usuarios->us_idRolFK)
						<option value="{{$rol->ro_idRol}}" selected>{{$rol->ro_nombre}}</option>
						@else
						<option value="{{$rol->ro_idRol}}">{{$rol->ro_nombre}}</option>
						@endif
						@endforeach-->
					@if($rol=Auth::user()->us_idRolFK==1)
					<option value="0">Elije una opción</option>
					<option value="1" selected>Administrador</option>
					@else($rol=Auth::user()->us_idRolFK==2)					
					@if($usuarios->us_idRolFK == 2)
					<option value="0">Elije una opción</option>
					<option value="2" selected>Directivo</option>
					<option value="3">Profesor</option>
					@else
					<option value="0">Elije una opción</option>
					<option value="2">Directivo</option>
					<option value="3" selected>Profesor</option>
					@endif
					@endif
					</select>
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label for="us_idCursoFK">Curso</label>
					<select name="us_idCursoFK" class="form-control">
						<option value="0">Elije una opción</option>
						@foreach($cursos as $curso)
							@if($curso->cu_idCurso==$usuarios->us_idCursoFK)
							<option value="{{$curso->cu_idCurso}}"  selected>{{$curso->cu_nombre}}</option>
							@else
							<option value="{{$curso->cu_idCurso}}">{{$curso->cu_nombre}}</option>
							@endif
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label for="us_estado">Estado</label>
					<select name="us_estado" class="form-control">
						<option value="1" selected>Activo</option>
					</select>
				</div>
			</div>
	@else
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
	                <label for="email">Correo Electronico</label>
	                <input id="email" type="email" class="form-control" name="email" value="{{$usuarios->email}}" readonly>
	            </div>
       		</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label for="password">Contraseña</label>
					<input type="password" name="password" class="form-control" value="{{$usuarios->password}}" readonly>
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			 	<div class="form-group">
	                <label for="password-confirm">Confirmar Contraseña</label>
	                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{$usuarios->password}}" readonly>
	            </div>
        	</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label for="name">Nombre(s)</label>
					<input type="text" name="name" class="form-control" value="{{$usuarios->name}}" readonly>
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label for="us_apellido">Apellidos</label>
					<input type="text" name="us_apellido" class="form-control" value="{{$usuarios->us_apellido}}" readonly>
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label for="us_idDocumentoFK">Tipo Documento</label>
					<select name="us_idDocumentoFK" class="form-control" readonly>
						<option value="0">Elije una opción</option>
						@foreach($tipodocumentos as $td)
						@if($td->td_idDocumento==$usuarios->us_idDocumentoFK)
						<option value="{{$td->td_idDocumento}}" selected>{{$td->td_nombre}}</option>
						@else
						<option value="{{$td->td_idDocumento}}">{{$td->td_nombre}}</option>
						@endif
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label for="us_numeroDocumento">Numero Documento</label>
					<input type="text" name="us_numeroDocumento" class="form-control" value="{{$usuarios->us_numeroDocumento}}" readonly>
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label for="us_idRolFK">Rol</label>
					<select name="us_idRolFK" class="form-control" readonly>
						@foreach($roles as $rol)
						@if($rol->ro_idRol==$usuarios->us_idRolFK)
						<option value="{{$rol->ro_idRol}}" selected>{{$rol->ro_nombre}}</option>
						@else
						<option value="{{$rol->ro_idRol}}">{{$rol->ro_nombre}}</option>
						@endif
						@endforeach
					</select>
				</div>
			</div>

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label for="us_idCursoFK">Curso</label>
					<select name="us_idCursoFK" class="form-control" readonly>
						@foreach($cursos as $curso)
							@if($curso->cu_idCurso==$usuarios->us_idCursoFK)
							<option value="{{$curso->cu_idCurso}}"  selected>{{$curso->cu_nombre}}</option>
							@else
							<option value="{{$curso->cu_idCurso}}">{{$curso->cu_nombre}}</option>
							@endif
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
				<div class="form-group">
					<label for="us_estado">Estado</label>
					<select name="us_estado" class="form-control">
						<option value="1">Activo</option>
						<option value="0" selected>Inactivo</option>
					</select>
				</div>
			</div>
		@endif
		</div>
		<div class="form-group">
			<button class="btn btn-primary" type="sumbmit">Agregar</button>
			<button class="btn btn-danger" type="reset">Borrar</button>
		</div>
	{!!Form::close()!!}
@endsection