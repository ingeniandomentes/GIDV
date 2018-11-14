<!DOCTYPE html>
<html>
<head>
	@foreach($estudiantes as $es)
	 	@if($ess==$es->es_idEstudiante)
			<title>Boletin Estudiante {{ $es->es_nombre }} {{ $es->es_apellido }}</title>							
		@endif
	@endforeach
	{{-- <link href="css/bootstrap.min.css" rel="stylesheet">--}}
	<link rel="stylesheet" href="'css/estilos.css'">

<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

th {
    border: 1px solid #000000;
    text-align: left;
    padding: 4px;
    background-color:rgb(146,208,80);
    font-size:12px;
}

td{
    border: 1px solid #000000;
    text-align: left;
    padding: 2px;
    font-size: 12px;
}

th:nth-child(even) {
    background-color:rgb(146,208,80);
}

th:nth-child(6) {
    background-color:rgb(0,112,192);
}
</style>

</head>
<body>
<div class="row"><!--Primera linea con la foto-->
	<div id="contenedor">
		<div id="contenedor_2">
		 	@foreach($estudiantes as $es)
			 	@if($ess==$es->es_idEstudiante)
					<img src="C:Users/Ricardo/Desktop/TesisLaravel/GIDV/public/imagenes/fotosEstudiantes/{{ $es->es_fotoEstudiante }}" alt="{{ $es->es_nombre}}" height="90px" width="110px" class="img-thumbnail" hspace="20">							
				@endif
			@endforeach
		 </div>
		 <div id="espacio">
		</div>
		 <div id="contenedor_1">
		 	<b>REGISTRO ESCOLAR DE EVALUACIÓN {{$anio}}</b>
		 	<div id="espacior">
			</div>
			@foreach($users as $us)
				@foreach($estudiantes as $es)
				 	@if($ess==$es->es_idEstudiante && $es->es_idCursoFK == $us->us_idCursoFK)
						Docente: {{ $us->name }} {{ $us->us_apellido }}					
					@endif
				@endforeach
			@endforeach
		 </div>
	</div>	
	<style> #contenedor {width:auto; height:90px; background:none;text-align: center; overflow: hidden; position: relative;}</style>

    <style>
     #contenedor_1 {width:200px; height:60px; background:none; padding:10px;border-width:2.5px;  
    border-style:solid; border-radius: 15px;float: right;text-align: center; overflow: hidden;}</style>

    <style>
     #contenedor_2 {width:110px; height:80px; background:none;float: right;text-align: center; overflow: hidden;}</style>
     <style>
     #espacio {width:2px; height:50px; background:none;float: right;text-align: center; overflow: hidden;}</style>
