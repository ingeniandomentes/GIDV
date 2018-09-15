@extends('layouts.admin')

@section('contenido')
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
                    <img src="/imagenes/prueba.jpg" class="img-responsive center-block">
                </div>
                 <a href="{{URL::action('UsuariosController@reset',$id=Auth::user()->id)}}"><button class="btn btn-primary btn-lg btn-block">Cambiar Contraseña</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
