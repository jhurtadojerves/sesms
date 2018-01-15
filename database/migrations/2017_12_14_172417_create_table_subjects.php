<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSubjects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 32)->unique();
            $table->string('name');
            $table->unsignedInteger('hp');
            $table->unsignedInteger('ha');
            $table->unsignedInteger('ht');
            $table->unsignedInteger('credits');

            $table->string('prerequisites');
            $table->string('corequisites');
            $table->unsignedInteger('level');

            $table->unsignedInteger('id_mesh');

            $table->timestamps();

            /*FK*/
            $table->foreign('id_mesh')->references('id')->on('meshes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
