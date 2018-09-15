<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;

class Grados extends Model
{
    protected $table='grados';
    protected $primaryKey="gr_idGrado";
    public $timestamps=false;

    protected $fillable =[
    	'gr_nombre'
    ];
}
