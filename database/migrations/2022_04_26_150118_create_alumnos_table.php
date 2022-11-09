<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            //$table->engine='InnoDB';
            $table->bigIncrements('id');
            $table->string('cedula',10)->unique();
            $table->string('apellidos',35);           
            $table->string('nombres',35);          
            $table->string('genero',1);
            $table->date('fecha_nacimiento')->nullable();
            $table->string('lugar_nacimiento',60)->nullable();
            $table->string('direccion',60)->nullable();
            $table->string('telefono',30)->nullable();
            $table->string('correo',50)->nullable();
            $table->string('representante',35)->nullable();
            $table->string('cedula_rep',10)->nullable();
            $table->string('telefono_rep',30)->nullable();
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
        Schema::dropIfExists('alumnos');
    }
}
