<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('codigo')->nulleable();
            $table->string('name')->nulleable();
            $table->text('descripcion')->nulleable();
            $table->datetime('fecha_zoom')->nulleable();
            $table->string('agenda')->nulleable();
            $table->integer('order')->nulleable();
            $table->string('type')->nulleable();
            $table->integer('id_cert_cap')->nulleable();
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
        Schema::dropIfExists('unidades');
    }
}
