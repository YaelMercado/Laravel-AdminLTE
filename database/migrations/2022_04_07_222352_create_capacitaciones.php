<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCapacitaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('capacitaciones', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nulleable();
            $table->text('descripcion')->nulleable();
            $table->datetime('fecha_inicio')->nulleable();
            $table->datetime('fecha_fin')->nulleable();
            $table->integer('active')->nulleable();
            $table->integer('type')->nulleable();
            $table->integer('id_instructor')->nulleable();
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
        Schema::dropIfExists('capacitaciones');
    }
}
