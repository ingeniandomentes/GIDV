<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;

/*
*Dentro de los modelos se establecen los valores de la tabla que se va a consultar, con la llave primaria y los campos que deben ser llenados por el usuario.
*/

class Materias extends Model
{
protected $table='materias';
protected $primaryKey="ma_idMateria";
public $timestamps=false;

protected $fillable =[
	'ma_nombre',
	'ma_intensidad',
	'ma_docenteAsignadoFK'
];}
