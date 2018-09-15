<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;

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
