<?php 

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
	use HasFactory;
	
    public $timestamps = true;
    protected $table = 'matriculas';
    protected $fillable = [
        'anio_id','grado_id','seccion_id','alumno_id','grupo_estable_id','estatus','fecha_estatus','repite'];
	
   
    public function alumno(){
        return $this->belongsTo(Alumno::class);
    }    
   
    public function anio(){
        return $this->belongsTo(Anio::class);
    }    
   
    public function grado(){
        return $this->belongsTo(Grado::class);
    }

    public function seccion(){
        return $this->belongsTo(Seccion::class);
    }    
    
    public function grupo_estable(){
        return $this->belongsTo(GrupoEstable::class);
    }
   
    public function notas(){
        return $this->hasMany(Nota::class);
    }    
   
    public function pendientes(){
        return $this->hasMany(Pendiente::class);
    } 
    
   /* public function retiros(){
        return $this->hasMany(Retiro::class);
    } */
}
    
