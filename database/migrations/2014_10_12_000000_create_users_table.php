<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('card', 16)->unique()->default(null);
            $table->string('name');
            $table->string('email', 128)->unique();
            $table->enum('gender', ['Male', 'Female', 'Other'])->default('other');
            $table->enum('type', ['teacher', 'coordinator', 'admin',])->default('teacher');
            $table->string('phone');
            $table->string('cell_phone');
            $table->string('password');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
