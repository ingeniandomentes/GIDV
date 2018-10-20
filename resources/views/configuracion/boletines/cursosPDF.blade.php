<!DOCTYPE html>
<html>
<head>
	@foreach($cursos as $cu)
	 	@if($curr==$cu->cu_idCurso)
			<title>Boletin Curso {{ $cu->cu_nombre }}</title>							
		@endif
	@endforeach
	{{--  <link href="css/bootstrap.min.css" rel="stylesheet">--}}
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
    padding: 8px;
    background-color:rgb(146,208,80);
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
@foreach($estudiantes as $es)
@php($cont=0)
@foreach($calificaciones as $ca)
@if($ca->ca_idEstudianteFK == $es->es_idEstudiante)
@php($cont++)
@endif
@endforeach
@if($cont>0)
<div class="row">
<div class="row"><!--Primera linea con la foto-->
	<div id="rectangle">
		<div id="rectangle2">
			<img src="C:Users/Ricardo/Desktop/TesisLaravel/GIDV/public/imagenes/fotosEstudiantes/{{ $es->es_fotoEstudiante }}" alt="{{ $es->es_nombre}}" height="100px" width="110px" class="img-thumbnail" hspace="20">							
		 </div>
		 <div id="espacio">
		</div>
		 <div id="rectangle1">
		 	<p><b>REGISTRO ESCOLAR DE EVALUACIÓN {{$anio}}</b></p>
			@foreach($users as $us)
				 	@if($es->es_idCursoFK == $us->us_idCursoFK)
						<p>Docente: {{ $us->name }} {{ $us->us_apellido }}</p>							
					@endif
			@endforeach
		 </div>
	</div>	
	<style> #rectangle {width:auto; height:110px; background:none;text-align: center; overflow: hidden;}</style>

    <style>
     #rectangle1 {width:200px; height:80px; background:none; padding:10px;border-width:2.5px;  
    border-style:solid; border-radius: 15px;float: right;text-align: center; overflow: hidden;}</style>

    <style>
     #rectangle2 {width:100px; height:125px; background:none;float: right;text-align: center; overflow: hidden;}</style>
     <style>
     #espacio {width:2px; height:50px; background:none;float: right;text-align: center; overflow: hidden;}</style>
</div>
<div class="row">
	<div id="espacios">
	</div>
<style>#espacios {width:auto; height:2px; background:none;text-align: center; overflow: hidden;}</style>
</div>
<div class="row"><!--Segunda linea con datos del estudiante-->
	<div id="rectanglee">
		<div id="rectanglee1">
		 	@foreach($perio as $pe)
			 	@if($pe->pe_idPeriodo==$perCu)
			 	<p><b>Periodo:</b> {{ $pe->pe_idPeriodo }}</p>
			 	@endif
		 	@endforeach
				<p><b>Jornada:</b> {{ $es->es_jornada }}</p>							
		</div>
		<div id="espacio">
		</div>
		<div id="rectanglee2">
		 	<p><b>Grado:</b></p>
		 	@foreach($cursos as $cu)
				 	@if($es->es_idCursoFK == $cu->cu_idCurso)
						<p>{{ $cu->cu_nombre }}</p>							
					@endif
			@endforeach
		 </div>
		 <div id="espacio">
		</div>
		<div id="rectanglee3">
	 		<p><b>Doc ID: </b>{{ $es->es_numeroDocumento }}</p>
			<p><b>Codigo:</b>{{ $es->es_codigo }}</p>							
		 </div>
		 <div id="espacio2">
		</div>
		<div id="rectanglee4">
		 	<p><b>Estudiante</b></p>
			<p>{{ $es->es_nombre }} {{ $es->es_apellido }}</p>							
		 </div>
		 
	</div>	
	<style> #rectanglee {width:auto; height:80px; background:none;border-radius: 15px;text-align: center; overflow: hidden;}</style>

    <style>
     #rectanglee1 {width:100px; height:50px; background:none; padding:10px;border-width:2.5px;  
    border-style:solid; border-radius: 15px;float: right;text-align: center; overflow: hidden;}</style>

     <style>
     #rectanglee2 {width:100px; height:50px; background:none; padding:10px;border-width:2.5px;  
    border-style:solid; border-radius: 15px;float: right;text-align: center; overflow: hidden;}</style>

     <style>
     #rectanglee3 {width:130px; height:50px; background:none; padding:10px;border-width:2.5px;  
    border-style:solid; border-radius: 15px;float: right;text-align: left; overflow: hidden;}</style>

     <style>
     #rectanglee4 {width:285px; height:50px; background:none; padding:10px;border-width:2.5px;  
    border-style:solid; border-radius: 15px;float: right;text-align: center; overflow: hidden;}</style>

    <style>
     #espacio {width:3px; height:50px; background:none;float: right;text-align: center; overflow: hidden;}</style>

     <style>
     #espacio2 {width:30px; height:50px; background:none;float: right;text-align: center; overflow: hidden;}</style>
