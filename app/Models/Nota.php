<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
	use HasFactory;
	
    public $timestamps = true;
    protected $table = 'notas';
    protected $fillable = [
       'matricula_id', 'anio_asignatura_id', 'nota1', 'nota2', 'nota3','nota_def'];
	
   
    public function anioAsignatura(){
        return $this->belongsTo(AnioAsignatura::class);
    }
   
    public function matricula(){ 
        return $this->belongsTo(Matricula::class);
    }
    
}
