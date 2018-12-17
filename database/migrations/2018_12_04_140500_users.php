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
            $table->date('birthday');
            $table->string('email',30)->unique()->nullable();
            $table->integer('roomId')->nullable();
            $table->string('phone',20)->nullable();
            $table->boolean('gender')->default(1);
            $table->string('password');
            $table->string('imgLink')->nullable();
            $table->string('address',50)->nullable();
            $table->tinyInteger('role')->default(2); // 0:admin 1: emp 2:client
            $table->tinyInteger('state')->default(1);
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
