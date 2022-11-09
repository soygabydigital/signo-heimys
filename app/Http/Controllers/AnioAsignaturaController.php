<?php

namespace App\Http\Controllers;


use App\Models\AnioAsignatura;
use App\Models\Anio;
use App\Models\Asignatura;
use App\Models\Docente;

use Illuminate\Http\Request; 

class AnioAsignaturaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-periodo_asignatura|crear-alumno|editar-periodo_asignatura|borrar-periodo_asignatura')->only('index');
        $this->middleware('permission:crear-periodo_asignatura')->only('create, store');
        $this->middleware('permission:editar-periodo_asignatura')->only('edit, update');
        //$this->middleware('permission:borrar-periodo_asignatura')->only('destroy');
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

        // * * * * * * Chequea que exista Asignaturas en la Base de Datos * * * * *     
        $contar_asignaturas=Asignatura::where('estado','1')->count();
        if ($contar_asignaturas==0){
            return redirect('/asignaturas');
        }

         // * * * * * *  Chequea que exista Docentes en la Base de Datos * * * *     
         $contar_docentes=Docente::where('estado','1')->count();    
         if($contar_docentes==0){
             return redirect('/docentes');
             }    
        
        $anio_asignaturas = AnioAsignatura::where('anio_id',$anio_activo->id_activo)->get(); 
        $contar=$anio_asignaturas->count();
       
        return view('anio_asignaturas.index', compact('anio_asignaturas','anio_activo','contar'));
    
        }
    }

   
    public function create()
    {
        $anio_activo=Anio::find(1);

        $contar=Asignatura::where('estado','1')
                            //->where('abreviado','<>','Pendiente 1')
                            //->where('abreviado','<>','Pendiente 2')
                            ->count();

        $asignaturas=Asignatura::where('estado','1')
                               // ->where('abreviado','<>','Pendiente 1')
                               // ->where('abreviado','<>','Pendiente 2')                            
                                ->get();

        $contar1=AnioAsignatura::where('anio_id',$anio_activo->id_activo)->count();

        if($contar1>30){           
            return redirect('/anio_asignaturas')
            ->with('message','Las asignaturas ya han sido migradas.');
        }
 
        for ($i = 0; $i < $contar; $i++) {
 
         $asignaturanota = new AnioAsignatura;
         $asignaturanota -> anio_id=$anio_activo->id_activo;
         $asignaturanota ->docente_id=null; 
         $asignaturanota -> asignatura_id=$asignaturas[$i]->id;
         $asignaturanota->save();
        }        
 
         return redirect('/anio_asignaturas')
         ->with('message', 'Las Asignaturas han sido consolidadas');
         
     }
    

   
    public function store(Request $request)
    {
        print_r( $request->all() );
    }

   
    public function show($id) 
    {
        //
    }

  
    public function edit(AnioAsignatura $anio_asignatura) 
    {
        $anio_activo=Anio::find(1); 
        $docentes=Docente::pluck('nombre_docente','id')->all();                      
        
        return view('anio_asignaturas.editar',compact('anio_asignatura','anio_activo','docentes')); 
    }

   
    public function update(Request $request, AnioAsignatura $anio_asignatura)
    {      

        $anio_asignatura->update($request->all());
        return redirect('/anio_asignaturas');
    }
   
}
