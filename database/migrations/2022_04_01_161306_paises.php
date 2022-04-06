<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Paises extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DIC_Pais', function (Blueprint $table) {
            $table->id();
            $table->integer('ISONUM');
            $table->text('ISO2')->nulleable();
            $table->text('ISO3')->nulleable();
            $table->text('CODIGO');
            $table->text('NOMBRE');
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
        //
    }
}