</div>
<div class="row"><!--Segunda linea con datos del estudiante-->
	<div id="rectanglee">
		<div id="rectanglee4">
			<div id="espacior">
			</div>
			 	<b>Periodo:</b> Final
			@foreach($estudiantes as $es)
			 	@if($ess==$es->es_idEstudiante)
					<b>Jornada:</b>{{ $es->es_jornada }}						
				@endif
			@endforeach
		</div>
		<div id="espacioo">
		</div>
		<div id="rectanglee2">
		 	<b>Grado:</b>
		 	@foreach($cursos as $cu)
				@foreach($estudiantes as $es)
				 	@if($ess==$es->es_idEstudiante && $es->es_idCursoFK == $cu->cu_idCurso)
						{{ $cu->cu_nombre }}						
					@endif
				@endforeach
			@endforeach
		</div>
		<div id="espacioo">
		</div>
		<div id="rectanglee3">
			@foreach($estudiantes as $es)
			 	@if($ess==$es->es_idEstudiante)
			 		<b>Doc ID: </b>{{ $es->es_numeroDocumento }}
					<b>Codigo:</b>{{ $es->es_codigo }}						
				@endif
			@endforeach
		</div>
		<div id="espacioo2">
		</div>
		<div id="rectanglee1">
		 	<b>Estudiante:</b>
		 	<div id="espacior">
			</div>
			@foreach($estudiantes as $es)
			 	@if($ess==$es->es_idEstudiante)
					{{ $es->es_nombre }} {{ $es->es_apellido }}						
				@endif
			@endforeach
		 </div>
	</div>	
	<style> #rectanglee {width:auto; height:70px; background:none;text-align: center; overflow: hidden; position: relative;}</style>

    <style>
     #rectanglee4 {width:120px; height:60px; background:none;border-width:2.5px;  
    border-style:solid; border-radius: 15px;float: right;text-align: center;}</style>

     <style>
     #rectanglee2 {width:100px; height:40px; background:none; padding:10px;border-width:2.5px;  
    border-style:solid; border-radius: 15px;float: right;text-align: center; overflow: hidden;}</style>

     <style>
     #rectanglee3 {width:130px; height:40px; background:none; padding:10px;border-width:2.5px;  
    border-style:solid; border-radius: 15px;float: right;text-align: left; overflow: hidden;}</style>

     <style>
     #rectanglee1 {width:250px; height:40px; background:none; padding:10px;border-width:2.5px;  
    border-style:solid; border-radius: 15px;float: right;text-align: center; overflow: hidden;}</style>

    <style>
     #espacioo {width:3px; height:50px; background:none;float: right;text-align: center; overflow: hidden;}</style>

     <style>
     #espacioo2 {width:30px; height:50px; background:none;float: right;text-align: center; overflow: hidden;}</style>
     <style>
     #espacior {width:auto; height:7px; background:none;text-align: center; overflow: hidden;}</style>
</div>
<div class="row"><!--Tercera linea con la foto-->
	<div id="rectangleee">
		INTELIGENCIAS   EQUIVALENTE CONCEPTUAL
		@foreach($notas as $no)
				 {{ $no->no_nombre }}={{ $no->no_descripcion }}							
		@endforeach
	 </div>	
	<style> #rectangleee {width:auto; height:20px; background:rgb(146,208,80);border-radius: 5px;font-size:13px;text-align: center; overflow: hidden;border-width:1.5px;border-style:solid;}</style>

    <style>
     #espacio {width:3px; height:50px; background:none;float: right;text-align: center; overflow: hidden;}</style>
</div>
<div class="row">
	<div id="espaciooo">
	</div>
<style>#espaciooo {width:auto; height:5px; background:none;text-align: center; overflow: hidden;}</style>
</div>
<table>
@foreach($materias as $ma)
	@php($def=0)
	@php($div=0)
	@php($res=0)
	@foreach($notasgenerales as $ng)
		@if($ng->ng_idMateriaFK==$ma->ma_idMateria)
			@php($def=$def+$ng->ng_idNotaFK)
		@endif
	@enforeach
		@php($div=$def/4)
	@if($div>=1 && $div<=1.5)
		@php($res=1)
	@elseif($div>1.5 && $div<=2.5)
		@php($res=2)
	@elseif($div>2.5)
		@php($res=3)
	@endif
  <tr>
    <th class="text-center">{{ $ma->ma_nombre }}</th>
	<th class="text-center" >{{ $ma->ma_intensidad }}h</th>
	<th class="text-center" >NF</th>
	@foreach($notasgenerales as $ng)
		@foreach($notas as $no)
			@if($ng->ng_idEstudianteFK == $ess && $ma->ma_idMateria==$ng->ng_idMateriaFK && $no->no_idNota==$ng->ng_idNotaFK)
			<th class="text-center" >{{ $no->no_descripcion }}</th>
			<th class="text-center" >Fallas</th>
			<th class="text-center" >{{ $ng->ng_fallas }}</th>
			@endif
		@endforeach
	@endforeach
  </tr>
@endforeach
</table>
	Observaciones
	<br>
	@foreach($observacionesgenerales as $og)
		@foreach($observaciones as $ob)
			@if($og->og_idObservacionesFK == $ob->ob_idObservaciones)
				{{ $ob->ob_descripcion }}
				<br>
			@endif
		@endforeach
	@endforeach
	<br>
	<p><b>DOCENTE DE CURSO:   ___________________________ DIRECTOR(A): ________________________</b></p>
</body>
</html>