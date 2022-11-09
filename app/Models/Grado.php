<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grado extends Model
{
      
    protected $table = 'grados'; 
    protected $fillable = [
        'nombre_grado', 'estado'
    ];

    public function matriculas(){
        return $this->hasMany(Matricula::class);
    }  

    public function asignaturas(){
        return $this->hasMany(Asignatura::class);
    }

   
}
