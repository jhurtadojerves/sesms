<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeFieldsEvaluationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('evaluations', function (Blueprint $table) {
            $table->unsignedInteger('first')->nullable()->change();
            $table->unsignedInteger('second')->nullable()->change();
            $table->unsignedInteger('third')->nullable()->change();
            $table->unsignedInteger('principal')->nullable()->change();
            $table->unsignedInteger('recovery')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('evaluations', function (Blueprint $table) {
            //
        });
    }
}
