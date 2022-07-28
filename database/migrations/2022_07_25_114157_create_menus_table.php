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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->string('priceHt');
            $table->string('tva');
            $table->string('priceTtc');
            $table->unsignedBigInteger('id_restaurant')->nullable();
            $table->timestamps();
            $table->rememberToken();
            $table->foreign('id_restaurant')->references('id')->on('restaurants')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
};
