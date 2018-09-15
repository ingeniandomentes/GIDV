<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;

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
