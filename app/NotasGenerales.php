<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;

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
