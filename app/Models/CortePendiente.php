<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CortePendiente extends Model
{
    use HasFactory; 
    public $timestamps = false;
    
    protected $table = 'corte_pendientes';
    protected $fillable = [ 
        'nombre', 'fecha','estado'
    ];
}
