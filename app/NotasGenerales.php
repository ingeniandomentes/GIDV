<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;

/*
*Dentro de los modelos se establecen los valores de la tabla que se va a consultar, con la llave primaria y los campos que deben ser llenados por el usuario.
*/

class NotasGenerales extends Model
{
    protected $table='notasgenerales';
	protected $primaryKey="ng_idNotaGeneral";
	public $timestamps=false;
	protected $fillable =[
		//Notas Generales
		'ng_anioCalificacion',
		'ng_idEstudianteFK',
		'ng_idUsuarioFK',
		'ng_idPeriodoFK',
		'ng_idMateriaFK',
		'ng_fallas',
		'ng_idNotaFK'
	];
}
