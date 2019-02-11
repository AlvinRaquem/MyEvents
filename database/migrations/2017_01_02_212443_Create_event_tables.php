<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
         schema::create('events', function(Blueprint $table) {
            $table->increments('id');
            $table->string('image')->default('1.jpg');
            $table->string('title');
            $table->date('date');
            $table->time('time');
            $table->integer('status')->default(0);
            $table->integer('category_id');
            $table->string('place');
            $table->integer('user_id');
            $table->string('body');
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
        schema::drop('events');
    }
}
