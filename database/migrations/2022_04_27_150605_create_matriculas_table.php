<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatriculasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matriculas', function (Blueprint $table) {
            //$table->engine='InnoDB';
            $table->bigIncrements('id');
             
             //Claves Foráneas  
             $table->foreignId('anio_id')
             ->nullable()
             ->constrained('anios')
             ->cascadeOnUpdate()
             ->nullOnDelete(); 

             $table->foreignId('grado_id')
             ->nullable()
             ->constrained('grados')
             ->cascadeOnUpdate()
             ->nullOnDelete(); 

             $table->foreignId('seccion_id')
             ->nullable()
             ->constrained('seccions')
             ->cascadeOnUpdate()
             ->nullOnDelete(); 

             $table->foreignId('alumno_id')
             ->nullable()
             ->constrained('alumnos')
             ->cascadeOnUpdate()
             ->nullOnDelete(); 

             $table->foreignId('grupo_estable_id')
             ->nullable()
             ->constrained('grupo_estables')
             ->cascadeOnUpdate()
             ->nullOnDelete();
             
            $table->string('estatus',12)->nullable();
            $table->date('fecha_estatus')->nullable();           
            $table->boolean('repite')->nullable();
            //$table->string('mat_pend1',16)->nullable();
            //$table->string('mat_pend2',16)->nullable();            
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matriculas');
    }
}
