<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;

/*
*Dentro de los modelos se establecen los valores de la tabla que se va a consultar, con la llave primaria y los campos que deben ser llenados por el usuario.
*/

class TipoDocumentos extends Model
{
    protected $table='tipodocumento';
    protected $primaryKey="td_idDocumento";
    public $timestamps=false;

    protected $fillable =[
    	'td_nombre'
    ];
}
