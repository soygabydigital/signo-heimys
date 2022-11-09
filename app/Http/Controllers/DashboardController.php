<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Anio;
use App\Models\Grado;
use App\Models\Seccion;
use App\Models\Matricula;
use App\Models\Pendiente;
use App\Models\Retiro;
use Illuminate\View\View;
use Illuminate\Http\Request;



class DashboardController extends Controller
{
    public function index(){
        $anio_activo=Anio::find(1);           

        if (is_null($anio_activo)){
             return redirect('/anios');   
       
        }elseif (empty($anio_activo->id_activo)){ 
             return redirect('/anios');   
        }
        else{session(['activo' => $anio_activo->numero]);  
   
        // * * * * * * * * * * MATRICULA GENERAL * * * * * * * * * *    
   
        // * *  PARA RESTAR LA MATRICULA EGRESADA POR GENERO, REPITIENTE Y MATERIA PENDIENTE * * //
             
        //* * * * * * * * * * * * FEMEMINO * * * * * * * * * * * *//

       /* $mat_egr_fem=Matricula::join('alumnos','alumnos.id','matriculas.alumno_id')
                  ->where('estatus','egreso')
                  ->where('genero','F')
                  ->where('anio_id',$anio_activo->id_activo)
                  ->count();*/
             
        //* * * * * * * * * * * * MASCULINO * * * * * * * * * * * *//
       /* $mat_egr_mas=Matricula::join('alumnos','alumnos.id','matriculas.alumno_id')
                  ->where('estatus','egreso')
                  ->where('genero','M')
                  ->where('anio_id',$anio_activo->id_activo)
                  ->count(); */
        
        //* * * * * * * * * * * * REPITIENTE * * * * * * * * * * * *//
      /*  $mat_egr_rep=Matricula::join('alumnos','alumnos.id','matriculas.alumno_id')
                  ->where('estatus','egreso')
                  ->where('repite','1')
                  ->where('anio_id',$anio_activo->id_activo)
                  ->count();*/
        
        //* * * * * * * * * * * * MATERIA PTE. * * * * * * * * * * * *//
     /*   $mat_egr_mp=Matricula::join('alumnos','alumnos.id','matriculas.alumno_id')
                  ->where('estatus','egreso')
                  /*->where(function ($pendiente) {
                       $pendiente->orwhereNotNull('mat_pend1');
                       $pendiente->orwhereNotNull('mat_pend2');
                  })  */
                //  ->where('anio_id',$anio_activo->id_activo)
                 /* ->count();*/
   
        // * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *//
        // * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *//
   
        //* * * * * * * * * * * * TOTAL TOTAL FEMEMINOS * * * * * * * * * * * *//
        $mat_gen_fem=Matricula::join('alumnos','alumnos.id','matriculas.alumno_id')
                  ->where('anio_id',$anio_activo->id_activo) 
                  ->where('alumnos.genero','F')
                  ->count();    
   
        //* * * * * * * * * * * * TOTAL TOTAL MASCULINOS * * * * * * * * * * * *//
        $mat_gen_mas=Matricula::join('alumnos','alumnos.id','matriculas.alumno_id')
                  ->where('anio_id',$anio_activo->id_activo) 
                  ->where('genero','M')
                  ->count(); 
   
        //* * * * * * * * * * * * TOTAL TOTAL INGRESOS * * * * * * * * * * * *//
        $mat_ing=Matricula::where('estatus','ingreso')
                  ->where('anio_id',$anio_activo->id_activo)
                  ->count();
   
        //* * * * * * * * * * * * TOTAL TOTAL EGRESOS * * * * * * * * * * * *//
          
       $mat_egr=Retiro::join('matriculas', 'retiros.matricula_id', 'matriculas.id')
                         ->where('anio_id',$anio_activo->id_activo)
                         ->count();
    
        //* * * * * * * * * * * * TOTAL TOTAL EQUIVALENCIAS * * * * * * * * * * * *//
        $mat_equ=Matricula::where('estatus','Equivalencia') 
                  ->where('anio_id',$anio_activo->id_activo)
                  ->count();                                       
   
        //* * * * * * * * * * * * TOTAL TOTAL REPITIENTES * * * * * * * * * * * *//
        $mat_rep=Matricula::where('repite','1')
                  ->where('anio_id',$anio_activo->id_activo)
                  ->count();
        
        //* * * * * * * * * * * * TOTAL TOTAL MATERIA PTE. * * * * * * * * * * * *//
        $mat_mp=Pendiente:://groupby('materia')
                  //where('matricula_id',78)
        //->where('anio_id',$anio_activo->id_activo)
                  
                    
                /*  ->where(function ($pendiente) {
                       $pendiente->orwhereNotNull('mat_pend1');
                       $pendiente->orwhereNotNull('mat_pend2');
                  })      */              
                  count(); 
   
        //* * * * * * * * * * * * TOTAL TOTAL MATRICULA * * * * * * * * * * * *//
        $matricula=Matricula::where('anio_id',$anio_activo->id_activo)              
                  ->count();
   
   
        //* * * * * * * * * * * * ARREGLO MATRICULA GENERAL * * * * * * * * * * * *//
        $matriculas=['anio_activo'=>$anio_activo,'matricula'=>$matricula,
             'mat_gen_mas'=>$mat_gen_mas,'mat_gen_fem'=>$mat_gen_fem,
             'mat_ing'=>$mat_ing,'mat_egr'=>$mat_egr,'mat_equ'=>$mat_equ,
             'mat_rep'=>$mat_rep,'mat_mp'=>$mat_mp
                   ];
   
   
        // * * * * * * * * * * MATRICULA POR GRADO * * * * * * * * * *    
        $anio_activo=Anio::find(1);
        $contar=Grado::where('estado','1')->count(); 
        $grados=Grado::where('estado','1')->get(); 
           
        $i=0;      
        if($contar==0){
        return redirect('/grados')->with('notice','Debe asignar Grado al Sistema'); 
        }
           
        $media_grado=$matricula/$contar;


        foreach ($grados as $grado){
   
             // * *  PARA RESTAR LA MATRICULA EGRESADA POR AÑO, GENERO, REPITIENTE Y MATERIA PENDIENTE * * //
   
             //* * * * * * * * * * * * FEMEMINO * * * * * * * * * * * *//
            /* $tt_egr_fem[$i]=Matricula::join('alumnos','alumnos.id','matriculas.alumno_id')
                       ->where('anio_id',$anio_activo->id_activo)
                       ->where('grado_id',$grado->id)
                       ->where('genero','F')
                       ->where('estatus','Egreso')
                       ->count();*/
   
             //* * * * * * * * * * * * MASCULINO * * * * * * * * * * * *//
            /* $tt_egr_mas[$i]=Matricula::join('alumnos','alumnos.id','matriculas.alumno_id')
                       ->where('anio_id',$anio_activo->id_activo)
                       ->where('grado_id',$grado->id)
                       ->where('genero','M')
                       ->where('estatus','Egreso')
                       ->count();*/
   
             //* * * * * * * * * * * * REPITIENTE * * * * * * * * * * * *//
            /* $tt_egr_rep[$i]=Matricula::join('alumnos','alumnos.id','matriculas.alumno_id')
                       ->where('anio_id',$anio_activo->id_activo)
                       ->where('grado_id',$grado->id)
                       ->where('repite','1')
                       ->where('estatus','Egreso')
                       ->count();*/
   
             //* * * * * * * * * * * * MATERIA PTE. * * * * * * * * * * * *//
            /* $tt_egr_mp[$i]=Matricula::join('alumnos','alumnos.id','matriculas.alumno_id')
                       ->where('anio_id',$anio_activo->id_activo)
                       ->where('grado_id',$grado->id)*/
                       /*->where(function ($pendiente) {
                            $pendiente->orwhereNotNull('mat_pend1');
                            $pendiente->orwhereNotNull('mat_pend2');
                       })*/
                    /*   ->where('estatus','Egreso')
                       ->count();*/
             
             // * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *//
             // * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *//
   
             //* * * * * * * * * * * * TOTAL DE FEMENINOS POR GRADO * * * * * * * * * * * *//
             $tt_fem[$i]=Matricula::join('alumnos','alumnos.id','matriculas.alumno_id')
                       ->where('anio_id',$anio_activo->id_activo)
                       ->where('grado_id',$grado->id)
                       ->where('genero','F')
                       ->count();
           
             //* * * * * * * * * * * * TOTAL DE MASCULINOS POR GRADO * * * * * * * * * * * *//
             $tt_mas[$i]=Matricula::join('alumnos','alumnos.id','matriculas.alumno_id')
                       ->where('anio_id',$anio_activo->id_activo)
                       ->where('grado_id',$grado->id)
                       ->where('genero','M')
                       ->count();
           
             //* * * * * * * * * * * * TOTAL DE INGRESOS POR GRADO * * * * * * * * * * * *//
             $tt_ing[$i]=Matricula::where('anio_id',$anio_activo->id_activo)
                       ->where('grado_id',$grado->id)
                       ->where('estatus','Ingreso')
                       ->count();
        
             //* * * * * * * * * * * * TOTAL DE EGRESOS POR GRADO * * * * * * * * * * * *//

             $tt_egr[$i]=Retiro::join('matriculas', 'retiros.matricula_id', 'matriculas.id')
                              ->where('anio_id',$anio_activo->id_activo)
                              ->where('grado_id', $grado->id)
                              ->count();
           
             //* * * * * * * * * * * * TOTAL DE MATRICULA POR GRADO * * * * * * * * * * * *//
             $tt[$i]=Matricula::where('anio_id',$anio_activo->id_activo)
                       ->where('grado_id',$grado->id)
                       ->count();     
                       
             //* * * * * * * * * * * * TOTAL DE EQUIVALENCIA POR GRADO * * * * * * * * * * * *//        
             $tt_equ[$i]=Matricula::where('anio_id',$anio_activo->id_activo)
                       ->where('grado_id',$grado->id)
                       ->where('estatus','Equivalencia')
                       ->count();                    
           
             //* * * * * * * * * * * * TOTAL DE REPITIENTES POR GRADO * * * * * * * * * * * *//
             $tt_rep[$i]=Matricula::where('anio_id',$anio_activo->id_activo)
                       ->where('grado_id',$grado->id)
                       ->where('repite','1')
                       ->count();
           
             //* * * * * * * * * * * * TOTAL DE MATERIA PTE. POR GRADO * * * * * * * * * * * *//
             $tt_mp[$i]=Matricula::where('anio_id',$anio_activo->id_activo)
                       ->where('grado_id',$grado->id) 
                       /*->where(function ($pendiente) {
                            $pendiente->orwhereNotNull('mat_pend1');
                            $pendiente->orwhereNotNull('mat_pend2');
                       })*/
                       ->count();                    
        $i=$i+1; 
        
        }



        // * * * * * * * * * * * * * *  Matricula 1ero A * * * * * * * * * * * * * * * * *//
         $mat_1a=Matricula::where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '1')
                              ->where('seccion_id', '1')
                              ->count();

          $mat_1a_fem=Matricula::join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
                              ->where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '1')
                              ->where('seccion_id', '1')
                              ->where('genero', 'F')
                              ->count();

