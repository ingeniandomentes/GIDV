<?php

namespace GIDV;

use Illuminate\Database\Eloquent\Model;

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
