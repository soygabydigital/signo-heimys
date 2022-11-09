<?php

namespace App\Http\Controllers;

use App\Models\Anio;
use App\Models\Grado;
use Illuminate\Http\Request;

class GradoController extends Controller
{
    function __construct()
    {        
        $this->middleware('permission:editar-grado',['only'=>['update']]);      
    }
   
    public function index()
    {
        $grados=Grado::all();
        $anio_activo = Anio::find(1); 
        if (is_null($anio_activo)){
             return redirect('/anios');  

        }elseif (empty($anio_activo->id_activo)){
            return redirect('/anios');   
        }
        else{

        $variables=[
            'grados'=>$grados,
            'anio_activo'=>$anio_activo,];

        return view('grados.index',$variables);
        }
    }


    
    public function update(Request $request, $id)
    {
        $grado=Grado::find($id);

        if ($grado->estado=='0')
        $grado->estado = '1';
        elseif($grado->estado=='1')
        $grado->estado='0';          

        $grado->update();
        
        return redirect('/grados');
    }

    
  
}
