@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('us_apellido') ? ' has-error' : '' }}">
                            <label for="us_apellido" class="col-md-4 control-label">Apellido</label>

                            <div class="col-md-6">
                                <input id="us_apellido" type="text" class="form-control" name="us_apellido" value="{{ old('us_apellido') }}" required>

                                @if ($errors->has('us_apellido'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('us_apellido') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('us_idTipoDocumentoFK') ? ' has-error' : '' }}">
                            <label for="us_idTipoDocumentoFK" class="col-md-4 control-label">Tipo Documento</label>

                            <div class="col-md-6">
                                <input id="us_idTipoDocumentoFK" type="text" class="form-control" name="us_idTipoDocumentoFK" value="{{ old('us_idTipoDocumentoFK') }}" required>

                                @if ($errors->has('us_idTipoDocumentoFK'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('us_idTipoDocumentoFK') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('us_numeroDocumento') ? ' has-error' : '' }}">
                            <label for="us_numeroDocumento" class="col-md-4 control-label">Numero Documento</label>

                            <div class="col-md-6">
                                <input id="us_numeroDocumento" type="text" class="form-control" name="us_numeroDocumento" value="{{ old('us_numeroDocumento') }}" required >

                                @if ($errors->has('us_numeroDocumento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('us_numeroDocumento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('us_idRolFK') ? ' has-error' : '' }}">
                            <label for="us_idRolFK" class="col-md-4 control-label">Rol</label>

                            <div class="col-md-6">
                                <input id="us_idRolFK" type="text" class="form-control" name="us_idRolFK" value="{{ old('us_idRolFK') }}" required>

                                @if ($errors->has('us_idRolFK'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('us_idRolFK') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('us_idCursoFK') ? ' has-error' : '' }}">
                            <label for="us_idCursoFK" class="col-md-4 control-label">Curso</label>

                            <div class="col-md-6">
                                <input id="us_idCursoFK" type="text" class="form-control" name="us_idCursoFK" value="{{ old('us_idCursoFK') }}">

                                @if ($errors->has('us_idCursoFK'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('us_idCursoFK') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('us_estado') ? ' has-error' : '' }}">
                            <label for="us_estado" class="col-md-4 control-label">Estado</label>

                            <div class="col-md-6">
                                <select id="us_estado" class="form-control" name="us_estado">
                                    <option value="1">Activo</option>
                                </select>
                                @if ($errors->has('us_estado'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('us_estado') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
