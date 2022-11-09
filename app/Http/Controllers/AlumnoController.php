<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Anio;
use Illuminate\Http\Request;

class AlumnoController extends Controller 
{
    function __construct()
    {
        $this->middleware('permission:ver-alumno|crear-alumno|editar-alumno|borrar-alumno')->only('index');
        $this->middleware('permission:crear-alumno')->only('create, store');
        $this->middleware('permission:editar-alumno')->only('edit, update');
        //$this->middleware('permission:borrar-alumno')->only('destroy');
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

        $alumnos = Alumno::all(); 

        return view('alumnos.index', compact('alumnos'));
      
    }
    }
 
    
    public function create(Request $request)
    {          
       $cedula=request('cedula'); 
       return view('alumnos.crear',compact('cedula'));
    }

    
    public function store(request $request)
    {
        $this->validate($request,[
            'cedula' => 'required|integer|between:1000000,999999999|unique:alumnos',
            'apellidos' => 'required|regex:/^[a-zA-ZÑñáéíóú\s]{2,35}+$/',  //regex:/^[a-zA-ZÑñáéíóú\s]+$/
            'nombres' => 'required|regex:/^[a-zA-ZÑñáéíóú\s]{2,35}+$/',
            'direccion' => 'max:60|nullable',  
            'lugar_nacimiento' => 'max:60|nullable',       
            'telefono' => 'max:30|nullable',
            'correo' => 'email|max:50|nullable',
            'representante' => 'regex:/^[a-zA-ZÑñáéíóú\s]{2,35}+$/|nullable',
            'cedula_rep' => 'integer|between:1000000,999999999|nullable',   
            'telefono_rep' => 'max:30|nullable',   
        ],
        [      
            'cedula.integer' => 'Solo números permitidos.',      
            'cedula.required' => 'Número de cédula requerido.',          
            'cedula.between' => 'Número entero entre 1.000.000 y 999.999.999',         
            'cedula.unique' => 'Número de cédula ya existe en el sistema.',
            'apellidos.required' => 'Apellido es requerido.',
            'apellidos.regex' =>'Solo de 2 a 35 caracteres alfabéticos.',          
            'nombres.required' => 'Nombre es requerido',
            'nombres.regex' =>'Solo de 2 a 35 caracteres alfabéticos.',          
            'direccion.max' => 'Máximo 60 caracteres.',
            'lugar_nacimiento.max' => 'Máximo 60 caracteres.',
            'telefono.max' => 'Máximo 30 caracteres.',  
            'correo.email' => 'Debe ser una dirección válida.',       
            'correo.max' => 'Máximo 50 caracteres.',
            'representante.regex' => 'Solo de 2 a 35 caracteres alfabéticos.',
            'cedula_rep.between' => 'Número entero entre 1.000.000 y 999.999.999',
            'cedula_rep.integer' => 'Solo números',
            'telefono_rep.max' => 'Máximo 30 caracteres.',  

       ] 
    );       
        
        Alumno::create($request->all());
        return redirect('/alumnos')->with('message', 'Alumno ha sido añadido');         
    }

   
    public function edit(Alumno $alumno)
    {        
        return view('alumnos.editar',compact('alumno'));
    }

   
    public function update(Request $request, Alumno $alumno)
    {
        $this->validate($request,[
            'cedula' => 'required|integer|between:1000000,999999999',
            'apellidos' => 'required|regex:/^[a-zA-ZÑñáéíóú\s]{2,35}+$/',  //regex:/^[a-zA-ZÑñáéíóú\s]+$/
            'nombres' => 'required|regex:/^[a-zA-ZÑñáéíóú\s]{2,35}+$/',
            'fecha_nacimiento' =>'nullable|after_or_equal:01-01-2000',
            'direccion' => 'max:60|nullable',
            'lugar_nacimiento' => 'max:60|nullable',            
            'telefono' => 'max:30', //regex:/0254[0-9]{11}/',
            'correo' => 'email|max:50|nullable',
            'representante' => 'regex:/^[a-zA-ZÑñáéíóú\s]{2,35}+$/|nullable',
            'cedula_rep' => 'integer|between:1000000,999999999',   
            'telefono_rep' => 'max:30', //regex:/0254[0-9]{11}/',   
        ],
        [      
            'cedula.integer' => 'Solo números permitidos.',      
            'cedula.required' => 'Número de cédula requerido.',          
            'cedula.between' => 'Número entero entre 1.000.000 y 999.999.999',
            'apellidos.required' => 'Apellido es requerido.',
            'apellidos.regex' => 'Solo de 2 a 35 caracteres alfabéticos.',          
            'nombres.required' => 'Nombre es requerido',
            'nombres.regex' => 'Solo de 2 a 35 caracteres alfabéticos.',          
            'direccion.max' => 'Máximo 60 caracteres.',
            'lugar_nacimiento.max' => 'Máximo 60 caracteres.',
            'telefono.max' => 'Máximo 30 caracteres.',  
            'correo.email' => 'Debe ser una dirección válida.',       
            'correo.max' => 'Máximo 50 caracteres.',
            'representante.regex' => 'Solo de 2 a 35 caracteres alfabéticos.',
            'cedula_rep.between' => 'Número entero entre 1.000.000 y 999.999.999',
            'cedula_rep.integer' => 'Solo números',
            'telefono_rep.max' => 'Máximo 30 caracteres.',  

       ] 
    );       
       
        $alumno->update($request->all());
        return redirect('/alumnos')->with('message', 'Alumno ha sido editado');
    }
    
}
