<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anio extends Model
{   

    protected $table = 'anios';
    protected $fillable = [
        'numero','id_activo'
    ];   

    public function matriculas(){
        return $this->hasMany(Matricula::class);
    }  

}