          $mat_1a_mas=Matricula::join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
                              ->where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '1')
                              ->where('seccion_id', '1')
                              ->where('genero', 'M')
                              ->count();

          $mat_1a_in=Matricula::where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '1')
                              ->where('seccion_id', '1')
                              ->where('estatus', 'ingreso')
                              ->count();

          $mat_1a_ret=Retiro::join('matriculas', 'retiros.matricula_id', 'matriculas.id')
                              ->where('anio_id',$anio_activo->id_activo)
                              ->where('grado_id', '1')
                              ->where('seccion_id', '1')
                              ->count();

          $mat_1a_eq=Matricula::where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '1')
                              ->where('seccion_id', '1')
                              ->where('estatus', 'equivalencia')
                              ->count();

          $mat_1a_rep=Matricula::where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '1')
                              ->where('seccion_id', '1')
                              ->where('repite', '1')
                              ->count();

     // * * * * * * * * * * * * * *  Matricula 1ero B * * * * * * * * * * * * * * * * *//
          $mat_1b=Matricula::where('anio_id', $anio_activo->id_activo)
                    ->where('grado_id', '1')
                    ->where('seccion_id', '2')
                    ->count();

               $mat_1b_fem=Matricula::join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
                    ->where('anio_id', $anio_activo->id_activo)
                    ->where('grado_id', '1')
                    ->where('seccion_id', '2')
                    ->where('genero', 'F')
                    ->count();

               $mat_1b_mas=Matricula::join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
                    ->where('anio_id', $anio_activo->id_activo)
                    ->where('grado_id', '1')
                    ->where('seccion_id', '2')
                    ->where('genero', 'M')
                    ->count();

               $mat_1b_in=Matricula::where('anio_id', $anio_activo->id_activo)
                    ->where('grado_id', '1')
                    ->where('seccion_id', '2')
                    ->where('estatus', 'ingreso')
                    ->count();

               $mat_1b_ret=Retiro::join('matriculas', 'retiros.matricula_id', 'matriculas.id')
                    ->where('anio_id',$anio_activo->id_activo)
                    ->where('grado_id', '1')
                    ->where('seccion_id', '2')
                    ->count();

               $mat_1b_eq=Matricula::where('anio_id', $anio_activo->id_activo)
                    ->where('grado_id', '1')
                    ->where('seccion_id', '2')
                    ->where('estatus', 'equivalencia')
                    ->count();

               $mat_1b_rep=Matricula::where('anio_id', $anio_activo->id_activo)
                    ->where('grado_id', '1')
                    ->where('seccion_id', '2')
                    ->where('repite', '1')
                    ->count();

          // * * * * * * * * * * * * * *  Matricula 1ero C * * * * * * * * * * * * * * * * *//
               $mat_1c=Matricula::where('anio_id', $anio_activo->id_activo)
                    ->where('grado_id', '1')
                    ->where('seccion_id', '3')
                    ->count();
                         
               $mat_1c_fem=Matricula::join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
                    ->where('anio_id', $anio_activo->id_activo)
                    ->where('grado_id', '1')
                    ->where('seccion_id', '3')
                    ->where('genero', 'F')
                    ->count();
                         
               $mat_1c_mas=Matricula::join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
                    ->where('anio_id', $anio_activo->id_activo)
                    ->where('grado_id', '1')
                    ->where('seccion_id', '3')
                    ->where('genero', 'M')
                    ->count();
                         
               $mat_1c_in=Matricula::where('anio_id', $anio_activo->id_activo)
                    ->where('grado_id', '1')
                    ->where('seccion_id', '3')
                    ->where('estatus', 'ingreso')
                    ->count();
                         
               $mat_1c_ret=Retiro::join('matriculas', 'retiros.matricula_id', 'matriculas.id')
                    ->where('anio_id',$anio_activo->id_activo)
                    ->where('grado_id', '1')
                    ->where('seccion_id', '3')
                    ->count();
                         
               $mat_1c_eq=Matricula::where('anio_id', $anio_activo->id_activo)
                    ->where('grado_id', '1')
                    ->where('seccion_id', '3')
                    ->where('estatus', 'equivalencia')
                    ->count();
                         
               $mat_1c_rep=Matricula::where('anio_id', $anio_activo->id_activo)
                    ->where('grado_id', '1')
                    ->where('seccion_id', '3')
                    ->where('repite', '1')
                    ->count();

          $media_1=($mat_1a+$mat_1b+$mat_1c)/3;

