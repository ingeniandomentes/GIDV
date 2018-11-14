<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;

/*
*Dentro de los modelos se establecen los valores de la tabla que se va a consultar, con la llave primaria y los campos que deben ser llenados por el usuario.
*/

class Procesos extends Model
{
protected $table='procesos';
protected $primaryKey="pro_idProceso";
public $timestamps=false;

protected $fillable =[
	'pro_nombre',
	'pro_idMateriaFk',
	'pro_idPeriodoFK',
	'pro_idGradoFK',
	'pro_estado'
];}
