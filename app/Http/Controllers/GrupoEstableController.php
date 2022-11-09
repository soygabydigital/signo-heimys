<?php

namespace App\Http\Controllers;

use App\Models\Anio;
use App\Models\Docente;
use App\Models\GrupoEstable;
use Illuminate\Http\Request;
use Carbon\Carbon;


class GrupoEstableController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-grupo|crear-grupo|editar-grupo|borrar-grupo')->only('index');
        $this->middleware('permission:crear-grupo')->only('create, store');
        $this->middleware('permission:editar-grupo')->only('edit, update');
        //$this->middleware('permission:borrar-grupo')->only('destroy');
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

        // * * * * * *  Chequea si hay Docentes en Registrados * * * * * * 
       $contar_docentes=Docente::where('estado','1')->count();
       if ($contar_docentes==0){              
        return redirect('/docentes');
        }
        
        $grupoestables = GrupoEstable::where('anio_id',$anio_activo->id_activo)->get();
    
        return view('grupoestables.index', compact('grupoestables','anio_activo','fuera_fecha'));
       
     } 
    }

   
    public function create()
    {
        $anio_activo=Anio::find(1); 
        $docentes=Docente::where('estado','1')
                        ->pluck('nombre_docente','id');
        
        return view('grupoestables.crear', compact('anio_activo','docentes'));
    }

   
    public function store(Request $request)
    {       
        $request->validate([  
            'nombre'=>'required|max:40',
            'descripcion'=> 'required|max:100',                             
        ],
        [             
            'nombre.required'=>'Nombre es equerido.',
            'nombre.max'=>'Nombre: Max 40 caracteres.',            
            'descripcion.required'=>'Descripción es requerida.',
            'descripcion.max'=> 'Descripción: Max 100 caracteres.',           
       ]
    );    
 
        GrupoEstable::create($request->all());
        return redirect('/grupoestables')->with('message', 'Grupo estable ha sido añadido');
    }

    
    public function show($id)
    {/*
        $anio_activo=Anio::find(1); 
        $grupo=Grupo::find($id);

        $matriculas=Matricula::where('anio_id',$anio_activo->id_activo)
                                ->where('grupo_id',$id)->get();        
     
        return view('grupo.show',compact('grupo','matriculas','anio_activo'));
        //dd($grupo);*/
    }

   
    public function edit(GrupoEstable $grupoestable)
    {
        $anio_activo=Anio::find(1); 
        $docentes=Docente::where('estado','1')->pluck('nombre_docente','id');

        return view('grupoestables.editar',compact('grupoestable','anio_activo','docentes'));
    }

   
    public function update(Request $request, GrupoEstable $grupoestable)
    {
        $anio_activo=Anio::find(1);  
        $request->validate([  
            'nombre'=>'required|max:40',
            'descripcion'=> 'required|max:100',                             
        ],
        [             
            'nombre.required'=>'Nombre es equerido.',
            'nombre.max'=>'Nombre: Max 40 caracteres.',         
            'descripcion.required'=>'Descripción es requerida.',
            'descripcion.max'=> 'Descripción: Max 100 caracteres.',           
       ]
    );    

    
        $grupoestable->update($request->all());
        return redirect('/grupoestables')->with('message', 'Grupo estable ha sido editado');
    }

   
    public function destroy($id)
    {
        // 
    }
}
