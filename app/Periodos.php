<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;

/*
*Dentro de los modelos se establecen los valores de la tabla que se va a consultar, con la llave primaria y los campos que deben ser llenados por el usuario.
*/

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
