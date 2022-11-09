<?php

namespace App\Http\Controllers;

use App\Models\Anio;
use App\Models\CortePendiente;

class CortePendienteController extends Controller
{
    function __construct()
    {        
        $this->middleware('permission:editar-corte',['only'=>['update']]);      
    }

    public function index()
    {        
        $cortes=CortePendiente::all();
        $anio_activo = Anio::find(1); 
        if (is_null($anio_activo)){
           return redirect('anios');  

        }elseif (empty($anio_activo->id_activo)){
            return redirect('anios');  
        }
        else{
           $variables=['cortes'=>$cortes,
            'anio_activo'=>$anio_activo,
            ];

        return view('cortespendiente.index',$variables);  
            }
    }

   
    public function update($id)
    {
        $corte=CortePendiente::find($id);

        if ($corte->estado=='0') 
        $corte->estado = '1';
        elseif($corte->estado=='1')
        $corte->estado='0';          

        $corte->update();
        
        return redirect('/cortespendiente');
    }
   
}
