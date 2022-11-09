<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnioAsignatura extends Model
{
	use HasFactory;
	
    public $timestamps = true;
    protected $table = 'anio_asignaturas';
    protected $fillable = ['anio_id','asignatura_id','docente_id'];
	
   
    public function anio(){
        return $this->belongsTo(Anio::class);
    }   
   
    public function asignatura(){
        return $this->belongsTo(Asignatura::class);
    }    
   
    public function docente(){
        return $this->belongsTo(Docente::class); 
    }
   
    public function notas(){
        return $this->hasMany(Nota::class);
    }
    
}
