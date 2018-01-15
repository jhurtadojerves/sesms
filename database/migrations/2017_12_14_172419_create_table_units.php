<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUnits extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('units', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->text('objetive');
            $table->text('achievement');
            $table->text('methodological_strategy');
            $table->text('resources');
            $table->text('classroom_activities');
            $table->text('autonomous_activities');

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
        Schema::dropIfExists('units');
    }
}
