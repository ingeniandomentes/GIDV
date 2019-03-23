@extends('layouts.admin')
@section('contenido')
@include('success.success')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Pagina Principal</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <img src="/imagenes/prueba.jpg" class="img-responsive center-block" width="300" height="300">
                </div>
                @php($id=Auth::user()->id)
                <div>
                    <a href="/usuarios/reset/{{ $id }}"><button class="btn btn-primary btn-lg btn-block">Cambiar Contraseña</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
