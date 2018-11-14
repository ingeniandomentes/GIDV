<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;

/*
*Dentro de los modelos se establecen los valores de la tabla que se va a consultar, con la llave primaria y los campos que deben ser llenados por el usuario.
*/

class Notas extends Model
{
    protected $table='notas';
    protected $primaryKey="no_idNota";
    public $timestamps=false;

    protected $fillable =[
    	'no_nombre',
    	'no_descripcion'
    ];
}
