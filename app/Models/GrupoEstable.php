<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoEstable extends Model
{
    public $timestamps = true;
    protected $table = 'grupo_estables';
    protected $fillable = ['anio_id','nombre','descripcion','docente_id'];

    public function matriculas()
    {
        return $this->hasMany(Matricula::class);
    }  

    public function anio()
    {
        return $this->belongsTo(Anio::class);
    }  
    
    public function docente(){
        return $this->belongsTo(Docente::class);
    }
}
