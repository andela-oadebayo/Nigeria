<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->string('state');
            $table->string('capital');
            $table->string('population');
            $table->string('area');
            $table->string('nickname');
            $table->string('date_created');
            $table->string('preceding_entity');
            $table->string('lg_count');
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
        Schema::create('states', function (Blueprint $table) {
            //
            $table->drop('states');
        });
    }
}
