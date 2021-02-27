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
            $table->string('user_type');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('unique_id')->unique();
            $table->string('regno')->nullable();
            $table->string('picture')->default('avatar.png');
            $table->string('sex');
            $table->string('dob')->nullable();
            $table->string('state_of_origin')->nullable();
            $table->string('class_id')->nullable();
            $table->string('login')->nullable();
            $table->string('blocked_status')->default('active');
            $table->string('priviledge')->nullable();
            $table->timestamp('email_verified_at')->nullable();
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
