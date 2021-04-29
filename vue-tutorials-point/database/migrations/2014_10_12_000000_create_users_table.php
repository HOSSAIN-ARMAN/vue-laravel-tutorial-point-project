<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedBigInteger('step_one_id')->nullable();
            $table->unsignedBigInteger('step_two_id')->nullable();
            $table->unsignedBigInteger('step_three_id')->nullable();
            $table->rememberToken();
            $table->timestamps();

//            $table->foreign('step_one_id')->references('id')->on('step_ones')->onDelete('cascade');
//            $table->foreign('step_two_id')->references('id')->on('step_twos')->onDelete('cascade');
//            $table->foreign('step_three_id')->references('id')->on('step_threes')->onDelete('cascade');

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
