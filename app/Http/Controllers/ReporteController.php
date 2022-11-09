<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Anio;
use App\Models\Asignatura;
use App\Models\Matricula;
use App\Models\Nota;
use App\Models\Pendiente;
use App\Models\Retiro;

class ReporteController extends Controller
{

    public function constancia($id){
      
        $anio_activo=Anio::find(1);
        $matricula = Matricula::find($id); 
       
        return view('reportes.constancia', compact('matricula','anio_activo'));
    }

    public function inscripcion($id){
      
        $anio_activo=Anio::find(1);
        $matricula = Matricula::find($id); 
       
        return view('reportes.inscripcion', compact('matricula','anio_activo'));
    }

    public function boletin($id){
       
        $anio_activo=Anio::find(1);
        $matricula = Matricula::find($id); 
        $notas=Nota::where('matricula_id',$matricula->id)->get();

        $contar_notas=$notas->count()-2;

        //* * * * * * * * * * * * * * RESTAR NOTAS LITERALES A MOM1 * * * * * * * * * * * * * * * * * //

        $resta_i=Nota::join('anio_asignaturas', 'notas.anio_asignatura_id', 'anio_asignaturas.id')
                         ->join('asignaturas', 'anio_asignaturas.asignatura_id', 'asignaturas.id')
                         ->where('matricula_id',$matricula->id)
                         ->where('asignaturas.abreviado', 'Orient y Conv') 
                         ->sum('nota1');

        $resta_1=Nota::join('anio_asignaturas', 'notas.anio_asignatura_id', 'anio_asignaturas.id')
                         ->join('asignaturas', 'anio_asignaturas.asignatura_id', 'asignaturas.id')
                         ->where('matricula_id',$matricula->id)
                         ->where('asignaturas.abreviado', 'P.G.C.R.C.') 
                         ->sum('nota1');

        $lit_m1=$resta_i+$resta_1;

         //* * * * * * * * * * * * * * RESTAR NOTAS LITERALES A MOM2 * * * * * * * * * * * * * * * * * //

         $resta_ii=Nota::join('anio_asignaturas', 'notas.anio_asignatura_id', 'anio_asignaturas.id')
                ->join('asignaturas', 'anio_asignaturas.asignatura_id', 'asignaturas.id')
                ->where('matricula_id',$matricula->id)
                ->where('asignaturas.abreviado', 'Orient y Conv') 
                ->sum('nota2');

        $resta_2=Nota::join('anio_asignaturas', 'notas.anio_asignatura_id', 'anio_asignaturas.id')
                    ->join('asignaturas', 'anio_asignaturas.asignatura_id', 'asignaturas.id')
                    ->where('matricula_id',$matricula->id)
                    ->where('asignaturas.abreviado', 'P.G.C.R.C.') 
                    ->sum('nota2');

        $lit_m2=$resta_ii+$resta_2;

         //* * * * * * * * * * * * * * RESTAR NOTAS LITERALES A MOM3 * * * * * * * * * * * * * * * * * //

        $resta_iii=Nota::join('anio_asignaturas', 'notas.anio_asignatura_id', 'anio_asignaturas.id')
                    ->join('asignaturas', 'anio_asignaturas.asignatura_id', 'asignaturas.id')
                    ->where('matricula_id',$matricula->id)
                    ->where('asignaturas.abreviado', 'Orient y Conv') 
                    ->sum('nota3');

        $resta_3=Nota::join('anio_asignaturas', 'notas.anio_asignatura_id', 'anio_asignaturas.id')
                    ->join('asignaturas', 'anio_asignaturas.asignatura_id', 'asignaturas.id')
                    ->where('matricula_id',$matricula->id)
                    ->where('asignaturas.abreviado', 'P.G.C.R.C.') 
                    ->sum('nota3');

        $lit_m3=$resta_iii+$resta_3;


                 //* * * * * * * * * * * * * * RESTAR NOTAS LITERALES A DEF * * * * * * * * * * * * * * * * * //

        $resta_iv=Nota::join('anio_asignaturas', 'notas.anio_asignatura_id', 'anio_asignaturas.id')
                    ->join('asignaturas', 'anio_asignaturas.asignatura_id', 'asignaturas.id')
                    ->where('matricula_id',$matricula->id)
                    ->where('asignaturas.abreviado', 'Orient y Conv') 
                    ->sum('nota_def');

        $resta_4=Nota::join('anio_asignaturas', 'notas.anio_asignatura_id', 'anio_asignaturas.id')
                    ->join('asignaturas', 'anio_asignaturas.asignatura_id', 'asignaturas.id')
                    ->where('matricula_id',$matricula->id)
                    ->where('asignaturas.abreviado', 'P.G.C.R.C.') 
                    ->sum('nota_def');

        $lit_m4=$resta_iv+$resta_4;




        $mom1=Nota::join('anio_asignaturas', 'notas.anio_asignatura_id', 'anio_asignaturas.id')
                    ->where ('matricula_id', $id)
                    ->sum('nota1')-$lit_m1;

        $mom2=Nota::join('anio_asignaturas', 'notas.anio_asignatura_id', 'anio_asignaturas.id')
                    ->where ('matricula_id', $id)
                    ->sum('nota2')-$lit_m2;

        $mom3=Nota::join('anio_asignaturas', 'notas.anio_asignatura_id', 'anio_asignaturas.id')
                    ->where ('matricula_id', $id)
                    ->sum('nota3')-$lit_m3;

        $def_tt=Nota::join('anio_asignaturas', 'notas.anio_asignatura_id', 'anio_asignaturas.id')
                    ->where ('matricula_id', $id)
                    ->sum('nota_def')-$lit_m4;





     
        return view('reportes.boletin',  compact('notas','anio_activo', 'mom1', 'mom2', 'mom3', 'def_tt','contar_notas'));
    } 

    public function historial($id){

        $contar_matricula=Matricula::where('matriculas.alumno_id', $id)
                                    ->count();

        if($contar_matricula==0){
            return redirect('/alumnos')->with('message', 'Alumno no ha sido matriculado');  
        }

        $alumno = Alumno::find($id); 

        $notas=Nota::join('matriculas', 'notas.matricula_id', 'matriculas.id')
                ->join('anio_asignaturas', 'notas.anio_asignatura_id', 'anio_asignaturas.id')
                ->join('asignaturas', 'anio_asignaturas.asignatura_id', 'asignaturas.id')
                ->join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
                ->where('alumno_id', $alumno->id)
                ->get();

        $contar_notas=$notas->count();

        $pendientes=Pendiente::join('matriculas', 'pendientes.matricula_id', 'matriculas.id')
                ->join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
                ->join('anios', 'matriculas.anio_id', 'anios.id')
                ->join('grados', 'matriculas.grado_id', 'grados.id')
                ->join('seccions', 'matriculas.seccion_id', 'seccions.id')
                ->where('alumno_id', $alumno->id)
                ->get();
        
        $contar_pendientes=$pendientes->count();

        $anios=Anio::all();

        return view('reportes.historial', compact('alumno','notas', 'pendientes', 
        'contar_pendientes', 'contar_notas', 'anios'));
    }


    public function retiro($id){

        $retiro = Retiro::join('users','retiros.user_id','users.id') 
                        ->join('matriculas','retiros.matricula_id','matriculas.id')  
                        ->join('alumnos','matriculas.alumno_id','alumnos.id') 
                        ->where('retiros.id',$id)
                        ->select('retiros.*','users.*', 'alumnos.*','retiros.id as id')          
                        ->get();
 
        return view('reportes.retiro', compact('retiro'));
    }
}