// * * * * * * * * * * * * * *  Matricula 2ero A * * * * * * * * * * * * * * * * *//
               $mat_2a=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '2')
               ->where('seccion_id', '1')
               ->count();

               $mat_2a_fem=Matricula::join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
               ->where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '2')
               ->where('seccion_id', '1')
               ->where('genero', 'F')
               ->count();

               $mat_2a_mas=Matricula::join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
               ->where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '2')
               ->where('seccion_id', '1')
               ->where('genero', 'M')
               ->count();

               $mat_2a_in=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '2')
               ->where('seccion_id', '1')
               ->where('estatus', 'ingreso')
               ->count();

               $mat_2a_ret=Retiro::join('matriculas', 'retiros.matricula_id', 'matriculas.id')
               ->where('anio_id',$anio_activo->id_activo)
               ->where('grado_id', '2')
               ->where('seccion_id', '1')
               ->count();

               $mat_2a_eq=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '2')
               ->where('seccion_id', '1')
               ->where('estatus', 'equivalencia')
               ->count();

               $mat_2a_rep=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '2')
               ->where('seccion_id', '1')
               ->where('repite', '1')
               ->count();


               // * * * * * * * * * * * * * *  Matricula 2ero B * * * * * * * * * * * * * * * * *//
               $mat_2b=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '2')
               ->where('seccion_id', '2')
               ->count();

               $mat_2b_fem=Matricula::join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
               ->where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '2')
               ->where('seccion_id', '2')
               ->where('genero', 'F')
               ->count();

               $mat_2b_mas=Matricula::join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
               ->where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '2')
               ->where('seccion_id', '2')
               ->where('genero', 'M')
               ->count();

               $mat_2b_in=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '2')
               ->where('seccion_id', '2')
               ->where('estatus', 'ingreso')
               ->count();

               $mat_2b_ret=Retiro::join('matriculas', 'retiros.matricula_id', 'matriculas.id')
               ->where('anio_id',$anio_activo->id_activo)
               ->where('grado_id', '2')
               ->where('seccion_id', '2')
               ->count();

               $mat_2b_eq=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '2')
               ->where('seccion_id', '2')
               ->where('estatus', 'equivalencia')
               ->count();

               $mat_2b_rep=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '2')
               ->where('seccion_id', '2')
               ->where('repite', '1')
               ->count();
               // * * * * * * * * * * * * * *  Matricula 2ero C * * * * * * * * * * * * * * * * *//
               $mat_2c=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '2')
               ->where('seccion_id', '3')
               ->count();

               $mat_2c_fem=Matricula::join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
               ->where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '2')
               ->where('seccion_id', '3')
               ->where('genero', 'F')
               ->count();

               $mat_2c_mas=Matricula::join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
               ->where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '2')
               ->where('seccion_id', '3')
               ->where('genero', 'M')
               ->count();

               $mat_2c_in=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '2')
               ->where('seccion_id', '3')
               ->where('estatus', 'ingreso')
               ->count();

               $mat_2c_ret=Retiro::join('matriculas', 'retiros.matricula_id', 'matriculas.id')
               ->where('anio_id',$anio_activo->id_activo)
               ->where('grado_id', '2')
               ->where('seccion_id', '3')
               ->count();

               $mat_2c_eq=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '2')
               ->where('seccion_id', '3')
               ->where('estatus', 'equivalencia')
               ->count();

               $mat_2c_rep=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '2')
               ->where('seccion_id', '3')
               ->where('repite', '1')
               ->count();

               $media_2=($mat_2a+$mat_2b+$mat_2c)/3;              

               // * * * * * * * * * * * * * *  Matricula 3ero A * * * * * * * * * * * * * * * * *//
               $mat_3a=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '3')
               ->where('seccion_id', '1')
               ->count();

               $mat_3a_fem=Matricula::join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
               ->where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '3')
               ->where('seccion_id', '1')
               ->where('genero', 'F')
               ->count();

               $mat_3a_mas=Matricula::join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
               ->where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '3')
               ->where('seccion_id', '1')
               ->where('genero', 'M')
               ->count();

               $mat_3a_in=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '3')
               ->where('seccion_id', '1')
               ->where('estatus', 'ingreso')
               ->count();

               $mat_3a_ret=Retiro::join('matriculas', 'retiros.matricula_id', 'matriculas.id')
               ->where('anio_id',$anio_activo->id_activo)
               ->where('grado_id', '3')
               ->where('seccion_id', '1')
               ->count();

               $mat_3a_eq=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '3')
               ->where('seccion_id', '1')
               ->where('estatus', 'equivalencia')
               ->count();

               $mat_3a_rep=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '3')
               ->where('seccion_id', '1')
               ->where('repite', '1')
               ->count();


               // * * * * * * * * * * * * * *  Matricula 3ero B * * * * * * * * * * * * * * * * *//
               $mat_3b=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '3')
               ->where('seccion_id', '2')
               ->count();

               $mat_3b_fem=Matricula::join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
               ->where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '3')
               ->where('seccion_id', '2')
               ->where('genero', 'F')
               ->count();

               $mat_3b_mas=Matricula::join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
               ->where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '3')
               ->where('seccion_id', '2')
               ->where('genero', 'M')
               ->count();

               $mat_3b_in=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '3')
               ->where('seccion_id', '2')
               ->where('estatus', 'ingreso')
               ->count();

               $mat_3b_ret=Retiro::join('matriculas', 'retiros.matricula_id', 'matriculas.id')
               ->where('anio_id',$anio_activo->id_activo)
               ->where('grado_id', '3')
               ->where('seccion_id', '2')
               ->count();

               $mat_3b_eq=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '3')
               ->where('seccion_id', '2')
               ->where('estatus', 'equivalencia')
               ->count();

               $mat_3b_rep=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '3')
               ->where('seccion_id', '2')
               ->where('repite', '1')
               ->count();
               // * * * * * * * * * * * * * *  Matricula 3ero C * * * * * * * * * * * * * * * * *//
               $mat_3c=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '3')
               ->where('seccion_id', '3')
               ->count();

               $mat_3c_fem=Matricula::join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
               ->where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '3')
               ->where('seccion_id', '3')
               ->where('genero', 'F')
               ->count();

               $mat_3c_mas=Matricula::join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
               ->where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '3')
               ->where('seccion_id', '3')
               ->where('genero', 'M')
               ->count();

               $mat_3c_in=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '3')
               ->where('seccion_id', '3')
               ->where('estatus', 'ingreso')
               ->count();

               $mat_3c_ret=Retiro::join('matriculas', 'retiros.matricula_id', 'matriculas.id')
               ->where('anio_id',$anio_activo->id_activo)
               ->where('grado_id', '3')
               ->where('seccion_id', '3')
               ->count();

               $mat_3c_eq=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '3')
               ->where('seccion_id', '3')
               ->where('estatus', 'equivalencia')
               ->count();

               $mat_3c_rep=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '3')
               ->where('seccion_id', '3')
               ->where('repite', '1')
               ->count();

               $media_3=($mat_3a+$mat_3b+$mat_3c)/3;

               // * * * * * * * * * * * * * *  Matricula 4to A * * * * * * * * * * * * * * * * *//
               $mat_4a=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '4')
               ->where('seccion_id', '1')
               ->count();

               $mat_4a_fem=Matricula::join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
               ->where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '4')
               ->where('seccion_id', '1')
               ->where('genero', 'F')
               ->count();

               $mat_4a_mas=Matricula::join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
               ->where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '4')
               ->where('seccion_id', '1')
               ->where('genero', 'M')
               ->count();

               $mat_4a_in=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '4')
               ->where('seccion_id', '1')
               ->where('estatus', 'ingreso')
               ->count();

               $mat_4a_ret=Retiro::join('matriculas', 'retiros.matricula_id', 'matriculas.id')
               ->where('anio_id',$anio_activo->id_activo)
               ->where('grado_id', '4')
               ->where('seccion_id', '1')
               ->count();

               $mat_4a_eq=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '4')
               ->where('seccion_id', '1')
               ->where('estatus', 'equivalencia')
               ->count();

               $mat_4a_rep=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '4')
               ->where('seccion_id', '1')
               ->where('repite', '1')
               ->count();


               // * * * * * * * * * * * * * *  Matricula 4to B * * * * * * * * * * * * * * * * *//
               $mat_4b=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '4')
               ->where('seccion_id', '2')
               ->count();

               $mat_4b_fem=Matricula::join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
               ->where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '4')
               ->where('seccion_id', '2')
               ->where('genero', 'F')
               ->count();

               $mat_4b_mas=Matricula::join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
               ->where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '4')
               ->where('seccion_id', '2')
               ->where('genero', 'M')
               ->count();

               $mat_4b_in=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '4')
               ->where('seccion_id', '2')
               ->where('estatus', 'ingreso')
               ->count();

               $mat_4b_ret=Retiro::join('matriculas', 'retiros.matricula_id', 'matriculas.id')
               ->where('anio_id',$anio_activo->id_activo)
               ->where('grado_id', '4')
               ->where('seccion_id', '2')
               ->count();

               $mat_4b_eq=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '4')
               ->where('seccion_id', '2')
               ->where('estatus', 'equivalencia')
               ->count();

               $mat_4b_rep=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '4')
               ->where('seccion_id', '2')
               ->where('repite', '1')
               ->count();
               // * * * * * * * * * * * * * *  Matricula 4to C * * * * * * * * * * * * * * * * *//
               $mat_4c=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '4')
               ->where('seccion_id', '3')
               ->count();

               $mat_4c_fem=Matricula::join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
               ->where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '4')
               ->where('seccion_id', '3')
               ->where('genero', 'F')
               ->count();

               $mat_4c_mas=Matricula::join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
               ->where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '4')
               ->where('seccion_id', '3')
               ->where('genero', 'M')
               ->count();

               $mat_4c_in=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '4')
               ->where('seccion_id', '3')
               ->where('estatus', 'ingreso')
               ->count();

               $mat_4c_ret=Retiro::join('matriculas', 'retiros.matricula_id', 'matriculas.id')
               ->where('anio_id',$anio_activo->id_activo)
               ->where('grado_id', '4')
               ->where('seccion_id', '3')
               ->count();

               $mat_4c_eq=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '4')
               ->where('seccion_id', '3')
               ->where('estatus', 'equivalencia')
               ->count();

               $mat_4c_rep=Matricula::where('anio_id', $anio_activo->id_activo)
               ->where('grado_id', '4')
               ->where('seccion_id', '3')
               ->where('repite', '1')
               ->count();

               $media_4=($mat_4a+$mat_4b+$mat_4c)/3;

                              // * * * * * * * * * * * * * *  Matricula 5to A * * * * * * * * * * * * * * * * *//
                              $mat_5a=Matricula::where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '5')
                              ->where('seccion_id', '1')
                              ->count();
               
                              $mat_5a_fem=Matricula::join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
                              ->where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '5')
                              ->where('seccion_id', '1')
                              ->where('genero', 'F')
                              ->count();
               
                              $mat_5a_mas=Matricula::join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
                              ->where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '5')
                              ->where('seccion_id', '1')
                              ->where('genero', 'M')
                              ->count();
               
                              $mat_5a_in=Matricula::where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '5')
                              ->where('seccion_id', '1')
                              ->where('estatus', 'ingreso')
                              ->count();
               
                              $mat_5a_ret=Retiro::join('matriculas', 'retiros.matricula_id', 'matriculas.id')
                              ->where('anio_id',$anio_activo->id_activo)
                              ->where('grado_id', '5')
                              ->where('seccion_id', '1')
                              ->count();
               
                              $mat_5a_eq=Matricula::where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '5')
                              ->where('seccion_id', '1')
                              ->where('estatus', 'equivalencia')
                              ->count();
               
                              $mat_5a_rep=Matricula::where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '5')
                              ->where('seccion_id', '1')
                              ->where('repite', '1')
                              ->count();
               
               
                              // * * * * * * * * * * * * * *  Matricula 5to B * * * * * * * * * * * * * * * * *//
                              $mat_5b=Matricula::where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '5')
                              ->where('seccion_id', '2')
                              ->count();
               
                              $mat_5b_fem=Matricula::join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
                              ->where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '5')
                              ->where('seccion_id', '2')
                              ->where('genero', 'F')
                              ->count();
               
                              $mat_5b_mas=Matricula::join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
                              ->where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '5')
                              ->where('seccion_id', '2')
                              ->where('genero', 'M')
                              ->count();
               
                              $mat_5b_in=Matricula::where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '5')
                              ->where('seccion_id', '2')
                              ->where('estatus', 'ingreso')
                              ->count();
               
                              $mat_5b_ret=Retiro::join('matriculas', 'retiros.matricula_id', 'matriculas.id')
                              ->where('anio_id',$anio_activo->id_activo)
                              ->where('grado_id', '5')
                              ->where('seccion_id', '2')
                              ->count();
               
                              $mat_5b_eq=Matricula::where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '5')
                              ->where('seccion_id', '2')
                              ->where('estatus', 'equivalencia')
                              ->count();
               
                              $mat_5b_rep=Matricula::where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '5')
                              ->where('seccion_id', '2')
                              ->where('repite', '1')
                              ->count();
                              // * * * * * * * * * * * * * *  Matricula 5to C * * * * * * * * * * * * * * * * *//
                              $mat_5c=Matricula::where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '5')
                              ->where('seccion_id', '3')
                              ->count();
               
                              $mat_5c_fem=Matricula::join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
                              ->where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '5')
                              ->where('seccion_id', '3')
                              ->where('genero', 'F')
                              ->count();
               
                              $mat_5c_mas=Matricula::join('alumnos', 'matriculas.alumno_id', 'alumnos.id')
                              ->where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '5')
                              ->where('seccion_id', '3')
                              ->where('genero', 'M')
                              ->count();
               
                              $mat_5c_in=Matricula::where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '5')
                              ->where('seccion_id', '3')
                              ->where('estatus', 'ingreso')
                              ->count();
               
                              $mat_5c_ret=Retiro::join('matriculas', 'retiros.matricula_id', 'matriculas.id')
                              ->where('anio_id',$anio_activo->id_activo)
                              ->where('grado_id', '5')
                              ->where('seccion_id', '3')
                              ->count();
               
                              $mat_5c_eq=Matricula::where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '5')
                              ->where('seccion_id', '3')
                              ->where('estatus', 'equivalencia')
                              ->count();
               
                              $mat_5c_rep=Matricula::where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '5')
                              ->where('seccion_id', '3')
                              ->where('repite', '1')
                              ->count();
               
                              $media_5=($mat_5a+$mat_5b+$mat_5c)/3;

        //* * * * * * * * * * * * ARREGLO MATRICULA POR GRADO * * * * * * * * * * * *//
        $por_grado_secc=['anio_activo'=>$anio_activo,'grados'=>$grados,'tt'=>$tt,'contar'=>$contar,
             'tt_mas'=>$tt_mas,'tt_fem'=>$tt_fem,'tt_ing'=>$tt_ing,'tt_egr'=>$tt_egr,
             'tt_rep'=>$tt_rep,'tt_mp'=>$tt_mp,'tt_equ'=>$tt_equ, 'media_grado'=>$media_grado,

             'mat_1a'=>$mat_1a, 'mat_1a_fem'=>$mat_1a_fem, 'mat_1a_mas'=>$mat_1a_mas,
             'mat_1a_in'=>$mat_1a_in, 'mat_1a_ret'=>$mat_1a_ret, 'mat_1a_eq' =>$mat_1a_eq,
             'mat_1a_rep'=>$mat_1a_rep,

             'mat_1b'=>$mat_1b, 'mat_1b_fem'=>$mat_1b_fem, 'mat_1b_mas'=>$mat_1b_mas,
             'mat_1b_in'=>$mat_1b_in, 'mat_1b_ret'=>$mat_1b_ret, 'mat_1b_eq' =>$mat_1b_eq,
             'mat_1b_rep'=>$mat_1b_rep,

             'mat_1c'=>$mat_1c, 'mat_1c_fem'=>$mat_1c_fem, 'mat_1c_mas'=>$mat_1c_mas,
             'mat_1c_in'=>$mat_1c_in, 'mat_1c_ret'=>$mat_1c_ret, 'mat_1c_eq' =>$mat_1c_eq,
             'mat_1c_rep'=>$mat_1c_rep,

             'media_1'=>$media_1,

             'mat_2a'=>$mat_2a, 'mat_2a_fem'=>$mat_2a_fem, 'mat_2a_mas'=>$mat_2a_mas,
             'mat_2a_in'=>$mat_2a_in, 'mat_2a_ret'=>$mat_2a_ret, 'mat_2a_eq' =>$mat_2a_eq,
             'mat_2a_rep'=>$mat_2a_rep,

             'mat_2b'=>$mat_2b, 'mat_2b_fem'=>$mat_2b_fem, 'mat_2b_mas'=>$mat_2b_mas,
             'mat_2b_in'=>$mat_2b_in, 'mat_2b_ret'=>$mat_2b_ret, 'mat_2b_eq' =>$mat_2b_eq,
             'mat_2b_rep'=>$mat_2b_rep,

             'mat_2c'=>$mat_2c, 'mat_2c_fem'=>$mat_2c_fem, 'mat_2c_mas'=>$mat_2c_mas,
             'mat_2c_in'=>$mat_2c_in, 'mat_2c_ret'=>$mat_2c_ret, 'mat_2c_eq' =>$mat_2c_eq,
             'mat_2c_rep'=>$mat_2c_rep,

             'media_2'=>$media_2,


             'mat_3a'=>$mat_3a, 'mat_3a_fem'=>$mat_3a_fem, 'mat_3a_mas'=>$mat_3a_mas,
             'mat_3a_in'=>$mat_3a_in, 'mat_3a_ret'=>$mat_3a_ret, 'mat_3a_eq' =>$mat_3a_eq,
             'mat_3a_rep'=>$mat_3a_rep,

             'mat_3b'=>$mat_3b, 'mat_3b_fem'=>$mat_3b_fem, 'mat_3b_mas'=>$mat_3b_mas,
             'mat_3b_in'=>$mat_3b_in, 'mat_3b_ret'=>$mat_3b_ret, 'mat_3b_eq' =>$mat_3b_eq,
             'mat_3b_rep'=>$mat_3b_rep,

             'mat_3c'=>$mat_3c, 'mat_3c_fem'=>$mat_3c_fem, 'mat_3c_mas'=>$mat_3c_mas,
             'mat_3c_in'=>$mat_3c_in, 'mat_3c_ret'=>$mat_3c_ret, 'mat_3c_eq' =>$mat_3c_eq,
             'mat_3c_rep'=>$mat_3c_rep,

             'media_3'=>$media_3,

             'mat_4a'=>$mat_4a, 'mat_4a_fem'=>$mat_4a_fem, 'mat_4a_mas'=>$mat_4a_mas,
             'mat_4a_in'=>$mat_4a_in, 'mat_4a_ret'=>$mat_4a_ret, 'mat_4a_eq' =>$mat_4a_eq,
             'mat_4a_rep'=>$mat_4a_rep,

             'mat_4b'=>$mat_3b, 'mat_4b_fem'=>$mat_4b_fem, 'mat_4b_mas'=>$mat_4b_mas,
             'mat_4b_in'=>$mat_4b_in, 'mat_4b_ret'=>$mat_4b_ret, 'mat_4b_eq' =>$mat_4b_eq,
             'mat_4b_rep'=>$mat_4b_rep,

             'mat_4c'=>$mat_4c, 'mat_4c_fem'=>$mat_4c_fem, 'mat_4c_mas'=>$mat_4c_mas,
             'mat_4c_in'=>$mat_4c_in, 'mat_4c_ret'=>$mat_4c_ret, 'mat_4c_eq' =>$mat_4c_eq,
             'mat_4c_rep'=>$mat_4c_rep,

             'media_4'=>$media_4,

             'mat_5a'=>$mat_5a, 'mat_5a_fem'=>$mat_5a_fem, 'mat_5a_mas'=>$mat_5a_mas,
             'mat_5a_in'=>$mat_5a_in, 'mat_5a_ret'=>$mat_5a_ret, 'mat_5a_eq' =>$mat_5a_eq,
             'mat_5a_rep'=>$mat_5a_rep,

             'mat_5b'=>$mat_5b, 'mat_5b_fem'=>$mat_5b_fem, 'mat_5b_mas'=>$mat_5b_mas,
             'mat_5b_in'=>$mat_5b_in, 'mat_5b_ret'=>$mat_5b_ret, 'mat_5b_eq' =>$mat_5b_eq,
             'mat_5b_rep'=>$mat_5b_rep,

             'mat_5c'=>$mat_5c, 'mat_5c_fem'=>$mat_5c_fem, 'mat_5c_mas'=>$mat_5c_mas,
             'mat_5c_in'=>$mat_5c_in, 'mat_5c_ret'=>$mat_5c_ret, 'mat_5c_eq' =>$mat_5c_eq,
             'mat_5c_rep'=>$mat_5c_rep,

             'media_5'=>$media_5,
        ];    



        $contar_s=Seccion::where('estado','1')->count(); 
        $seccions=Seccion::where('estado','1')->get(); 


        // * * * * * * * * Secciones de 1er Año * * * * * * * * * * //

  
       

        $mat_1b=Matricula::where('anio_id', $anio_activo->id_activo)
                              ->where('seccion_id', '2')
                              ->count();

        $mat_1c=Matricula::where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '1')
                              ->where('seccion_id', '3')
                              ->count();

        // * * * * * * * * Secciones de 2do Año * * * * * * * * * * //

  
        $mat_2a=Matricula::where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '2')
                              ->where('seccion_id', '1')
                              ->count();

        $mat_2b=Matricula::where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '2')
                              ->where('seccion_id', '2')
                              ->count();

        $mat_2c=Matricula::where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '2')
                              ->where('seccion_id', '3')
                              ->count();

        // * * * * * * * * Secciones de 3er Año * * * * * * * * * * //

  
        $mat_3a=Matricula::where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '3')
                              ->where('seccion_id', '1')
                              ->count();

        $mat_3b=Matricula::where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '3')
                              ->where('seccion_id', '3')
                              ->count();

        $mat_3c=Matricula::where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '3')
                              ->where('seccion_id', '3')
                              ->count();


        // * * * * * * * * Secciones de 4to Año * * * * * * * * * * //

  
        $mat_4a=Matricula::where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '4')
                              ->where('seccion_id', '1')
                              ->count();

        $mat_4b=Matricula::where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '4')
                              ->where('seccion_id', '3')
                              ->count();

        $mat_4c=Matricula::where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '4')
                              ->where('seccion_id', '3')
                              ->count();

        // * * * * * * * * Secciones de 5to Año * * * * * * * * * * //

  
        $mat_5a=Matricula::where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '5')
                              ->where('seccion_id', '1')
                              ->count();

        $mat_5b=Matricula::where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '5')
                              ->where('seccion_id', '3')
                              ->count();

        $mat_5c=Matricula::where('anio_id', $anio_activo->id_activo)
                              ->where('grado_id', '5')
                              ->where('seccion_id', '3')
                              ->count();

                              
      /*  $por_seccion=[
          'mat_1a'=>$mat_1a,
          'mat_1b'=>$mat_1b,
          'mat_1c'=>$mat_1c,

          'mat_2a'=>$mat_2a,
          'mat_2b'=>$mat_2b,
          'mat_2c'=>$mat_2c,

          'mat_3a'=>$mat_3a,
          'mat_3b'=>$mat_3b,
          'mat_3c'=>$mat_3c,

          'mat_4a'=>$mat_4a,
          'mat_4b'=>$mat_4b,
          'mat_4c'=>$mat_4c,

          'mat_5a'=>$mat_5a,
          'mat_5b'=>$mat_5b,
          'mat_5c'=>$mat_5c,
     ];*/

       /* dd (
          'Contar Secciones: '.$contar_s, 
          'Contar Grados: '.$contar, 
          'Multiplicar Grados y Secciones; '.$contar_s*$contar,
          $mat_1a,
          $mat_1b,
          $mat_1c,

          $mat_2a,
          $mat_2b,
          $mat_2c,

          $mat_3a,
          $mat_3b,
          $mat_3c,

          $mat_4a,
          $mat_4b,
          $mat_4c,

          $mat_5a,
          $mat_5b,
          $mat_5c,
     );
*/



       /* $s=0;      
     
        $seccions=Seccion::where('estado','1')->get(); 
        foreach($grados as $grado){
          foreach ($seccions as $seccion){

               $tt_fem_secc[$s]=Matricula::join('alumnos','alumnos.id','matriculas.alumno_id')
                       ->where('anio_id',$anio_activo->id_activo)
                       ->where('grado_id',$grado->id)
                       ->where('seccion_id', $seccion->id)
                       ->where('genero','F')
                       ->count();
          }
        }*/

        //dd($tt_fem_secc[$s]);

       /* $por_seccion=['anio_activo'=>$anio_activo, 'seccion' =>$seccion,];    */


   
        return view('dash.dashboard', $matriculas, $por_grado_secc);  
        //dd(session('activo'));   
        
        
                  }
    }



    public function detalles($id){

            $anio_activo=Anio::find(1);
       
            for ($i=1; $i <5 ; $i++) { 
                $matricula[$i]=Matricula::where('anio_id',$anio_activo->id_activo)
                                ->where('grado_id',$id) 
                                ->where('seccion_id',$i)                                    
                                ->count();
            }

            //echo 'Grado: '.$id.'<br>';
           //dd($matricula);
           
           return view('dash.detalles');

      }
}
