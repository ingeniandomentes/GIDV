<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;

class TipoObservaciones extends Model
{
    protected $table='tipoobservaciones';
    protected $primaryKey="to_idTipoObservacion";
    public $timestamps=false;

    protected $fillable =[
    	'to_nombre'
    ];
}