</div>
<div class="row"><!--Tercera linea con la foto-->
	<div id="rectangleee">
		<p>INTELIGENCIAS   EQUIVALENTE CONCEPTUAL
		@foreach($notas as $no)
				 {{ $no->no_nombre }}={{ $no->no_descripcion }}							
		@endforeach
		</p>
	 </div>	
	<style> #rectangleee {width:auto; height:25px; background:rgb(146,208,80);border-radius: 5px;font-size:14px;font-family: arial, sans-serif;text-align: center; overflow: hidden;border-width:1.5px;  
    border-style:solid;}</style>

    <style>
     #espacio {width:3px; height:50px; background:none;float: right;text-align: center; overflow: hidden;}</style>
</div>
<div class="row">
	<div id="espaciooo">
	</div>
<style>#espaciooo {width:auto; height:5px; background:none;text-align: center; overflow: hidden;}</style>
</div>
@php($cont=0)
@foreach($materias as $ma)
@if($cont==4)
<div class="row"><!--Primera linea con la foto-->
	<div id="rectangle">
		<div id="rectangle2">
			<img src="C:Users/Ricardo/Desktop/TesisLaravel/GIDV/public/imagenes/fotosEstudiantes/{{ $es->es_fotoEstudiante }}" alt="{{ $es->es_nombre}}" height="100px" width="110px" class="img-thumbnail" hspace="20">							
		 </div>
		 <div id="espacio">
		</div>
		 <div id="rectangle1">
		 	<p><b>REGISTRO ESCOLAR DE EVALUACIÓN {{$anio}}</b></p>
			@foreach($users as $us)
				 	@if($es->es_idCursoFK == $us->us_idCursoFK)
						<p>Docente: {{ $us->name }} {{ $us->us_apellido }}</p>							
					@endif
			@endforeach
		 </div>
	</div>	
	<style> #rectangle {width:auto; height:110px; background:none;text-align: center; overflow: hidden;}</style>

    <style>
     #rectangle1 {width:200px; height:80px; background:none; padding:10px;border-width:2.5px;  
    border-style:solid; border-radius: 15px;float: right;text-align: center; overflow: hidden;}</style>

    <style>
     #rectangle2 {width:100px; height:125px; background:none;float: right;text-align: center; overflow: hidden;}</style>
     <style>
     #espacio {width:2px; height:50px; background:none;float: right;text-align: center; overflow: hidden;}</style>
</div>
<div class="row"><!--Segunda linea con datos del estudiante-->
	<div id="rectanglee">
		<div id="rectanglee1">
		 	@foreach($perio as $pe)
			 	@if($pe->pe_idPeriodo==$perCu)
			 	<p><b>Periodo:</b> {{ $pe->pe_idPeriodo }}</p>
			 	@endif
		 	@endforeach
			<p><b>Jornada:</b> {{ $es->es_jornada }}</p>							
		</div>
		<div id="espacio">
		</div>
		<div id="rectanglee2">
		 	<p><b>Grado:</b></p>
		 	@foreach($cursos as $cu)
				 	@if($es->es_idCursoFK == $cu->cu_idCurso)
						<p>{{ $cu->cu_nombre }}</p>							
					@endif
			@endforeach
		 </div>
		 <div id="espacio">
		</div>
		<div id="rectanglee3">
	 		<p><b>Doc ID: </b>{{ $es->es_numeroDocumento }}</p>
			<p><b>Codigo:</b>{{ $es->es_codigo }}</p>							
		 </div>
		 <div id="espacio2">
		</div>
		<div id="rectanglee4">
		 	<p><b>Estudiante</b></p>
			<p>{{ $es->es_nombre }} {{ $es->es_apellido }}</p>							
		 </div>
		 
	</div>	
	<style> #rectanglee {width:auto; height:80px; background:none;border-radius: 15px;text-align: center; overflow: hidden;}</style>

    <style>
     #rectanglee1 {width:100px; height:50px; background:none; padding:10px;border-width:2.5px;  
    border-style:solid; border-radius: 15px;float: right;text-align: center; overflow: hidden;}</style>

     <style>
     #rectanglee2 {width:100px; height:50px; background:none; padding:10px;border-width:2.5px;  
    border-style:solid; border-radius: 15px;float: right;text-align: center; overflow: hidden;}</style>

     <style>
     #rectanglee3 {width:130px; height:50px; background:none; padding:10px;border-width:2.5px;  
    border-style:solid; border-radius: 15px;float: right;text-align: left; overflow: hidden;}</style>

     <style>
     #rectanglee4 {width:285px; height:50px; background:none; padding:10px;border-width:2.5px;  
    border-style:solid; border-radius: 15px;float: right;text-align: center; overflow: hidden;}</style>

    <style>
     #espacio {width:3px; height:50px; background:none;float: right;text-align: center; overflow: hidden;}</style>

     <style>
     #espacio2 {width:30px; height:50px; background:none;float: right;text-align: center; overflow: hidden;}</style>
