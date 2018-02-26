<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeBibliographiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bibliographies', function (Blueprint $table) {
            $table->string('author');
            $table->year('year');
            $table->string('title');
            $table->enum('format', ['apa', 'iso']);
            $table->string('publication_place');
            $table->string('recovered');
            $table->string('isbn');
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
