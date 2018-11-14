<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;

/*
*Dentro de los modelos se establecen los valores de la tabla que se va a consultar, con la llave primaria y los campos que deben ser llenados por el usuario.
*/

class Grados extends Model
{
    protected $table='grados';
    protected $primaryKey="gr_idGrado";
    public $timestamps=false;

    protected $fillable =[
    	'gr_nombre'
    ];
}
