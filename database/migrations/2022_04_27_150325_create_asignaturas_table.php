<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaturas', function (Blueprint $table) {
           // $table->engine='InnoDB';
            $table->id();           
            $table->string('abreviado',16);            
            $table->string('nombre',100);                     
            $table->string('calificacion_tipo',8);
            $table->boolean('estado');  
            $table ->string('orden',2)->nullable();  

            $table->foreignId('grado_id')
            ->nullable()
            ->constrained('grados')
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
        Schema::dropIfExists('asignaturas');
    }
}
