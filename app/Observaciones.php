<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;

/*
*Dentro de los modelos se establecen los valores de la tabla que se va a consultar, con la llave primaria y los campos que deben ser llenados por el usuario.
*/

class Observaciones extends Model
{
    protected $table='observaciones';
    protected $primaryKey="ob_idObservaciones";
    public $timestamps=false;

    protected $fillable =[
    	'ob_idTipoObservacionFK',
    	'ob_descripcion'
    ];}