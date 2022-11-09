<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendiente extends Model
{
    use HasFactory;

    public $timestamps = true;
    protected $table = 'pendientes';
    protected $fillable = [
       'matricula_id','materia','docente','nota1','nota2','nota3','nota4'       
    ];

       public function pendiente(){
        return $this->belongsTo(Matricula::class); 
       }

       public function docente(){
         return $this->belongsTo(Docente::class); 
        }

    
}
