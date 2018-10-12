<?php

namespace GIDV\Http\Controllers;

use Request;

use GIDV\Http\Requests;

use Illuminate\Support\Facades\Redirect;

use GIDV\Http\Controllers\Controller;

use DB;

use PDF;

use GIDV\Calificaciones;

use GIDV\NotasGenerales;

use GIDV\ObservacionesGenerales;

use Illuminate\Support\Facades\Auth;

use GIDV\Http\Requests\PDFCuRequest;

use GIDV\Http\Requests\PDFEsRequest;

class BoletinesController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function index(Request $request){
    	if($request){

    		$calificaciones=DB::table('calificaciones as c')

            ->join('estudiantes as e','c.ca_idEstudianteFK','=','e.es_idEstudiante')

            ->join('periodos as p','c.ca_idPeriodoFK','=','p.pe_idPeriodo')

            ->join('materias as m','c.ca_idMateriaFK','=','m.ma_idMateria')

            ->join('procesos as pro','c.ca_idProcesoFK','=','pro.pro_idProceso')

            ->join('competencias as co','c.ca_idCompetenciaFK','=','co.co_idCompetencia')

            ->join('notas as n','c.ca_idNotaFK','=','n.no_idNota')

            ->select('c.ca_idCalificacion','c.ca_anioCalificacion','e.es_nombre as nombreEs','e.es_apellido as apellidoEs','p.pe_nombre as periodo','m.ma_nombre as materia','pro.pro_nombre as proceso','co.co_descripcion as competencia','n.no_nombre as nota')


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

            ->join('periodos as p','ng.ng_idPeriodoFK','=','p.pe_idPeriodo')

            ->select('ng.ng_idNotaGeneral','ng.ng_anioCalificacion','e.es_nombre as nombreEs','e.es_apellido as apellidoEs','us.name as docente1','us.us_apellido as docente2','p.pe_nombre as periodo','m.ma_nombre as materia','ng.ng_fallas','n.no_descripcion as nota')

            ->paginate(9);

            $observacionesgenerales=DB::table('observacionesgenerales as og')

            ->join('estudiantes as e','og.og_idEstudianteFK','=','e.es_idEstudiante')

            ->join('observaciones as ob','og.og_idObservacionesFK','=','ob.ob_idObservaciones')

            ->join('periodos as p','og.og_idPeriodoFK','=','p.pe_idPeriodo')

            ->select('og.og_idObservacionGeneral','og.og_anioCalificacion','e.es_nombre as nombreEs','e.es_apellido as apellidoEs','p.pe_nombre as periodo','ob.ob_descripcion as observacion');

            $periodos=DB::table('periodos')
                                        ->orderBy('pe_idPeriodo','asc')
                                        ->get();

            $cursos=DB::table('cursos')
                                        ->where('cu_idCurso','<>','10')
                                        ->where('cu_estado','=','1')
                                        ->orderBy('cu_idCurso','asc')
                                        ->get();

            $estudiantes=DB::table('estudiantes')
                                        ->where('es_estado','=','1')
                                        ->orderBy('es_idEstudiante','asc')
                                        ->get();

    		return view('configuracion.boletines.index',["calificaciones"=>$calificaciones,"notasgenerales"=>$notasgenerales,"observacionesgenerales"=>$observacionesgenerales,"periodos"=>$periodos,"cursos"=>$cursos,"estudiantes"=>$estudiantes]);
        	}    
        }

        public function show($id){
        return view("configuracion.boletines.show",["calificaciones"=>Calificaciones::findOrFail($id)]);
        }

        public function cursos(){
            $calificaciones=DB::table('calificaciones as c')

            ->join('estudiantes as e','c.ca_idEstudianteFK','=','e.es_idEstudiante')

            ->join('periodos as p','c.ca_idPeriodoFK','=','p.pe_idPeriodo')

            ->join('materias as m','c.ca_idMateriaFK','=','m.ma_idMateria')

            ->join('procesos as pro','c.ca_idProcesoFK','=','pro.pro_idProceso')

            ->join('competencias as co','c.ca_idCompetenciaFK','=','co.co_idCompetencia')

            ->join('notas as n','c.ca_idNotaFK','=','n.no_idNota')

            ->select('c.ca_idCalificacion','c.ca_anioCalificacion','e.es_nombre as nombreEs','e.es_apellido as apellidoEs','p.pe_nombre as periodo','m.ma_nombre as materia','pro.pro_nombre as proceso','co.co_descripcion as competencia','n.no_nombre as nota')


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

            ->join('periodos as p','ng.ng_idPeriodoFK','=','p.pe_idPeriodo')

            ->select('ng.ng_idNotaGeneral','ng.ng_anioCalificacion','e.es_nombre as nombreEs','e.es_apellido as apellidoEs','us.name as docente1','us.us_apellido as docente2','p.pe_nombre as periodo','m.ma_nombre as materia','ng.ng_fallas','n.no_descripcion as nota')

            ->paginate(9);

            $observacionesgenerales=DB::table('observacionesgenerales as og')

            ->join('estudiantes as e','og.og_idEstudianteFK','=','e.es_idEstudiante')

            ->join('observaciones as ob','og.og_idObservacionesFK','=','ob.ob_idObservaciones')

            ->join('periodos as p','og.og_idPeriodoFK','=','p.pe_idPeriodo')

            ->select('og.og_idObservacionGeneral','og.og_anioCalificacion','e.es_nombre as nombreEs','e.es_apellido as apellidoEs','p.pe_nombre as periodo','ob.ob_descripcion as observacion');

             $estudiantes=DB::table('estudiantes')
                                        ->where('es_estado','=','1')
                                        ->orderBy('es_nombre','asc')
                                        ->get();
            $periodos=DB::table('periodos')
                                            ->where('pe_estado','=','1')
                                            ->orderBy('pe_nombre','asc')
                                            ->get();
            $perio=DB::table('periodos')
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
            return view('configuracion.boletines.cursosPDF')
                    ->with(["estudiantes"=>$estudiantes,
                    "calificaciones"=>$calificaciones,
                    "notasgenerales"=>$notasgenerales,
                    "observacionesgenerales"=>$observacionesgenerales,
                    "perio"=>$perio,
                    "periodos"=>$periodos,
                    "materias"=>$materias,
                    "users"=>$users,
                    "procesos"=>$procesos,
                    "competencias"=>$competencias,
                    "notas"=>$notas,
                    "tobservaciones"=>$tobservaciones,
                    "observaciones"=>$observaciones]);
        }

        public function estudiantes(){
            $calificaciones=DB::table('calificaciones as c')

            ->join('estudiantes as e','c.ca_idEstudianteFK','=','e.es_idEstudiante')

            ->join('periodos as p','c.ca_idPeriodoFK','=','p.pe_idPeriodo')

            ->join('materias as m','c.ca_idMateriaFK','=','m.ma_idMateria')

            ->join('procesos as pro','c.ca_idProcesoFK','=','pro.pro_idProceso')

            ->join('competencias as co','c.ca_idCompetenciaFK','=','co.co_idCompetencia')

            ->join('notas as n','c.ca_idNotaFK','=','n.no_idNota')

            ->select('c.ca_idCalificacion','c.ca_anioCalificacion','e.es_nombre as nombreEs','e.es_apellido as apellidoEs','p.pe_nombre as periodo','m.ma_nombre as materia','pro.pro_nombre as proceso','co.co_descripcion as competencia','n.no_nombre as nota');

            $notasgenerales=DB::table('notasgenerales as ng')

            ->join('estudiantes as e','ng.ng_idEstudianteFK','=','e.es_idEstudiante')

            ->join('users as us','ng.ng_idUsuarioFK','=','us.id')

            ->join('materias as m','ng.ng_idMateriaFK','=','m.ma_idMateria')

            ->join('notas as n','ng.ng_idNotaFK','=','n.no_idNota')

            ->join('periodos as p','ng.ng_idPeriodoFK','=','p.pe_idPeriodo')

            ->select('ng.ng_idNotaGeneral','ng.ng_anioCalificacion','e.es_nombre as nombreEs','e.es_apellido as apellidoEs','us.name as docente1','us.us_apellido as docente2','p.pe_nombre as periodo','m.ma_nombre as materia','ng.ng_fallas','n.no_descripcion as nota');

            $observacionesgenerales=DB::table('observacionesgenerales as og')

            ->join('estudiantes as e','og.og_idEstudianteFK','=','e.es_idEstudiante')

            ->join('observaciones as ob','og.og_idObservacionesFK','=','ob.ob_idObservaciones')

            ->join('periodos as p','og.og_idPeriodoFK','=','p.pe_idPeriodo')

            ->select('og.og_idObservacionGeneral','og.og_anioCalificacion','e.es_nombre as nombreEs','e.es_apellido as apellidoEs','p.pe_nombre as periodo','ob.ob_descripcion as observacion');
             $estudiantes=DB::table('estudiantes')

                                        ->where('es_estado','=','1')
                                        ->orderBy('es_nombre','asc')
                                        ->get();
            $periodos=DB::table('periodos')
                                            ->where('pe_estado','=','1')
                                            ->orderBy('pe_nombre','asc')
                                            ->get();
            $perio=DB::table('periodos')
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
            $ess=4;

            return view('configuracion.boletines.estudiantesPDF',
                    ["estudiantes"=>$estudiantes,
                    "calificaciones"=>$calificaciones,
                    "notasgenerales"=>$notasgenerales,
                    "observacionesgenerales"=>$observacionesgenerales,
                    "perio"=>$perio,
                    "periodos"=>$periodos,
                    "materias"=>$materias,
                    "users"=>$users,
                    "procesos"=>$procesos,
                    "competencias"=>$competencias,
                    "notas"=>$notas,
                    "tobservaciones"=>$tobservaciones,
                    "observaciones"=>$observaciones,
                    "users"=>$users,
                    "ess"=>$ess]);
        }

        public function cursosPDF(PDFCuRequest $request){
             $calificaciones=DB::table('calificaciones')->get();

            $notasgenerales=DB::table('notasgenerales')->get();

            $observacionesgenerales=DB::table('observacionesgenerales')->get();

             $estudiantes=DB::table('estudiantes')

                                        ->where('es_estado','=','1')
                                        ->orderBy('es_nombre','asc')
                                        ->get();
            $periodos=DB::table('periodos')('pe_estado','=','1')
                                            ->order
                                            ->whereBy('pe_nombre','asc')
                                            ->get();
            $perio=DB::table('periodos')
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
            $pdf=PDF::loadView('configuracion.boletines.cursosPDF',["estudiantes"=>$estudiantes,
                    "calificaciones"=>$calificaciones,
                    "notasgenerales"=>$notasgenerales,
                    "observacionesgenerales"=>$observacionesgenerales,
                    "perio"=>$perio,
                    "periodos"=>$periodos,
                    "materias"=>$materias,
                    "users"=>$users,
                    "procesos"=>$procesos,
                    "competencias"=>$competencias,
                    "notas"=>$notas,
                    "tobservaciones"=>$tobservaciones,
                    "observaciones"=>$observaciones]);
            return $pdf->stream();
        }

        public function estudiantesPDF(){
            
            $anio=Request::get('anioEs');

            $ess=Request::get('estudiante');

            $perEs=Request::get('periodoEs');

            $calificaciones=DB::table('calificaciones')
                                ->where('ca_idEstudianteFK','=',$ess)
                                ->where('ca_idPeriodoFK','=',$perEs)
                                ->where('ca_anioCalificacion','=',$anio)
                                ->get();

            $notasgenerales=DB::table('notasgenerales')
                                ->where('ng_idEstudianteFK','=',$ess)
                                ->where('ng_idPeriodoFK','=',$perEs)
                                ->where('ng_anioCalificacion','=',$anio)
                                ->get();

            $observacionesgenerales=DB::table('observacionesgenerales')
                                ->where('og_idEstudianteFK','=',$ess)
                                ->where('og_idPeriodoFK','=',$perEs)
                                ->where('og_anioCalificacion','=',$anio)
                                ->get();

            $estudiantes=DB::table('estudiantes')
                                        ->where('es_idEstudiante','=',$ess)
                                        ->get();
            $periodos=DB::table('periodos')
                                        ->where('pe_idPeriodo','=',$perEs )
                                        ->orderBy('pe_nombre','asc')
                                        ->get();
            $perio=DB::table('periodos')
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
            $grados=DB::table('grados')->get();
            $cursos=DB::table('cursos')->get();
            $notas=DB::table('notas')->get();
            if(count($calificaciones)>0 && count($notasgenerales)>0 && count($observacionesgenerales)>0){
                $pdf=PDF::loadView('configuracion.boletines.estudiantesPDF',["estudiantes"=>$estudiantes,
                    "calificaciones"=>$calificaciones,
                    "notasgenerales"=>$notasgenerales,
                    "observacionesgenerales"=>$observacionesgenerales,
                    "perio"=>$perio,
                    "periodos"=>$periodos,
                    "materias"=>$materias,
                    "users"=>$users,
                    "procesos"=>$procesos,
                    "competencias"=>$competencias,
                    "notas"=>$notas,
                    "tobservaciones"=>$tobservaciones,
                    "observaciones"=>$observaciones,
                    "anio"=>$anio,
                    "ess"=>$ess,
                    "perEs"=>$perEs,
                    "grados"=>$grados,
                    "cursos"=>$cursos,
                    "notas"=>$notas]);
            return $pdf->stream(); 
                
            }
            else{
                return Redirect::to('boletines')->with('error','No se encontraron registros en la base de datos');
            }
        }
}