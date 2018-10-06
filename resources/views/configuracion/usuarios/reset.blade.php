@extends('layouts.admin')
@section('contenido')
@include('success.error')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
			<h3>Cambio de Contraseña</h3>
			@include('errores/errores')
		</div>
	</div>
	<form method="Post" action="/usuarios/resetUpdate/{{ $usuario->id }}">
	{{-- {!!Form::model($usuarios,['method'=>'PATCH','route'=>['usuarios.resetUpdate',$usuarios->id]])!!}--}}
	{{Form::token()}}
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="mypassword">Contraseña Actual</label>
				<input type="password" name="mypassword" class="form-control" placeholder="Contraseña del usuario">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
			<div class="form-group">
				<label for="password">Nueva Contraseña</label>
				<input type="password" name="password" class="form-control" placeholder="Contraseña del usuario">
			</div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
		 	<div class="form-group">
                <label for="password-confirm">Confirmar Contraseña</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Repetir Contraseña">
            </div>
        </div>
       <div class="form-group">
		<button class="btn btn-primary" type="sumbmit">Cambiar Contraseña</button>
	</div>
	{{-- {!!Form::close()!!} --}}
	</form>
@endsection