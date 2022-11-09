<?php

namespace App\Http\Controllers;

use App\Models\Anio;
use App\Models\Matricula;
use App\Models\Retiro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RetiroController extends Controller
{
   
    public function index()
    {
       $anio_activo=Anio::find(1);  
       $user=Auth::user();

             $anio_activo=Anio::find(1);
             $retiros=Retiro::join('users','retiros.user_id','users.id') 
                            ->join('matriculas','retiros.matricula_id','matriculas.id')  
                            ->join('alumnos','matriculas.alumno_id','alumnos.id') 
                            ->select('retiros.*','users.*', 'alumnos.*','retiros.id as id') 
                            ->where('anio_id',$anio_activo->id_activo)         
                            ->get();

        return view('retiros.index', compact('retiros'));   
    }

    public function create($id)
    {
        $anio_activo=Anio::find(1);
        $matricula_id=$id;      
        $user=Auth::user();
        
        return view('retiros.crear', compact('anio_activo', 'matricula_id', 'user'));
    }

    public function store(Request $request)
    {

        $this->validate($request,[
            'fecha_retiro' => 'required',
            'motivo' => 'required|regex:/^[a-zA-ZÑñáéíóú\s]{5,100}+$/', 
        ],
        [      
            'fecha_retiro.required' => 'Fecha es requerida.',      
            'motivo.required' => 'Motivo es requerido.',  
            'motivo.regex' => 'Solo de 2 a 100 caracteres alfabéticos.',        

       ] 
    );       
        
       Retiro::create($request->all());

       return redirect()->route('retiros.index')->with('message', 'La matricula ha sido retirada');
         
    } 

}
