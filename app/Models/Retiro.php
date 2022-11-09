<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Retiro extends Model
{
    use HasFactory; 
	
    public $timestamps = true;
    protected $table = 'retiros';
    protected $fillable = [
       'matricula_id', 'user_id', 'fecha_retiro', 'motivo'];
	
   
   /* public function Matricula(){
        return $this->belongsTo(Matricula::class);
    }*/
}
