<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsCompanys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companys', function($table) {
            $table->string('address');
            $table->string('phone');
            $table->string('url_site');
            $table->string('id_fiscal');
            $table->string('name_contact');
            $table->string('puesto');
            $table->integer('email');
            $table->string('phone_contact');
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
