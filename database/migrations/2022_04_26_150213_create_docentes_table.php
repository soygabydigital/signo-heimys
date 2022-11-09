<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            //$table->engine='InnoDB';
            $table->id();
            $table->string('nombre_docente',35);
            $table->string('especialidad',30)->nullable();
            $table->string('telefonos',35)->nullable();
            $table->string('correo',50)->nullable();            
            $table->boolean('estado');
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
        Schema::dropIfExists('docentes');
    }
}
