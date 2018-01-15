<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableEvaluations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evaluations', function (Blueprint $table) {
            $table->increments('id');

            $table->string('activity');
            $table->unsignedInteger('first');
            $table->unsignedInteger('second');
            $table->unsignedInteger('third');
            $table->unsignedInteger('principal');
            $table->unsignedInteger('recovery');

            $table->unsignedInteger('id_syllable');


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
        Schema::dropIfExists('evaluations');
    }
}
