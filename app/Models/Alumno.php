<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
	use HasFactory;
	
    public $timestamps = true;
    protected $table = 'alumnos';
    protected $fillable = [
        'cedula','apellidos','nombres','genero','fecha_nacimiento', 'lugar_nacimiento',
        'direccion','telefono','correo','representante','cedula_rep', 'telefono_rep', 'estado'];
	
   
    public function matriculas(){
        return $this->hasMany(Matricula::class);
    }

   

   
    
}
