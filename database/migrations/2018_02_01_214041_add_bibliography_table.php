<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddBibliographyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bibliographies', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->mediumText('content');
            $table->enum('type', ['basic', 'complementary']);
            $table->unsignedInteger('syllable_id');

            $table->foreign('syllable_id')->references('id')->on('syllables')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bibliographies', function (Blueprint $table) {
            //
        });
    }
}
