<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;

/*
*Dentro de los modelos se establecen los valores de la tabla que se va a consultar, con la llave primaria y los campos que deben ser llenados por el usuario.
*/

class roles extends Model
{
    protected $table='roles';
    protected $primaryKey="ro_idRol";
    public $timestamps=false;

    protected $fillable =[
    	'ro_nombre'
    ];
}
