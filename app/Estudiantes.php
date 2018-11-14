<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;


/*
*Dentro de los modelos se establecen los valores de la tabla que se va a consultar, con la llave primaria y los campos que deben ser llenados por el usuario.
*/

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
