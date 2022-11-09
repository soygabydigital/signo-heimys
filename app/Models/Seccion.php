<?php

namespace App\Models;

/*use Illuminate\Database\Eloquent\Factories\HasFactory;*/
use Illuminate\Database\Eloquent\Model;

class Seccion extends Model
{
    public $timestamps = false;
    
    protected $table = 'seccions';
    protected $fillable = [ 
        'nombre_seccion', 'estado'
    ];

    public function matriculas(){
        return $this->hasMany(Matricula::class);
    }  
   

}
