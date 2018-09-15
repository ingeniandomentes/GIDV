<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;

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