</div>
<div class="row"><!--Tercera linea con la foto-->
	<div id="rectangleee">
		<p>INTELIGENCIAS   EQUIVALENTE CONCEPTUAL
		@foreach($notas as $no)
				 {{ $no->no_nombre }}={{ $no->no_descripcion }}							
		@endforeach
		</p>
	 </div>	
	<style> #rectangleee {width:auto; height:25px; background:rgb(146,208,80);border-radius: 5px;font-size:14px;font-family: arial, sans-serif;text-align: center; overflow: hidden;border-width:1.5px;  
    border-style:solid;}</style>

    <style>
     #espacio {width:3px; height:50px; background:none;float: right;text-align: center; overflow: hidden;}</style>
</div>
<div class="row">
	<div id="espaciooo">
	</div>
<style>#espaciooo {width:auto; height:5px; background:none;text-align: center; overflow: hidden;}</style>
</div>
@else
<div class="row">
<table>
  <tr>
    <th class="text-center">{{ $ma->ma_nombre }}</th>
    @foreach($users as $us)
		@if($us->id == $ma->ma_docenteAsignadoFK)
		<th class="text-center">{{ $us->name }} {{ $us->us_apellido }}</th>
		@endif
	@endforeach
	<th class="text-center" >{{ $ma->ma_intensidad }}h</th>
	<th class="text-center" >NF</th>
	@foreach($notasgenerales as $ng)
		@foreach($notas as $no)
			@if($ng->ng_idEstudianteFK == $es->es_idEstudiante && $ma->ma_idMateria==$ng->ng_idMateriaFK && $no->no_idNota==$ng->ng_idNotaFK)
			<th class="text-center" >{{ $no->no_descripcion }}</th>
			<th class="text-center" >Fallas</th>
			<th class="text-center" >{{ $ng->ng_fallas }}</th>
			@endif
		@endforeach
	@endforeach
  </tr>	
  	<tr>		  	
  		@foreach($procesos as $pro)
		  		@if($pro->pro_idMateriaFK == $ma->ma_idMateria && $pro->pro_idPeriodoFK == $perCu && $pro->pro_idGradoFK == $es->es_idGradoFK)
					<td colspan="7"><b>PROCESO: {{ $pro->pro_nombre }}</b></td>
				@endif
		@endforeach
	</tr>
		
	@foreach($calificaciones as $ca)
		@if($ca->ca_idEstudianteFK==$es->es_idEstudiante && $ca->ca_idMateriaFK == $ma->ma_idMateria)
		<tr>
			@foreach($notas as $no)
				@if($no->no_idNota == $ca->ca_idNotaFK)
					<td class="text-center">{{ $no->no_nombre }}</td>
				@endif
			@endforeach
			@foreach($competencias as $co)
				@if($co->co_idCompetencia == $ca->ca_idCompetenciaFK)
					<td colspan="6">{{ $co->co_descripcion }}</td>
				@endif
			@endforeach
		</tr>
		@endif
	@endforeach
</table>
<br>
</div>
@endif
@php($cont++)
@endforeach
<div class="row">
	<p>Observaciones</p>
	@foreach($observacionesgenerales as $og)
		@foreach($observaciones as $ob)
			@if($og->og_idObservacionesFK == $ob->ob_idObservaciones && $es->es_idEstudiante==$og->og_idEstudianteFK)
				<p>{{ $ob->ob_descripcion }}</p>
			@endif
		@endforeach
	@endforeach
	<p><b>DOCENTE DE CURSO:   ___________________________ DIRECTOR(A): ________________________</b></p>
</div>
</div>
@endif
@endforeach
</html>