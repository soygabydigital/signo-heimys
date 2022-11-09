<?php

namespace App\Http\Controllers;

use App\Models\Anio;
use App\Models\CorteNota;
use Illuminate\Http\Request;


class CorteNotaController extends Controller
{
    function __construct()
    {        
        $this->middleware('permission:editar-corte',['only'=>['update']]);      
    }

    public function index()
    {

        $cortes=CorteNota::all();
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

        return view('cortes.index',$variables);  
            }
    }

   
    public function update(Request $request,$id)
    {
        $corte=CorteNota::find($id);

        if ($corte->estado=='0') 
        $corte->estado = '1';
        elseif($corte->estado=='1')
        $corte->estado='0';      
        
       // $corte->inicio=$request->get('inicio');
       // $corte->final=$request->get('final');

        $corte->update();
        
        return redirect('/cortes');
    }
   
}
