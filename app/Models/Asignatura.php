<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignatura extends Model
{
	use HasFactory;
	
    public $timestamps = true;
    protected $table = 'asignaturas';
    protected $fillable = ['abreviado','nombre','calificacion_tipo','estado','orden','grado_id'];
	   
    public function anioAsignatura(){
        return $this->hasOne(AnioAsignatura::class);
    }    
   
    public function grado(){
        return $this->belongsTo(Grado::class);
    }
    
}
