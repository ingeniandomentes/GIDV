<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;


/*
*Dentro de los modelos se establecen los valores de la tabla que se va a consultar, con la llave primaria y los campos que deben ser llenados por el usuario.
*/

class Cursos extends Model
{
    protected $table='cursos';
    protected $primaryKey="cu_idCurso";
    public $timestamps=false;

    protected $fillable =[
    	'cu_nombre',
    	'cu_idGradoFK'
    ];

    public static function cursos($id){
    	return Cursos::where('cu_idGradoFK','=',$id)->get();
    }
}
