<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use App\Models\Anio;
use App\Models\Grado;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ver-asignatura|crear-asignatura|editar-asignatura')->only('index');
        $this->middleware('permission:crear-asignatura')->only('create, store');
        $this->middleware('permission:editar-asignatura')->only('edit, update');
        //$this->middleware('permission:borrar-asignatura')->only('destroy');
    }
     

    public function index()
    {
        $anio_activo=Anio::find(1);  
        if (is_null($anio_activo)){
          return redirect('anios');  

        }elseif (empty($anio_activo->id_activo)){
            return redirect('anios');  
        }
        else{
            
        // * * * * * *  Chequea que exista Grado en la Base de Datos * * * *     
        $contar_grados=Grado::where('estado','1')->count();    
        if($contar_grados==0){
            return redirect('/grados');
            }
        
        $grados=Grado::all();
        $asignaturas = Asignatura::all();

        return view('asignaturas.index',compact('asignaturas','grados','anio_activo'));            
        }   
    }

    
    public function create() 
    { 
        $anio_activo=Anio::find(1);
        $grados=Grado::where('estado','1')->pluck('nombre_grado','id');
        return view('asignaturas.crear',compact('anio_activo', 'grados')); 
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[   

            'nombre' => 'required|regex:/^[a-zA-ZÑñáéíóú0-9\s]{5,60}+$/',
            'grado_id' => 'required',
            'abreviado' => 'required|regex:/^[a-zA-ZÑñáéíóú.0-9\s]{5,16}+$/'
        ],[ 
            'nombre.required' =>'Nombre es requerido.',
            'nombre.regex' =>'Solo de 5 a 60 caracteres alfabéticos.',
            'grado_id.required' => 'Grado es requerido.',
            'abreviado.required' => 'Abreviado es requerido.',
            'nombre.regex' => 'Solo de 5 a 16 caracteres alfabéticos.',
        ]); 
 
        Asignatura::create($request->all());
        return redirect('/asignaturas')->with('message', 'Asignatura ha sido añadida');
    }

     
    public function show(Request $request, $id)
    {
         
    }

    
    public function edit(Asignatura $asignatura)
    { 
        $anio_activo=Anio::find(1);
        $grados=Grado::where('estado','1')->pluck('nombre_grado','id');      
        return view('asignaturas.editar',compact('asignatura','anio_activo','grados'));
    }

   
    public function update(Request $request, Asignatura $asignatura)
    {
        $this->validate($request,[   

            'nombre' => 'required|regex:/^[a-zA-ZÑñáéíóú0-9\s]{5,60}+$/',
            'grado_id' => 'required',
            'abreviado' => 'required|regex:/^[a-zA-ZÑñáéíóú.0-9\s]{5,16}+$/'
        ],[ 
            'nombre.required' =>'Nombre es requerido.',
            'nombre.regex' =>'Solo de 5 a 60 caracteres alfabéticos.',
            'grado_id.required' => 'Grado es requerido.',
            'abreviado.required' => 'Abreviado es requerido.',
            'nombre.regex' =>'Solo de 5 a 16 caracteres alfabéticos.',
        ]); 
        
        $asignatura->update($request->all());
        return redirect('/asignaturas')->with('message', 'Asignatura ha sido editada');
    }

  
}
