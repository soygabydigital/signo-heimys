<?php

namespace App\Http\Controllers;
use App\Models\Anio;
use App\Models\Seccion;

class SeccionController extends Controller
{

    function __construct()
    {        
        $this->middleware('permission:editar-seccion',['only'=>['update']]);      
    }
    
    public function index()
    {
        $seccions=Seccion::all();
        $anio_activo = Anio::find(1); 
        if (is_null($anio_activo)){
           return redirect('anios');  

        }elseif (empty($anio_activo->id_activo)){
            return redirect('anios');  
        }
        else{
           $variables=['seccions'=>$seccions,
            'anio_activo'=>$anio_activo,
            ];

        return view('secciones.index',$variables);  
            }
    }
 
    public function update($id)
    {
        $seccion=Seccion::find($id);

        if ($seccion->estado=='0')
        $seccion->estado = '1';
        elseif($seccion->estado=='1')
        $seccion->estado='0';          

        $seccion->update();
        
        return redirect('/secciones');
    }

}
