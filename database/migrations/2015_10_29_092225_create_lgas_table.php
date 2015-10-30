<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLgasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lgas', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->integer('state_id')->unsigned();
            $table->string('lg_name');
            $table->timestamps();

            $table->foreign('state_id')->references('id')->on('states');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('lgas', function (Blueprint $table) {
            //
            $table->drop('lgas');
        });
    }
}
