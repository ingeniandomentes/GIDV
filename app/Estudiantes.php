<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;

class Estudiantes extends Model
{
    protected $table='estudiantes';
    protected $primaryKey="es_idEstudiante";
    public $timestamps=false;

    protected $fillable =[
    	'es_nombre',
    	'es_apellido',
    	'es_codigo',
    	'es_numeroDocumento',
    	'es_idCursoFK',
    	'es_fotoEstudiante'
    ];
}
