function cambio(){
$periodo = $("#ca_idPeriodoFK").val();
console.log($periodo);
}

function cargar(){
	cambio();
	$("#calificaciones").hide();
	$("#btnCalificaciones").hide();
	$("#anio").hide();
	$("#calificacionesf").hide();
	$("#observaciones").hide();
}
function anio(){
	$("#anio").show();
}
function calificaciones(){
    $("#calificaciones").show();
    $("#ca_idPeriodoFK").readOnly=true;
    $("ca_anioCalificacion").readOnly=true;
}
function calificacionesf(){
	$("#calificacionesf").show();
	$("#calificaciones").hide();
}
function observaciones(){
	$("#calificacionesf").hide();
	$("#observaciones").show();
	$("#btnCalificaciones").show();
}

$(document).ready(function(){

	$('.arriba').click(function(){
		$('body, html').animate({
			scrollTop: '0px'
		}, 300);
	});
	/*
	$(window).scroll(function(){
		if( $(this).scrollTop() > 0 ){
			$('.arriba').slideDown(300);
		} else {
			$('.arriba').slideUp(300);
		}
	});*/

});