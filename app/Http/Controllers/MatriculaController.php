<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Alumno;
use App\Models\Anio;
use App\Models\AnioAsignatura;
use App\Models\Asignatura;
use App\Models\Grado;
use App\Models\GrupoEstable;
use App\Models\Matricula;
use App\Models\Pendiente;
use App\Models\Nota;
use App\Models\Seccion;
use Illuminate\Http\Request;


class MatriculaController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:ver-matricula|crear-matricula|editar-matricula|borrar-matricula')->only('index');
        $this->middleware('permission:crear-matricula')->only('create, store');
        $this->middleware('permission:editar-matricula')->only('edit, update');
        //$this->middleware('permission:borrar-matricula')->only('destroy');
    }

    
    public function index()
    {
        $anio_activo=Anio::find(1);  
        if (is_null($anio_activo)){
            return redirect('/anios');  
            
        }elseif (empty($anio_activo->id_activo)){ 
            return redirect('/anios');  
        }
        else{ 
            // * * *  Chequear Fecha * * *
            $fecha_actual = Carbon::now(); 
            $fecha_final = Carbon::parse('31-09-'.substr($anio_activo->numero,-4));          
          
            $resta = $fecha_final->diffInDays($fecha_actual, false);
           
            if ($resta<0) {
            // * * * Permitir Modificar * * *          
            $fuera_fecha=0;
           }else{
            // * * * No Modificar * * *         
            $fuera_fecha=1;
           }

            $contar_grados=Grado::where('estado','1')->count();
            $contar_alumnos=Alumno::where('estado','1')->count();
            $contar_asignaturas=AnioAsignatura::where('anio_id',$anio_activo->id_activo)->count();
            $contar_seccion=Seccion::where('estado','1')->count();
           
             // * * * * * * Chequea si hay grados en Periodo Activo * * * * * * *
             if ($contar_grados==0){              
                return redirect('/grados');
            }     

            // * * * * * * Chequea si hay secciones en Periodo Activo * * * * * * *
            if ($contar_seccion==0){              
                return redirect('/seccions');
            }            
            
            // * * * * * * Chequea si hay asignaturas en Periodo Activo * * * * * * *
            if ($contar_asignaturas==0){              
                return redirect('/anio_asignaturas');
            }

            // * * * * * *  Chequea si hay Alumnos en Registro de Alumnos * * * * * * 
            if ($contar_alumnos==0){              
                return redirect('/alumnos');
            } 
        
    
        $matriculas=Matricula::where('anio_id',$anio_activo->id_activo)
                                ->get(); 

        $pendientes=Matricula::with('pendientes')->get();
                                

            //dd($pendientes);
        return view('matriculas.index', 
        compact('matriculas','anio_activo','fuera_fecha','pendientes'));
        }
    }

    
    public function create(Request $request)
    {
        //return 'Crear Matricula';
        $anio_activo=Anio::find(1);
        $grados=Grado::where('estado','1')->pluck('nombre_grado','id');
        $alumnos=Alumno::where('estado',1)->pluck('nombres','cedula');
        return view('matriculas.buscar_cedula',compact('anio_activo', 'grados','alumnos')); 
       
    }

    // * * * Busqueda Dinamica de Alumnos para Inscribir * * * *
    /*function search(Request $request) {    
        
        if($request->ajax()){
        $output="";
        $alumnos=DB::table('alumnos')
        ->orwhere('cedula','LIKE','%'.$request->search."%")
        ->orwhere('apellidos','LIKE','%'.$request->search."%")
        ->orwhere('nombres','LIKE','%'.$request->search."%")
        ->get();

        if($alumnos) {
        foreach ($alumnos as $key => $alumno) {
        $output.="<tr>".
        "<td>".$alumno->id."</td>".
        "<td>".$alumno->cedula."</td>".
        "<td>".$alumno->apellidos."</td>".
        "<td>".$alumno->nombres."</td>".        
        '</tr>';
        }
        return Response($output);
        }
        }
    }*/

    public function sinregistro1(Request $request){
        $anio_id=$request->input('anio_id');
        //$alumno=$request->input('alumno');
        $alumno_id=$request->input('alumno_id');
        $grado_id=$request->input('grado_id');
        $mat_pend=$request->input('mat_pend');
        $repite=$request->input('repite');
    
        
        $alumno=Alumno::where('id',$alumno_id)->get();
        $seccions=Seccion::where('estado',1)->pluck('nombre_seccion','id');
        $grupoestables=GrupoEstable::where('anio_id',$anio_id)->pluck('nombre','id'); 
        
        //* * * Asignaturas a Inscribir en grado a cursar * * * 
        $anio_asignaturas=AnioAsignatura::where('anio_id',($anio_id))
                        ->join('asignaturas','anio_asignaturas.asignatura_id','asignaturas.id')   
                        ->where('asignaturas.grado_id',($grado_id))    
                        ->select('anio_asignaturas.id as id','abreviado')  
                        ->get();

         if ($grado_id==1){
            $mat_pend=0;
        }
            // * * * Materias Pendientes * * * (OK)
            $asignaturas=AnioAsignatura::where('anio_id',($anio_id-1))
                        ->join('asignaturas','anio_asignaturas.asignatura_id','asignaturas.id')  
                        ->where('asignaturas.grado_id',($grado_id-1))
                        ->where('asignaturas.abreviado','!=','Orient y Conv')
                        ->where('asignaturas.abreviado','!=','P.G.C.R.C.')                       
                        ->get();

       // dd($anio_asignaturas);


      return view('matriculas.sin_registro2',
            compact('anio_id', 'alumno', 'grado_id', 'mat_pend', 'repite', 'seccions',
                    'grupoestables', 'anio_asignaturas', 'asignaturas'                  
                                ));
}


    public function inscribir(Request $request){  
       // dd($request);
        $this->validate($request,[
            'alumno_id'=>'required|numeric|between:1000000,999999999',
          
        ],[   
            'alumno_id.required' => 'Se requiere número de cédula.',
            'alumno_id.numeric' => 'Número de cédula no válido.',
            'alumno_id.between' => 'Número de cédula entre 1.000.000 hasta 999.999.999',
         
        ]);
            
          
        //* * * Condiciones Iniciales Inscripcion * * * 
        $cedula=$request->input('alumno_id');
        $grado=$request->input('grado_id');
        $repite=$request->input('repite'); 
        $mat_pend=$request->input('mat_pend');          
   
        $anio_activo=Anio::find(1);     
        $alumno=Alumno::where('cedula',$cedula)->get();
      
        $grados=Grado::where('estado',1)->pluck('nombre_grado', 'id');
        $seccions=Seccion::where('estado',1)->pluck('nombre_seccion','id');
        $grupoestables=GrupoEstable::where('anio_id',$anio_activo->id_activo)->pluck('nombre','id');   


       if (!empty($alumno[0]->cedula)) {
       // echo 'esta registrado<br>';
        //* * * Estudiante esta registrado en Sistema * * * 
        $inscrito=Matricula::where('anio_id',$anio_activo->id_activo)
                            ->join('alumnos','matriculas.alumno_id','alumnos.id')
                            ->where('alumnos.cedula',$cedula)
                            ->count();

       
     // dd($inscrito);
            if ($inscrito==0){
               // echo 'NO Inscrito <br>';
            //* * * Estudiante NO Inscrito en Periodo Activo * * *   
                $periodo_anterior=$anio_activo->id_activo-1;  
                $tiene_notas=Matricula::join('alumnos','matriculas.alumno_id','alumnos.id')
                                        ->join('notas','matriculas.id','notas.matricula_id')
                                        ->join('anio_asignaturas','notas.anio_asignatura_id','anio_asignaturas.id')
                                        ->join('asignaturas','anio_asignaturas.asignatura_id','asignaturas.id')

                                        ->where('matriculas.anio_id',$periodo_anterior) 
                                        ->where('alumnos.cedula',$alumno[0]->cedula)
                                        //->where('notas.nota_def','<',9.5)
                                        ->sum('notas.nota_def');

                      
              
                $aplazadas=Matricula::join('alumnos','matriculas.alumno_id','alumnos.id')
                             ->join('notas','matriculas.id','notas.matricula_id')
                             ->join('anio_asignaturas','notas.anio_asignatura_id','anio_asignaturas.id')
                             ->join('asignaturas','anio_asignaturas.asignatura_id','asignaturas.id')

                             ->where('matriculas.anio_id',$periodo_anterior) 
                             ->where('alumnos.cedula',$alumno[0]->cedula)
                             ->where('notas.nota_def','<',9.5)
                             ->get();
                            

                             if (($tiene_notas==0) | (empty($tiene_notas)) | ($tiene_notas==null)){                             
                                //echo 'No posee registro en periodo anterior<br>';
                                //* * * No Posee Registro en Periodo anterior * * *  
                                $anio_asignaturas=AnioAsignatura::where('anio_id',($anio_activo->id_activo-1))
                                            ->join('asignaturas','anio_asignaturas.asignatura_id','asignaturas.id')                                              
                                            ->pluck('abreviado','anio_asignaturas.id');

                                 //* * * Verificar si Alumno es Graduado * * *     
                                $graduado=Nota::join('anio_asignaturas','notas.anio_asignatura_id','anio_asignaturas.id')
                                            ->join('matriculas','notas.matricula_id','matriculas.id')
                                            ->join('alumnos','matriculas.alumno_id','alumnos.id')
                                            ->join('asignaturas','anio_asignaturas.asignatura_id','asignaturas.id')
                                            ->where('alumnos.cedula',$cedula)
                                            ->where('asignaturas.grado_id',5)
                                            ->where('notas.nota_def','>=',9.5)
                                            ->get();


                                $status=0;
                             
                                if(($graduado->count()!=0)){
                                    $anio_check=$graduado[0]->anio_id; 

                                    $contar_materia=AnioAsignatura::join('asignaturas','anio_asignaturas.asignatura_id','asignaturas.id')
                                            ->where('asignaturas.grado_id',5)
                                            ->where('anio_asignaturas.anio_id',$anio_check)
                                            ->count();

                                        if (($graduado->count()!=0) && ($contar_materia==$graduado->count())){
                                            $status=1;// Graduado
                                        }   

                                }                                
                          
                                return view('matriculas.sin_registro1',
                                        compact('alumno', 'anio_activo', 'grados', 'status', 'grupoestables'));

                             }elseif($tiene_notas>1){                              
                                //* * * Posee Registro en periodo anterior * * *
                                $reprobadas=$aplazadas->count();
                                $grado=Matricula::where('anio_id',$periodo_anterior)
                                                ->join('alumnos','matriculas.alumno_id','alumnos.id')
                                                ->where('alumnos.cedula',$cedula)
                                                ->get();

                                $grado_id=$grado[0]->grado_id;
                               
                                //* * * * Asignaturas a Cursar Normalmente (Aprobado) * * * *
                                $anio_asignaturas=AnioAsignatura::where('anio_id',($anio_activo->id_activo-1))//->get();
                                            ->join('asignaturas','anio_asignaturas.asignatura_id','asignaturas.id') 
                                            ->where('asignaturas.grado_id',$grado_id+1)                                           
                                            ->get();

                                // * * * * Cantidad de Asignaturas en el periodo anterior * * *            
                                $contar_materia=Nota::join('matriculas','notas.matricula_id','matriculas.id')
                                                    ->join('alumnos','matriculas.alumno_id','alumnos.id')
                                                    ->join('anio_asignaturas','notas.anio_asignatura_id','anio_asignaturas.id')
                                                    ->join('asignaturas','anio_asignaturas.asignatura_id','asignaturas.id')
                                                    //->where('anio_asignaturas.anio_id',($anio_activo->id_activo-1))
                                                    ->where('asignaturas.grado_id',$grado_id)   
                                                    ->where('alumnos.cedula',$cedula)                                        
                                                    ->count();    

                                // * * * Cantidad de Asignaturas con notas del peioro anteior * * *
                                $contar_notas=Nota::join('matriculas','notas.matricula_id','matriculas.id')
                                            ->join('alumnos','matriculas.alumno_id','alumnos.id')
                                            ->join('anio_asignaturas','notas.anio_asignatura_id','anio_asignaturas.id')
                                            ->join('asignaturas','anio_asignaturas.asignatura_id','asignaturas.id')                                         
                                            ->where('asignaturas.grado_id',$grado_id)   
                                            ->where('alumnos.cedula',$cedula)       
                                            ->where('notas.nota_def','!=',0)
                                            ->count();
    

                               // dd($contar_notas);

                                switch ($reprobadas) {
                                    case 0:
                                        $repite=0;
                                        $reprobadas=0;
                                        $grado_id=$grado_id;
                                        $mat_pend1=null;
                                        $docente_pend1=null;
                                        $docente_pend2=null;
                                        $mat_pend2=null;
                                         break;
                                         
                                    case 1:
                                        $repite=0;
                                        $grado_id=$grado_id;
                                        $mat_pend1=$aplazadas[0]; 
                                        $mat_pend2=null;            
                                        $docente_pend1=AnioAsignatura::join('docentes','anio_asignaturas.docente_id','docentes.id')
                                        ->where('anio_id',$anio_activo->id_activo-1)
                                        ->where('anio_asignaturas.asignatura_id',$mat_pend1->id)
                                        ->select('anio_asignaturas.*','docentes.*','anio_asignaturas.id as id','docentes.id as docente_id')  
                                        ->pluck('docente_id'); 
                                        $docente_pend2=null;
                                        
                                         break;    
                                    case 2:
                                        $repite=0;
                                        $grado_id=$grado_id;
                                        $mat_pend1=$aplazadas[0];
                                        $mat_pend2=$aplazadas[1];
                                        $docente_pend1=AnioAsignatura::join('docentes','anio_asignaturas.docente_id','docentes.id')
                                        ->where('anio_id',$anio_activo->id_activo-1)
                                        ->where('anio_asignaturas.asignatura_id',$mat_pend1->id)
                                        ->select('anio_asignaturas.*','docentes.*','anio_asignaturas.id as id','docentes.id as docente_id')  
                                        ->pluck('docente_id'); 

                                        $docente_pend2=AnioAsignatura::join('docentes','anio_asignaturas.docente_id','docentes.id')
                                        ->where('anio_id',$anio_activo->id_activo-1)
                                        ->where('anio_asignaturas.asignatura_id',$mat_pend2->id)
                                        ->select('anio_asignaturas.*','docentes.*','anio_asignaturas.id as id','docentes.id as docente_id')  
                                        ->pluck('docente_id'); 
                                        
                                        break;

                                    case ($reprobadas>=3):// * * * Si Aplazado * * * 
                                        $repite=1;
                                        $grado_id=$grado_id;
                                        $mat_pend1=null;
                                        $mat_pend2=null;
                                        $docente_pend1=null;
                                        $docente_pend2=null;
                                        $anio_asignaturas=AnioAsignatura::where('anio_id',($anio_activo->id_activo-1))//->get();
                                        ->join('asignaturas','anio_asignaturas.asignatura_id','asignaturas.id') 
                                        ->where('asignaturas.grado_id',$grado_id)                                           
                                        ->get();
                                
                                         break;                                     
                                }                               
                              
                               // echo $docente_pend2;
                               // exit;
                               // dd($anio_activo->id_activo);
                                return view('matriculas.con_registro',
                                compact('alumno', 'anio_activo', 'reprobadas', 'grado_id', 'repite',
                                        'mat_pend1','docente_pend1', 'mat_pend2', 'docente_pend2',
                                        'anio_asignaturas', 'seccions', 'aplazadas', 'contar_materia',
                                        'contar_notas', 'grupoestables', ));
                             }       

            }else{
            //* * * Estudiante Inscrito en Periodo Activo * * *
            return redirect('matriculas')
            ->with('message','Estudiante '.$alumno[0]->cedula.' '.$alumno[0]->apellidos.' '.$alumno[0]->nombres.
            ' Ya esta Inscrito en el Periodo Escolar Activo');   
            }              

       }else{
        //* * * Estudiante NO esta registrado en Sistema * * *
        return redirect()->route('alumnos.create',compact('cedula'));
       }    
    }

   
    public function store(Request $request)
    {
     // dd($request);
             
        // * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *       
        //$grado_id=$request->input('grado_id');      
        $mat_pend=$request->input('mat_pend');    
        $anio_asignatura=$request->input('anio_asignatura');
        //$repite=$request->get('repite');   
         //dd($anio_asignatura); 
         //print_r($anio_asignatura[1]);
         // exit;   
        // * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
        //* * * Crea Matriculas * * * (OK)
        Matricula::create($request->all());// * * *  OK * * *
        $ultima_matricula= Matricula::latest('id')->first()->id;

       // dd($ultima_matricula);

        // * * * Crea Materias Pendientes * * * (OK)
        $mat_pend=$request->get('mat_pend');
          if(($mat_pend==1) | ($mat_pend==2)){
                $pendiente=new Pendiente;
                $pendiente->matricula_id = $ultima_matricula;
                $pendiente->materia = $request->get('mat_pend1');

               /* if (!empty($request->get('docente_pend1'))) {
                   $pendiente->docente=$request->get('docente_pend1');
                }*/

                $pendiente->save(); 
          }

          if($mat_pend==2){
                $pendiente=new Pendiente;
                $pendiente->matricula_id = $ultima_matricula;
                $pendiente->materia = $request->get('mat_pend2');;

               /* if (!empty($request->get('docente_pend2'))) {
                    $pendiente->docente=$request->get('docente_pend2');
                 }   */        

                $pendiente->save(); 
          }
          
        //* * * Crea Notas * * *     
        if(!empty($anio_asignatura)){
            $i=0;
            foreach ($anio_asignatura as $nota) {
                //echo $i.' '.$anio_asignatura[$i];
                $nota = new Nota;
                $nota->matricula_id=$ultima_matricula;
                $nota->anio_asignatura_id=$anio_asignatura[$i]; 
                $nota->save();
            $i=$i+1;    
        }  
    }
        return redirect('/matriculas')->with('message', 'Matricula ha sido añadida');     
     
    }

    
    public function edit(Matricula $matricula)
    {      
        
        $anio_activo=Anio::find(1);  
        $grado_id=$matricula->grado_id;
        $grados=Grado::where('estado', '1')->pluck('nombre_grado','id');
        $seccions=Seccion::where('estado', '1')->pluck('nombre_seccion','id');
        
        $grado_cursa=Matricula::where('id',$matricula->id)                             
                                ->get();

        $asignaturas=Asignatura::where('grado_id',$grado_cursa[0]->grado_id)
                                ->where('abreviado','!=','Orient y Conv')
                                ->where('abreviado','!=','P.G.C.R.C.')     
                                ->pluck('abreviado','abreviado');
      
        $grupos=GrupoEstable::where('anio_id',$anio_activo->id_activo)->pluck('nombre','id');

        $pendientes=Pendiente::where('matricula_id',$matricula->id)
                                ->get();
                                 //->pluck('materia');
     
        return view('matriculas.editar',compact(
            'matricula','grados','seccions','asignaturas','grupos','pendientes'));
    }

  
    public function update(Request $request, Matricula $matricula)
    {   
 
        $matricula->update($request->all());
        //$id=$matricula->id;
        //dd($request);
        $mat_pend1=$request->get('mat_pend1');
        $mat_pend2=$request->get('mat_pend2'); 
    

        $i=0;
        if(!empty($mat_pend1)){
            $i=$i+1;
            $materia_pendiente1=$mat_pend1;
        }else{
        $materia_pendiente1=$request->get('mat_pend11'); 
        $pendiente_id1=$request->get('pendiente_id1');
        }

        if(!empty($mat_pend2)){
            $i=$i+1;
            $materia_pendiente2=$mat_pend2;        
        }else{
            $materia_pendiente2=$request->get('mat_pend22');
            $pendiente_id2=$request->get('pendiente_id2');
        }  
       
        if((!empty($mat_pend11)) && (!empty($mat_pend1))){
            $pendiente=Pendiente::find($pendiente_id1); 
            $pendiente->matricula_id = $matricula->id;
            $pendiente->materia = $materia_pendiente1;
            $pendiente->update(); 
        }else{
             $pendiente=new Pendiente; 
             $pendiente->matricula_id = $matricula->id;
             $pendiente->materia = $materia_pendiente1;
             $pendiente->update();    
        }

        if((!empty($mat_pend22)) && (!empty($mat_pend2))){
            $pendiente=Pendiente::find($pendiente_id2); 
            $pendiente->matricula_id = $matricula->id;
            $pendiente->materia = $materia_pendiente1;
            $pendiente->update(); 
        }else{
             $pendiente=new Pendiente; 
             $pendiente->matricula_id = $matricula->id;
             $pendiente->materia = $materia_pendiente1;
             $pendiente->update();    
        }


      /*  if(($i==1) | ($i==2)){
            if(is_null($pendiente_id1)){
                
            }else{
                  
            }               
                
          }

          if($i==2){
            if(is_null($pendiente_id2)){
                  $pendiente=new Pendiente;
            }else{
                  $pendiente=Pendiente::find($pendiente_id2);
            }
                $pendiente->matricula_id = $matricula->id;
                $pendiente->materia = $materia_pendiente2;
                $pendiente->update(); 
          }      */    

        return redirect('/matriculas')->with('message', 'Matricula ha sido editada'); ;
    }

}