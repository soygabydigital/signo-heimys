<?php

namespace App\Http\Controllers;

use App\Models\Anio;
use App\Models\CortePendiente;
use App\Models\Docente;
use App\Models\Matricula;
use App\Models\Pendiente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PendienteController extends Controller
{
 
    function __construct()
    {
        $this->middleware('permission:ver-pendiente|crear-pendiente|editar-pendiente|borrar-pendiente')->only('index');
        $this->middleware('permission:crear-pendiente')->only('create, store');
        $this->middleware('permission:editar-pendiente')->only('edit, update');
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

        // * * * * Chequea que Exista(n) Matricula(s) * * * * 
        $contar_matricula=Matricula::where('anio_id',$anio_activo->id_activo)->count();
        if ($contar_matricula==0){
            return redirect('/matriculas');
        }   
           
        } 
     
        $usuario=Auth::user();  

        if($usuario->id==1){    

            $pendientes=Pendiente::join('matriculas','pendientes.matricula_id','matriculas.id')
                                    ->join('alumnos','matriculas.alumno_id','alumnos.id')  
                                    ->join('seccions','matriculas.seccion_id','seccions.id')                                     
                                    //->join('docentes','pendientes.docente','docentes.id')                           
                                    ->where('matriculas.anio_id',$anio_activo->id_activo)
                                    ->select('*','pendientes.id as id')
                                    ->get();
        }else{

            $pendientes=Pendiente::join('matriculas','pendientes.matricula_id','matriculas.id')
                                    ->join('alumnos','matriculas.alumno_id','alumnos.id')  
                                    ->join('seccions','matriculas.seccion_id','seccions.id') 
                                    ->join('docentes','pendientes.docente','docentes.id')                         
                                    ->where('matriculas.anio_id',$anio_activo->id_activo)
                                    ->where('docentes.nombre_docente',$usuario->name)
                                    ->select('*','pendientes.id as id')
                                    ->get();       
        } 
        //$i=0;
        $nombre_doc=null;
        if (!empty($pendientes[0])){

            foreach ($pendientes as $pendiente) {
            $nombre_doc=Pendiente::join('docentes','pendientes.docente','docentes.id')                             
                            ->where('pendientes.id',$pendiente->id)                                                      
                            //->select('*','pendientes.id as id')                             
                            ->pluck('nombre_docente');           
     }
        }

        //echo $pendiente->id.' '.$nombre_doc[0];
       // exit;
        //dd($anio_activo);
        return view('pendientes.index', compact('pendientes',                                               
                                                'fuera_fecha',
                                                'usuario',
                                                'nombre_doc',
                                                //'contar'
                                            )); 
    }   

    
    public function edit(Pendiente $pendiente)
    {   
       //dd($pendiente);
        $anio_activo=Anio::find(1);  
        $matricula=Pendiente::join('matriculas','pendientes.matricula_id','matriculas.id')
                            ->join('alumnos','matriculas.alumno_id','alumnos.id')  
                            ->join('seccions','matriculas.seccion_id','seccions.id') 
                            ->where('matriculas.anio_id',$anio_activo->id_activo)
                            ->where('pendientes.id',$pendiente->id)
                            ->select('*','pendientes.id as id')
                            ->get();

        $docentes=Docente::where('estado',1)->pluck('nombre_docente','id');   
        /*$docente_bd=Pendiente::join('docentes','pendientes.docente','docentes.id')
                                ->where('pendientes.id',$pendiente->id)
                                ->pluck('nombre_docente');*/
        
        $corte=CortePendiente::all();
        $usuario=Auth::user();  
     

        return view('pendientes.edit',compact('pendiente',
                                                'matricula',
                                                'docentes',
                                                'corte',
                                                'usuario',
                                                //'docente_bd'
                                            ));
    }

    
    public function update(Request $request, $id)
    {
       //dd($request);
        //exit;
        $this->validate($request,[
            'nota1'=>'nullable|numeric|between:1,20',
            'nota2'=> 'nullable|numeric|between:1,20',
            'nota3' => 'nullable|numeric|between:1,20',
            'nota4' => 'nullable|numeric|between:1,20',          
                                    
        ],[          
            'nota1.numeric'=>'Solo números del 1 al 20',         
            'nota2.numeric'=>'Solo números del 1 al 20',  
            'nota3.numeric'=>'Solo números del 1 al 20',  
            'nota4.numeric'=>'Solo números del 1 al 20',  

            'nota1.between'=>'Solo números del 1 al 20',          
            'nota2.between'=>'Solo números del 1 al 20',  
            'nota3.between'=>'Solo números del 1 al 20',  
            'nota4.between'=>'Solo números del 1 al 20',   
             
                            
       ]);
       //dd($request);

        $pendiente = Pendiente::find($id);
        $pendiente->matricula_id = $request->get('matricula_id');
        $pendiente->materia = $request->get('materia');
        $pendiente->docente = $request->get('docente');
        $pendiente->nota1 = $request->get('nota1');
        $pendiente->nota2 = $request->get('nota2');
        $pendiente->nota3 = $request->get('nota3');
        $pendiente->nota4 = $request->get('nota4');
        $pendiente->update();

     
       //$pendiente->update($request->all());
       $anio_activo=Anio::find(1); 
       $matricula=Pendiente::join('matriculas','pendientes.matricula_id','matriculas.id')
                            ->join('alumnos','matriculas.alumno_id','alumnos.id')  
                            ->join('seccions','matriculas.seccion_id','seccions.id') 
                            ->where('matriculas.anio_id',$anio_activo->id_activo)
                            ->where('pendientes.id',$pendiente->id)
                            ->select('*','pendientes.id as id')
                            ->get();

       return redirect('/pendientes')->with('message', 'Materia Pendiente   '.$matricula[0]->materia.' - '.$matricula[0]->apellidos.' '.$matricula[0]->nombres.' ha sido editada');
    }

   
    public function destroy($id)
    {
        //
    }
}
