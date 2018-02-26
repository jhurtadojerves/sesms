<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeBibliographiesTableDropFields2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bibliographies', function (Blueprint $table) {
            $table->dropColumn('author');
            $table->dropColumn('title');
            $table->dropColumn('publication_place');
            $table->dropColumn('recovered');
            $table->dropColumn('isbn');
        });

        Schema::table('bibliographies', function (Blueprint $table) {
            $table->string('author')->default('Anónimo');
            $table->string('title')->nullable();
            $table->string('publication_place')->nullable();
            $table->string('recovered')->nullable();
            $table->string('isbn')->nullable();
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
