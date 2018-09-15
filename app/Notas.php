<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;

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
