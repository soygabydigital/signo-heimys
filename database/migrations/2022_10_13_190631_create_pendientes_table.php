<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePendientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendientes', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->foreignId('matricula_id')
            ->nullable()
            ->constrained('matriculas')
            ->cascadeOnUpdate()
            ->nullOnDelete(); 

           /* $table->foreignId('docente_id')
            ->nullable()
            ->constrained('docentes')
            ->cascadeOnUpdate()
            ->nullOnDelete(); */

            $table->string('materia',15)->nullable(); 
            $table->string('docente',3)->nullable();         
            $table->decimal('nota1',4,2)->nullable();
            $table->decimal('nota2',4,2)->nullable();
            $table->decimal('nota3',4,2)->nullable();
            $table->decimal('nota4',4,2)->nullable();

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
        Schema::dropIfExists('pendientes');
    }
}
