<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Prueba Estudiantes</h3>
	</div>
</div>
<table bordered>
	<thead>
	<tr>
		@foreach($calificaciones as $ca)
		 @foreach($estudiantes as $es)
		 	@if($ca->ca_idEstudianteFK==$es->es_idEstudiante)
			<h2>{{ $es->es_nombre }} {{ $es->es_apellido }}</h2>
			@endif
		@endforeach
		@endforeach
	</tr>
	</thead>
</table>
