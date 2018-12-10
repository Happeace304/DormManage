<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('users', function (Blueprint $table) {
            $table->increments('userId');
            $table->string('name',30)->nullable();
            $table->string('email',30)->unique()->nullable();
            $table->integer('roomId')->nullable();
            $table->string('phone',20)->nullable();
            $table->boolean('gender')->default(1);
            $table->string('password');
            $table->string('address',50)->nullable();
            $table->tinyInteger('role')->default(1); // 0:client 1: emp
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
        //
    }
}
