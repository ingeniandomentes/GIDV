<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table='usuarios';
    protected $primaryKey="us_idUsuario";
    public $timestamps=false;

    protected $fillable =[
    	'us_usuario',
    	'us_password',
    	'us_nombre',
    	'us_apellido',
    	'us_idtipoDocumentoFK',
    	'us_numeroDocumento',
    	'us_idRolFK',
    	'us_idCursoFK',
        'us_idGradoFK',
    	'us_estado'
    ];
}
