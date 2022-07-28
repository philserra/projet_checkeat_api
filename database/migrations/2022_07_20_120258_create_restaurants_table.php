<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('adress');
            $table->integer('zip');
            $table->string('city');
            $table->string('tel');
            $table->string('email');
            $table->string('timetable');
            $table->integer('capacity');
            $table->unsignedBigInteger('id_restaurateur')->nullable();
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('id_restaurateur')->references('id')->on('restaurateurs')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurants');
    }
};
