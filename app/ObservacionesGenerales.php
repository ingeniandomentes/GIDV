<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;

/*
*Dentro de los modelos se establecen los valores de la tabla que se va a consultar, con la llave primaria y los campos que deben ser llenados por el usuario.
*/

class ObservacionesGenerales extends Model
{
    protected $table='observacionesgenerales';
	protected $primaryKey="og_idObservacionGeneral";
	public $timestamps=false;
	protected $fillable =[
		//Observaciones Generales
		'og_anioCalificacion',
		'og_idEstudianteFK',
		'og_idPeriodoFK',
		'og_idObservacionesFK'
	];
}
