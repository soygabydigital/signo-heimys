<?php

namespace App\Http\Controllers;

use App\Models\Anio;
//use Illuminate\Http\Request;

class AnioController extends Controller
{
    function __construct()
    {        
        $this->middleware('permission:editar-anio',['only'=>['update']]);      
    }
   
    public function index()
    {
        $anio_activo = Anio::find(1);  

        if (is_null($anio_activo)){
            $mensaje='No hay datos en Año Escolar o Periodo Escolar....';   
            $formato='alert alert-danger';  

               
        }elseif (empty($anio_activo->id_activo)){
            $mensaje='Debe Activar un Año o Periodo Escolar';
            $formato='alert alert-warning';
        }
        else{            
            $mensaje='';
            $formato=''; 

            session(['activo' => $anio_activo->numero]);          
        }; 

        $anios = Anio::all();  

        $variables=[
            'anios'=>$anios,
            'anio_activo'=>$anio_activo, 
            'mensaje'=>$mensaje,
            'formato'=>$formato];  

        return view('anios.index',$variables);  
        //return dd($anio_activo);
    }

   
    public function update($id)
    {
        $anio_activo=Anio::find($id);
        $anio=Anio::find(1);

        $anio->numero = $anio_activo->numero;  
        $anio->id_activo = $anio_activo->id;     
        $anio->update();
        
        return redirect('/anios');    
    }
   
   
}
