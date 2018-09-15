<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;

class Periodos extends Model
{
   protected $table='periodos';
    protected $primaryKey="pe_idPeriodo";
    public $timestamps=false;

    protected $fillable =[
    	'pe_nombre',
    	'pe_fechaInicial',
    	'pe_fechaFinal'
   ];}
