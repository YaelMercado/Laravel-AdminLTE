<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemestre extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semestre', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nulleable();
            $table->text('descripcion')->nulleable();
            $table->integer('id_carrers')->nulleable();
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
        Schema::dropIfExists('semestre');
    }
}
