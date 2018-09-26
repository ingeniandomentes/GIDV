<?php

namespace GIDV\Http\Controllers;

use Illuminate\Http\Request;

use GIDV\Http\Requests;

use Illuminate\Support\Facades\Redirect;

use GIDV\Http\Requests\CalificacionesFormRequest;

use GIDV\Calificaciones;

use GIDV\NotasGenerales;

use GIDV\ObservacionesGenerales;

use DB;

use Illuminate\Support\Facades\Auth;

class CalificacionesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));

    		$calificaciones=DB::table('calificaciones as c')

            ->join('estudiantes as e','c.ca_idEstudianteFK','=','e.es_idEstudiante')

            ->join('periodos as p','c.ca_idPeriodoFK','=','p.pe_idPeriodo')

            ->join('materias as m','c.ca_idMateriaFK','=','m.ma_idMateria')

            ->join('procesos as pro','c.ca_idProcesoFK','=','pro.pro_idProceso')

            ->join('competencias as co','c.ca_idCompetenciaFK','=','co.co_idCompetencia')

            ->join('notas as n','c.ca_idNotaFK','=','n.no_idNota')

            ->select('c.ca_idCalificacion','c.ca_anioCalificacion','e.es_nombre as nombreEs','p.pe_nombre as periodo','m.ma_nombre as materia','pro.pro_nombre as proceso','co.co_descripcion as competencia','n.no_nombre as nota')

            ->where('e.es_nombre','LIKE','%'.$query.'%')

            ->orderBy('c.ca_anioCalificacion','asc')

            ->orderBy('nombreEs','asc')

            ->orderBy('periodo','asc')

            ->orderBy('m.ma_idMateria','asc')

            ->orderBy('pro.pro_idProceso','asc')

            ->orderBy('co.co_idCompetencia','asc')

            ->orderBy('n.no_idNota','asc')

            ->paginate(8); 

            $notasgenerales=DB::table('notasgenerales as ng')

            ->join('estudiantes as e','ng.ng_idEstudianteFK','=','e.es_idEstudiante')

            ->join('users as us','ng.ng_idUsuarioFK','=','us.id')

            ->join('materias as m','ng.ng_idMateriaFK','=','m.ma_idMateria')

            ->join('notas as n','ng.ng_idNotaFK','=','n.no_idNota')

            ->select('ng.ng_idNotaGeneral','e.es_nombre as nombreEs','us.name as docente','m.ma_nombre as materia','ng.ng_fallas','n.no_descripcion as nota')
            ->where('e.es_nombre','LIKE','%'.$query.'%')
            ->paginate(9);

            $observacionesgenerales=DB::table('observacionesgenerales as og')

            ->join('estudiantes as e','og.og_idEstudianteFK','=','e.es_idEstudiante')


            ->join('observaciones as ob','og.og_idObservacionesFK','=','ob.ob_idObservaciones')

            ->select('og.og_idObservacionGeneral','e.es_nombre as nombreEs','ob.ob_descripcion as observacion')

            ->where('e.es_nombre','LIKE','%'.$query.'%')

            ->paginate(8);
            /*->join('estudiantes as e',function($join){
                    $join->on('c.ca_idEstudianteFK','=','e.es_idEstudiante')
                    ->orOn('og.og_idEstudianteFK','=','e.es_idEstudiante')
                    ->orOn('ng.ng_idEstudianteFK','=','e.es_idEstudiante');
                    )}

            ->join('periodos as p','c.ca_idPeriodoFK','=','pe_idPeriodo')

            ->join('materias as m',function($join){
                    $join->on('c.ca_idMateriaFK','=','m.ma_idMateria')
                    ->orOn('ng.ng_idMateriaFK','=','m.ma_idMateria');
                    )}

            ->join('users as us','c.ca_idUsuarioFK','=','us.us_idUsuario')

            ->join('procesos as pro','c.ca_idProcesoFK','=','pro.pro_idProceso')

            ->join('competencias as co','c.ca_idCompetenciaFK','=','co.co_idCompetencia')

            ->join('notas as n',function($join){
                    $join->on('c.ca_idNotaFK','=','n.no_idNota')
                    ->orOn('ng.ng_idNotaFK','=','n.no_idNota');
                    )}

            ->join('tipoobservaciones as to','og.og_idTipoObservacionFK','=','to.to_idTipoObservacion')

            ->join('observaciones as ob','og.og_idObservacionesFK','=','ob.ob_idObservaciones')

            ->select('c.ca_idCalificacion','c.ca_anioCalificacion','e.es_nombre as nombreEs','p.pe_nombre as periodo','m.ma_nombre as materia','us.name as docente','pro.pro_nombre as proceso','co.co_descripcion as competencia','n.no_nombre','ng.ng_fallas','to.to_nombre','ob.ob_descripcion')
            ->where('c.co_nombre','LIKE','%'.$query.'%')
    		->paginate(8);*/
    		return view('configuracion.calificaciones.index',["calificaciones"=>$calificaciones,"notasgenerales"=>$notasgenerales,"observacionesgenerales"=>$observacionesgenerales,"searchText"=>$query]);
        	}    
        }
        public function create(){
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
    	return view("configuracion.calificaciones.create",
                    ["estudiantes"=>$estudiantes,
                    "periodos"=>$periodos,
                    "materias"=>$materias,
                    "users"=>$users,
                    "procesos"=>$procesos,
                    "competencias"=>$competencias,
                    "notas"=>$notas,
                    "tobservaciones"=>$tobservaciones,
                    "observaciones"=>$observaciones]);
    }
    public function store(CalificacionesFormRequest $request){
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


                //Calificaciones::create($request->all());
                /*for($i=0;$i<=2;$i++){
                    $calificacion1 = new Calificaciones;
                    $calificacion1->ca_anioCalificacion=$request->ca_anioCalificacion[$i];                                  
                    $calificacion1->ca_idEstudianteFK=$request->ca_idEstudianteFK[$i];
                    $calificacion1->ca_idPeriodoFK=$request->ca_idPeriodoFK[$i];
                    $calificacion1->ca_idMateriaFK=$request->ca_idMateriaFK[$i];
                    $calificacion1->ca_idUsuarioFK=$request->ca_idUsuarioFK[$i];
                    $calificacion1->ca_idProcesoFK=$request->ca_idProcesoFK[$i];
                    $calificacion1->ca_idCompetenciaFK=$request->ca_idCompetenciaFK[$i];
                    $calificacion1->ca_idNotaFK=$request->ca_idNotaFK[$i];
                    $calificacion1->save();
                }*/
                    /*
                    $calificacion1 = new Calificaciones;
                    $calificacion1->ca_anioCalificacion=$request->ca_anioCalificacion;                                  
                    $calificacion1->ca_idEstudianteFK=$request->ca_idEstudianteFK;
                    $calificacion1->ca_idPeriodoFK=$request->ca_idPeriodoFK;
                    $calificacion1->ca_idMateriaFK=$request->ca_idMateriaFK;
                    $calificacion1->ca_idUsuarioFK=$request->ca_idUsuarioFK;
                    $calificacion1->ca_idProcesoFK=$request->ca_idProcesoFK;
                    $calificacion1->ca_idCompetenciaFK=$request->ca_idCompetenciaFK;
                    $calificacion1->ca_idNotaFK=$request->ca_idNotaFK;
                    $calificacion1->save();*/
                    foreach ($periodos as $perio) {
                        $perr=$perio->pe_idPeriodo;
                    }
                $pe=0;
                $matt=0;
                $est=0;
                $proc=0;
                $comp=0;
                $nota=0;
                    foreach ($estudiantes as $es) {
                        if($es->es_idCursoFK==Auth::user()->us_idCursoFK){
                            foreach ($materias as $ma) {
                                foreach($procesos as $pro){
                                    if($ma->ma_idMateria==$pro->pro_idMateriaFK && $pro->pro_idPeriodoFK==$perr && $pro->pro_idGradoFK==Auth::user()->us_idGradoFK){
                                        foreach ($competencias as $co) {
                                            if($co->co_idProcesoFK==$pro->pro_idProceso){
                                            $calificacion1 = new Calificaciones;
                                            $calificacion1->ca_anioCalificacion=$request->ca_anioCalificacion[$pe];                              
                                            $calificacion1->ca_idEstudianteFK=$request->ca_idEstudianteFK[$est];
                                            $calificacion1->ca_idPeriodoFK=$request->ca_idPeriodoFK[$pe];
                                            $calificacion1->ca_idMateriaFK=$request->ca_idMateriaFK[$matt];
                                            $calificacion1->ca_idProcesoFK=$request->ca_idProcesoFK[$proc];
                                            $calificacion1->ca_idCompetenciaFK=$request->ca_idCompetenciaFK[$comp];
                                            $calificacion1->ca_idNotaFK=$request->ca_idNotaFK[$comp];
                                            $calificacion1->save();
                                            $comp++;
                                            }
                                        }
                                        $proc++;
                                    }
                                }
                                $matt++;
                            }
                        $est++;
                        }
                        $matt=0;
                        $proc=0;
                        $comp=0;
                    }
                $estu=0;
                $mat=0;
                //Notas Generales
                foreach ($estudiantes as $es) {
                    if($es->es_idCursoFK==Auth::user()->us_idCursoFK){
                        foreach ($materias as $ma) {
                            $calificacion2 = new NotasGenerales;
                            $calificacion2->ng_idEstudianteFK=$request->ng_idEstudianteFK[$estu];
                            $calificacion2->ng_idUsuarioFK=$request->ng_idUsuarioFK[$mat];
                            $calificacion2->ng_idMateriaFK=$request->ng_idMateriaFK[$mat];
                            $calificacion2->ng_fallas=$request->ng_fallas[$mat];
                            $calificacion2->ng_idNotaFK=$request->ng_idNotaFK[$mat];
                            $calificacion2->save();
                            $mat++;
                        }
                        $mat=0;
                    $estu++;  
                    }  
                }
                $estud=0;
                $obe=0;
                //Observaciones Generales
                foreach ($estudiantes as $es) {
                    if($es->es_idCursoFK==Auth::user()->us_idCursoFK){
                        for($i=0;$i<2;$i++){
                        $calificacion3 = new ObservacionesGenerales;
                        $calificacion3->og_idEstudianteFK=$request->og_idEstudianteFK[$estud];
                        $calificacion3->og_idObservacionesFK=$request->og_idObservacionesFK[$i];
                        $calificacion3->save();
                        $obe++;
                        }
                    }
                    $obe=0;
                }
    	return Redirect::to('calificaciones');
    }
    public function show($id){
    	return view("configuracion.calificaciones.show",["calificaciones"=>Calificaciones::findOrFail($id)]);
    }
    public function edit($id){
        $calificaciones=Calificaciones::findOrFail($id);
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
        return view("configuracion.competencias.edit",
                    ["estudiantes"=>$estudiantes,
                    "periodos"=>$periodos,
                    "materias"=>$materias,
                    "users"=>$users,
                    "procesos"=>$procesos,
                    "competencias"=>$competencias,
                    "notas"=>$notas,
                    "tobservaciones"=>$tobservaciones,
                    "observaciones"=>$observaciones]);
    }
    public function update(CompetenciasFormRequest $request,$id){
    	$calificaciones=Calificaciones::findOrFail($id);
        $calificacion->ca_anioCalificacion=$request->get('ca_anioCalificacion');
        $calificacion->ca_idEstudianteFK=$request->get('estudiante');
        $calificacion->ca_idPeriodoFK=$request->get('ca_idPeriodoFK');
        $calificacion->ca_idMateriaFK=$request->get('ca_idMateriaFK');
        $calificacion->ca_idUsuarioFK=$request->get('ca_idUsuarioFK');
        $calificacion->ca_idProcesoFK=$request->get('ca_idProcesoFK');
        $calificacion->ca_idCompetenciaFK=$request->get('ca_idCompetenciaFK');
        $calificacion->ca_idNotaFK=$request->get('ca_idNotaFK');
        //Notas Generales
        $calificacion->ng_idEstudianteFK=$request->get('estudiante');
        $calificacion->ng_idMateriaFK=$request->get('ng_idMateriaFK');
        $calificacion->ng_fallas=$request->get('ng_fallas');
        $calificacion->ng_idNotaFK=$request->get('ng_idNotaFK');
        //Observaciones Generales
        $calificacion->og_idEstudianteFK=$request->get('estudiante');
        $calificacion->og_idTipoObservacionFK=$request->get('og_idTipoObservacionFK');
        $calificacion->og_idObservacionesFK=$request->get('og_idObservacionesFK');

        $calificacion->update();
        return Redirect::to('calificaciones');
    }/*
    public function destroy($id){
    	$competencia=Competencias::findOrFail($id);
    	$competencia->co_estado='0';
    	$competencia->update();
    	return Redirect::to('competencias');
    }*/
}
