<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;

class ObservacionesGenerales extends Model
{
    protected $table='observacionesgenerales';
	protected $primaryKey="og_idObservacionGeneral";
	public $timestamps=false;
	protected $fillable =[
		//Observaciones Generales
		'og_idEstudianteFK',
		'og_idTipoObservacionFK',
		'og_idObservacionesFK'
	];
}
