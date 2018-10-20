<?php

namespace GIDV\Http\Controllers;

use Illuminate\Http\Request;

use GIDV\Http\Requests;

use Illuminate\Support\Facades\Redirect;

use GIDV\Http\Requests\CalificacionesFormRequest;

use GIDV\Http\Requests\ObservacionesGeneralesFormRequest;

use GIDV\Calificaciones;

use GIDV\NotasGenerales;

use GIDV\ObservacionesGenerales;

use DB;

use Illuminate\Support\Facades\Auth;

class ObservacionesGeneralesController extends Controller
{
	public function __construct(){
        $this->middleware('auth');
    }
   public function edit($id){
        $observacionesgenerales=ObservacionesGenerales::findOrFail($id);
        $perio=DB::table('periodos')
                                        ->orderBy('pe_nombre','asc')
                                        ->get();
        $cali=DB::table('calificaciones')
                                        ->get();
        $estudiantes=DB::table('estudiantes')

                                        ->where('es_estado','=','1')
                                        ->orderBy('es_nombre','asc')
                                        ->get();
        $periodos=DB::table('periodos')
                                        ->where('pe_estado','=','1')
                                        ->orderBy('pe_nombre','asc')
                                        ->get();
        $materias=DB::table('materias')
                                        ->where('ma_estado','=','1')
                                        ->orderBy('ma_nombre','asc')
                                        ->get();
        $users=DB::table('users')
                                        ->where('us_estado','=','1')
                                        ->where('us_idRolFK','=','3')
                                        ->orderBy('name','asc')
                                        ->get();
        $procesos=DB::table('procesos')
                                        ->where('pro_estado','=','1')
                                        ->orderBy('pro_nombre','asc')
                                        ->get();
        $competencias=DB::table('competencias')
                                        ->where('co_estado','=','1')
                                        ->orderBy('co_descripcion','asc')
                                        ->get();
        $notas=DB::table('notas')
                                        ->where('no_estado','=','1')
                                        ->orderBy('no_idNota','asc')
                                        ->get();
        $tobservaciones=DB::table('tipoobservaciones')
                                        ->where('to_estado','=','1')
                                        ->orderBy('to_idTipoObservacion','asc')
                                        ->get();
        $observaciones=DB::table('observaciones')
                                        ->where('ob_estado','=','1')
                                        ->orderBy('ob_idObservaciones','asc')
                                        ->get();
        
        return view("configuracion.calificaciones.editObservacionesGenerales",
                    ["observacionesgenerales"=>$observacionesgenerales,
                    "cali"=>$cali,
                    "perio"=>$perio,
                    "estudiantes"=>$estudiantes,
                    "periodos"=>$periodos,
                    "materias"=>$materias,
                    "users"=>$users,
                    "procesos"=>$procesos,
                    "competencias"=>$competencias,
                    "notas"=>$notas,
                    "tobservaciones"=>$tobservaciones,
                    "observaciones"=>$observaciones]);
    }
    public function update(ObservacionesGeneralesFormRequest $request,$id){

        $observacionesgenerales=ObservacionesGenerales::findOrFail($id);
        //Observaciones Generales
        $observacionesgenerales->og_idEstudianteFK=$request->og_idEstudianteFK;
        $observacionesgenerales->og_idPeriodoFK=$request->og_idPeriodoFK;
        $observacionesgenerales->og_anioCalificacion=$request->og_anioCalificacion;
        $observacionesgenerales->og_idObservacionesFK=$request->og_idObservacionesFK;
        $observacionesgenerales->update();

        return Redirect::to('calificaciones')->with('status', 'Observacion General actualizada con éxito');
    }
}