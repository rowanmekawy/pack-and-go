<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registers', function (Blueprint $table) {
            $table->unsignedInteger('Trip_ID');
            $table->integer('Number_of_people');
            $table->integer('Approved');
            $table->string('User_Email', 50);
            $table->primary(['Trip_ID', 'User_Email']);
            $table->foreign('Trip_ID')->references('trip_id')->on('trips');
            $table->foreign('User_Email')->references('email')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registers');
    }
}
