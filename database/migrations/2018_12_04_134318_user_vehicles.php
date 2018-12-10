<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserVehicles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('userVehicle', function (Blueprint $table) {
//            $table->increments('vehicleId');
//            $table->integer('userId');
//            $table->string('indentifyNum');
//            $table->tinyInteger('type');    //0:bike, 1: moto
//            $table->date('expiredDate');
//            $table->timestamps();
//        });
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
