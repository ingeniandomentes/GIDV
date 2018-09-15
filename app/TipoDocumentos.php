<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;

class TipoDocumentos extends Model
{
    protected $table='tipodocumento';
    protected $primaryKey="td_idDocumento";
    public $timestamps=false;

    protected $fillable =[
    	'td_nombre'
    ];
}
