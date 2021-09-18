<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->increments('trip_id');
            $table->integer('Price');
            $table->integer('Number_of_Seats');
            $table->integer('Available_Seats');
            $table->string('Location_To', 50);
            $table->string('Location_from', 50);
            $table->string('Admin_Email', 50);
            $table->string('Description');
            $table->dateTime('Check_In');
            $table->dateTime('Check_Out');
            $table->timestamps();
            $table->foreign('Admin_Email')->references('email')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trips');
    }
}
