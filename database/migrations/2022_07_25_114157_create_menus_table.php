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
            $table->unsignedBigInteger('id_restaurateur')->nullable();
            $table->timestamps();
            $table->foreign('id_restaurateur')->references('id')->on('restaurateurs');
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
