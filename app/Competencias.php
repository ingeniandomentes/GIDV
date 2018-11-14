<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;


/*
*Dentro de los modelos se establecen los valores de la tabla que se va a consultar, con la llave primaria y los campos que deben ser llenados por el usuario.
*/

class Competencias extends Model
{
	protected $table='competencias';
	protected $primaryKey="co_idCompetencia";
	public $timestamps=false;

	protected $fillable =[
		'co_descripcion',
		'co_idProcesoFK',
		'co_estado'
	];}
