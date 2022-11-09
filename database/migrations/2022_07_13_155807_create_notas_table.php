<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notas', function (Blueprint $table) {
            //$table->engine='InnoDB';
            $table->bigIncrements('id');
            $table->decimal('nota1',4,2)->nullable();           
            $table->decimal('nota2',4,2)->nullable();  
            $table->decimal('nota3',4,2)->nullable(); 
            $table->decimal('nota_def',4,2)->nullable();     

            //Declarar Claves Foráneas  

             $table->foreignId('matricula_id')
             ->nullable()
             ->constrained('matriculas')
             ->cascadeOnUpdate()
             ->nullOnDelete(); 

             $table->foreignId('anio_asignatura_id')
             ->nullable()
             ->constrained('anio_asignaturas')
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
        Schema::dropIfExists('notas');
    }
}
