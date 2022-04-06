<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstructores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Instructores', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nulleable();
            $table->string('semblaza')->nulleable();
            $table->string('user_id')->nulleable();
            $table->string('imagen')->nulleable();
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
        Schema::dropIfExists('Instructores');
    }
}
