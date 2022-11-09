<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AnioController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\SeccionController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\AsignaturaController;
use App\Http\Controllers\GrupoEstableController;
use App\Http\Controllers\AnioAsignaturaController;
use App\Http\Controllers\MatriculaController;
use App\Http\Controllers\NotaController;
use App\Http\Controllers\PendienteController;
use App\Http\Controllers\CorteNotaController;
use App\Http\Controllers\CortePendienteController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\RetiroController;

Route::get('/', function () {
    return view('auth.login'); 
});

Route::get('/home', [DashboardController::class,'index'])->name('home');
Auth::routes();

Route::group(['middleware'=>['auth']],function(){ 
 
    Route::get('dashboard/{id}/detalles', [DashboardController::class, 'detalles'])->name('dash');

    Route::get('inscribir',[MatriculaController::class,'inscribir'])->name('inscribir');    
    Route::get('search', [MatriculaController::class,'search'])->name('search');  
    Route::get('sinregistro1', [MatriculaController::class,'sinregistro1'])->name('sinregistro1'); 

    // * * * * * * * RUTAS PARA REPORTES * * * * * * * //  
    Route::get('reporte/{id}/constancia', [ReporteController::class,'constancia'])->name('constancia');
    Route::get('reporte/{id}/inscripcion', [ReporteController::class, 'inscripcion'])->name('inscripcion');
    Route::get('reporte/{id}/boletin', [ReporteController::class,'boletin'])->name('boletin');
    Route::get('reporte/{id}/historial', [ReporteController::class, 'historial'])->name('historial');
    Route::get('reporte/{id}/retiro', [ReporteController::class, 'retiro'])->name('retiro');


    Route::get('retiros/{id}/create', [RetiroController::class, 'create'])->name('retirar');

    /*Route::get('retirar', function($id){    
        return 'Retirar Matricula:  '.$id;
    })->name('retirar');  */    
    
   /* Route::get('dashboard/{id}/detalles', function($id){    
        return 'Estoy en ruta Dashboard -> Detalles '.$id;
    })->name('dash');*/

    Route::resources([
        'roles' => RolController::class, 
        'usuarios' => UsuarioController::class,
        'anios' => AnioController::class,
        'grados' => GradoController::class,
        'secciones' => SeccionController::class,
        'cortes' => CorteNotaController::class,
        'cortespendiente' => CortePendienteController::class,
        'alumnos' => AlumnoController::class,
        'docentes' => DocenteController::class,
        'asignaturas' => AsignaturaController::class,
        'grupoestables' => GrupoEstableController::class,
        'anio_asignaturas' => AnioAsignaturaController::class, 
        'matriculas' => MatriculaController::class, 
        'notas' => NotaController::class, 
        'pendientes' => PendienteController::class,
        'retiros'=> RetiroController::class,
        
    ]);    
 
});

