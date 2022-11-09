<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Anio;
use App\Models\Grado;
use App\Models\Seccion;
use Illuminate\Http\Request;

class DocenteController extends Controller 
{
    function __construct()
    {
        $this->middleware('permission:ver-docente|crear-docente|editar-docente|borrar-docente')->only('index');
        $this->middleware('permission:crear-docente')->only('create, store');
        $this->middleware('permission:editar-docente')->only('edit, update');
        //$this->middleware('permission:borrar-docente')->only('destroy');
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
        
        $docentes = Docente::all(); 
       
        return view('docentes.index', compact('docentes','anio_activo'));
        }
    }

    
    public function create()
    {
        $grados=Grado::where('estado', '1')->get();
        $seccions=Seccion::where('estado', '1')->get();

        return view('docentes.crear',compact('grados','seccions'));
    }

    
    public function store(Request $request)
    {
        $this->validate($request,[
            'nombre_docente'=>'required|regex:/^[a-zA-ZÑñáéíóú\s]{3,35}+$/',
            'especialidad'=>'regex:/^[a-zA-ZÑñáéíóú\s]{3,30}+$/|nullable',
            'telefonos'=>'max:35|nullable',
            'correo' => 'email|max:50|nullable',
        ],[   
            'nombre_docente.required'=>'Se requiere nombre completo.',
            'nombre_docente.regex'=>'Solo de 3 a 35 caracteres alfabéticos.',
            'especialidad.regex'=>'Solo de 3 a 30 caracteres alfabéticos.',
            'telefonos.max'=>'Máximo 35 caracteres.',
            'correo.email'=>'Debe ser un correo válido.',
            'correo.max'=>'Máximo 50 caracteres.',
        ]);
             
            
        Docente::create($request->all());
        return redirect('/docentes')->with('message', 'Docente ha sido añadido');
    }
    
    public function edit(Docente $docente)
    {
        $grados=Grado::where('estado', '1')->get();
        $seccions=Seccion::where('estado', '1')->get();

        return view('docentes.editar',compact('docente','grados','seccions'));
    }

    
    public function update(Request $request, Docente $docente)
    {
        $this->validate($request,[
            'nombre_docente'=>'required|regex:/^[a-zA-ZÑñáéíóú\s]{3,35}+$/',
            'especialidad'=>'regex:/^[a-zA-ZÑñáéíóú\s]{3,30}+$/|nullable',
            'telefonos'=>'max:35|nullable',
            'correo' => 'email|max:50|nullable',
        ],[   
            'nombre_docente.required'=>'Se requiere nombre completo.',
            'nombre_docente.regex'=>'Solo de 3 a 35 caracteres alfabéticos.',
            'especialidad.regex'=>'Solo de 3 a 30 caracteres alfabéticos.',
            'telefonos.max'=>'Máximo 35 caracteres.',
            'correo.email'=>'Debe ser un correo válido.',
            'correo.max'=>'Máximo 50 caracteres.',
        ]);
       
        $docente->update($request->all());
        return redirect('/docentes')->with('message', 'Docente ha sido editado');; 
    }

    
   /* public function destroy($id)
    {
        $docente=Docente::find($id);
        $docente->delete();
        return redirect('/docentes');    
    }*/
}
