<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;

class Observaciones extends Model
{
    protected $table='observaciones';
    protected $primaryKey="ob_idObservaciones";
    public $timestamps=false;

    protected $fillable =[
    	'ob_idTipoObservacionFK',
    	'ob_descripcion'
    ];}