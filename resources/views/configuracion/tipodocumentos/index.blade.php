@extends('layouts.admin')
@section('contenido')
@include('success.success')
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<h3>Listado de tipo de documentos <a href="tipodocumentos/create"><button class="btn btn-success">Nuevo</button></a></h3>
			@include('configuracion.tipodocumentos.search')
		</div>
	</div>
<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover text-center">
				<thead>
					<th>Id Tipo Documento</th>
					<th>Nombre Tipo Documento</th>
					<th>Estado Tipo Documento</th>
					<th>Opciones</th>
				</thead>
				@foreach($tipodocumentos as $tipodocumento)
				<tr>
					<td>{{$tipodocumento->td_idDocumento}}</td>
					<td>{{$tipodocumento->td_nombre}}</td>
					@if($tipodocumento->td_estado='1')
					<td>Activo</td>
					@endif
					<td>
						<a href="{{URL::action('TipoDocumentosController@edit',$tipodocumento->td_idDocumento)}}"><button class="btn btn-info">Editar</button></a>
						<a href="" data-target="#modal-delete-{{$tipodocumento->td_idDocumento}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('configuracion.tipodocumentos.modal')
				@endforeach
			</table>
		</div>
		{{$tipodocumentos->render()}}
	</div>
</div>
@endsection