<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;

class Calificaciones extends Model
{
	protected $table='calificaciones';
	protected $primaryKey="ca_idCalificacion";
	public $timestamps=false;
	protected $fillable =[
		//Calificaciones
		'ca_anioCalificacion',
		'ca_idEstudianteFK',
		'ca_idPeriodoFK',
		'ca_idMateriaFK',
		'ca_idUsuarioFK',
		'ca_idProcesoFK',
		'ca_idCompetenciaFK',
		'ca_idNotaFK'
	];
}