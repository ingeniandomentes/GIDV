<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;

/*
*Dentro de los modelos se establecen los valores de la tabla que se va a consultar, con la llave primaria y los campos que deben ser llenados por el usuario.
*/
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
		'ca_idProcesoFK',
		'ca_idCompetenciaFK',
		'ca_idNotaFK'
	];
}