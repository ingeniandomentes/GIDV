<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;

class Calificaciones extends Model
{
	protected $table='calificaciones';
	protected $table='notasgenerales';
	protected $table='observacionesgenerales';
	protected $primaryKey="ca_idCalificacion";
	protected $primaryKey="ng_idNotaGeneral";
	protected $primaryKey="og_idObservacionGeneral";
	public $timestamps=false;

	protected $fillable =[
		//Calificaciones
		'ca_anioCalificacion',
		'ca_idEstudianteFK',
		'ca_idPeriodoFK',
		'ca_idMateriaFK',
		'ca_idUsuarioFK',
		'ca_idProcesoFK',
		'ca_idCompetenciaFK',
		'ca_idNotaFK',
		//Notas Generales
		'ng_idEstudianteFK',
		'ng_idMateriaFK',
		'ng_fallas',
		'ng_idNotaFK',
		//Observaciones Generales
		'og_idEstudianteFK',
		'og_idTipoObservacionFK',
		'og_idObservacionesFK'
	];}