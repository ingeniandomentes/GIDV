<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;



class roles extends Model
{
    protected $table='roles';
    protected $primaryKey="ro_idRol";
    public $timestamps=false;

    protected $fillable =[
    	'ro_nombre'
    ];
}
