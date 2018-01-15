<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableUps extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_period_subject', function (Blueprint $table) {
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_period')->references('id')->on('periods')->onDelete('cascade');
            $table->foreign('id_subject')->references('id')->on('subjects')->onDelete('cascade');
        });
        Schema::table('syllables', function (Blueprint $table) {
            $table->foreign('id_ups')->references('id')->on('user_period_subject')->onDelete('cascade');
        });

        Schema::table('units', function (Blueprint $table) {
            $table->foreign('id_syllable')->references('id')->on('syllables')->onDelete('cascade');
        });

        Schema::table('topics', function (Blueprint $table) {
            $table->foreign('id_unit')->references('id')->on('units')->onDelete('cascade');
        });

        Schema::table('evaluations', function (Blueprint $table) {
            $table->foreign('id_syllable')->references('id')->on('syllables')->onDelete('cascade');
        });

        Schema::table('scenarios', function (Blueprint $table) {
            $table->foreign('id_syllable')->references('id')->on('syllables')->onDelete('cascade');
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
