<?php

namespace App\Http\Controllers;

//use App\Models\Alumno;
use Carbon\Carbon;
use App\Models\Anio;
use App\Models\CorteNota;
use App\Models\Matricula;
use App\Models\Nota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NotaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-nota|crear-nota|editar-nota|borrar-nota')->only('index');
        $this->middleware('permission:crear-nota')->only('create, store');
        $this->middleware('permission:editar-nota')->only('edit, update');
        //$this->middleware('permission:borrar-nota')->only('destroy');
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

        // * * * * Chequea que Exista(n) Matricula(s) * * * * 
        $contar_matricula=Matricula::where('anio_id',$anio_activo->id_activo)->count();
        if ($contar_matricula==0){
            return redirect('/matriculas');
        }  
           
        } 
      
        $usuario=Auth::user();
      
        if ($usuario->id==1) {

        $notas = Nota::join('anio_asignaturas','notas.anio_asignatura_id', 'anio_asignaturas.id')
                    ->join('matriculas','notas.matricula_id','matriculas.id')
                    ->where('matriculas.anio_id',$anio_activo->id_activo)                        
                    ->select('*','notas.id as nota_id')
                    ->get();

        }else{ 
        $notas = Nota::join('anio_asignaturas','notas.anio_asignatura_id', 'anio_asignaturas.id')
                    ->join('matriculas','notas.matricula_id','matriculas.id')
                    ->join('docentes','anio_asignaturas.docente_id','docentes.id')                
                   
                    ->where('matriculas.anio_id',$anio_activo->id_activo)  
                    ->where('nombre_docente', $usuario->name)
                    ->select('*','notas.id as nota_id')
                    ->get();
            
        }          
       

       // $notas=Nota::all();
        
       // return 'Notas indice'.$usuario;
       //exit;
        return view('notas.index', compact('notas','anio_activo','fuera_fecha','usuario'));
        }
    
   
   
    public function edit(Nota $nota)
    {
        $corte=CorteNota::all();
        return view('notas.edit',compact('nota','corte'));
    }

    
    public function update(Request $request, $id)
    {  // dd($request);
          
        $this->validate($request,[
            'nota1'=>'nullable|numeric|between:1,20',
            'nota2'=> 'nullable|numeric|between:1,20',
            'nota3' => 'nullable|numeric|between:1,20',                         
        ],[          
            'nota1.numeric'=>'Solo números del 1 al 20',          
            'nota2.numeric'=>'Solo números del 1 al 20',  
            'nota3.numeric'=>'Solo números del 1 al 20',  
            'nota1.between'=>'Solo números del 1 al 20',           
            'nota2.between'=>'Solo números del 1 al 20',  
            'nota3.between'=>'Solo números del 1 al 20',  
                            
       ]);

       $nota1=$request->get('nota1');      
       $nota2=$request->get('nota2');
       $nota3=$request->get('nota3');
       $nota_def=number_format((($nota1+$nota2+$nota3)/3),2);       
    
        $alumno=Nota::where('notas.id',$id)
                    ->join('matriculas','notas.matricula_id','matriculas.id')
                    ->join('alumnos','matriculas.alumno_id','alumnos.id')
                    ->join('anio_asignaturas','notas.anio_asignatura_id','anio_asignaturas.id')
                    ->join('asignaturas','anio_asignaturas.asignatura_id','asignaturas.id')
                    ->get();

        $nota_actual = Nota::find($id);         
        $nota_actual->nota1=$nota1;
        $nota_actual->nota2=$nota2;    
        $nota_actual->nota3=$nota3;
        $nota_actual->nota_def=$nota_def;     
        $nota_actual->update();  
                
        return redirect('/notas')->with('message', 
        'Nota de   '.$alumno[0]->abreviado.' - '.$alumno[0]->apellidos.' '.$alumno[0]->nombres.' ha sido editada'); 
      
    }

    public function show(){
        $anio_activo=Anio::find(1); 
        $corte=CorteNota::all();
        
        $usuario=Auth::user();
      
        if ($usuario->id==1) {

        $notas = Nota::join('anio_asignaturas','notas.anio_asignatura_id', 'anio_asignaturas.id')
                    ->join('matriculas','notas.matricula_id','matriculas.id')
                    ->where('matriculas.anio_id',$anio_activo->id_activo)                        
                    ->select('*','notas.id as nota_id')
                    ->get();

        }else{
        $notas = Nota::join('anio_asignaturas','notas.anio_asignatura_id', 'anio_asignaturas.id')
                    ->join('matriculas','notas.matricula_id','matriculas.id')
                    ->join('docentes','anio_asignaturas.docente_id','docentes.id')                
                   
                    ->where('matriculas.anio_id',$anio_activo->id_activo)  
                    ->where('nombre_docente', $usuario->name)
                    ->select('*','notas.id as nota_id')
                    ->get();
            
        }          

        return view('notas.cargar',compact('notas','corte'));
    }

    public function cargar(Request $request){
        dd($request);
    }
    

   
    public function destroy(Nota $nota)
    {
        //
    }

  
}
