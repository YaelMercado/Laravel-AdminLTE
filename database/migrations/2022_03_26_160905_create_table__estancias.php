<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableEstancias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_estancias', function (Blueprint $table) {
            $table->id();
            $table->integer('type_estancia');
            $table->text('name');
            $table->text('descripcion')->nulleable();
            $table->text('imagen_portada')->nulleable();
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->text('pais_destino')->nulleable();
            $table->text('imagen_pais_destino')->nulleable();
            $table->text('universidad_destino')->nulleable();
            $table->text('imagen_universidad_destino')->nulleable();
            $table->text('archive_politias_reglas')->nulleable();
            $table->text('archive_agenda')->nulleable();
            $table->text('imagen_fondo')->nulleable();
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
        Schema::dropIfExists('table_estancias');
    }
}
