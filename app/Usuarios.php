<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;

/*
*Dentro de los modelos se establecen los valores de la tabla que se va a consultar, con la llave primaria y los campos que deben ser llenados por el usuario.
*/

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
