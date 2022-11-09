<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
	use HasFactory;
	
    public $timestamps = true; 
    protected $table = 'docentes';
    protected $fillable = ['nombre_docente','especialidad','telefonos','correo','estado'];
	    
  
    public function anioAsignaturas(){
        return $this->hasMany(AnioAsignatura::class);
    }    

    public function grupos(){
        return $this->hasMany(Grupo::class);
    }    
    
    public function pendientes(){
        return $this->hasMany(Pendiente::class);
    }    
}
