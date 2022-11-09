<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnioAsignaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anio_asignaturas', function (Blueprint $table) {
            //$table->engine='InnoDB';
            $table->bigIncrements('id');

            $table->foreignId('anio_id')
            ->nullable()
            ->constrained('anios')
            ->cascadeOnUpdate()
            ->nullOnDelete(); 
            
            $table->foreignId('asignatura_id')
            ->nullable()
            ->constrained('asignaturas')
            ->cascadeOnUpdate()
            ->nullOnDelete(); 

            $table->foreignId('docente_id')
            ->nullable()
            ->constrained('docentes')
            ->cascadeOnUpdate()
            ->nullOnDelete(); 

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
        Schema::dropIfExists('anio_asignaturas');
    }
}
