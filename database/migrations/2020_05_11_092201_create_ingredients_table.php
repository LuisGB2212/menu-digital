<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ingredients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ingredient_name');
            $table->unsignedBigInteger('restaurant_id');
            $table->unsignedBigInteger('ingredient_unit_id');
            $table->timestamps();

            $table->foreign('restaurant_id')->references('id')->on('restaurants');
            $table->foreign('ingredient_unit_id')->references('id')->on('ingredient_units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ingredients');
    }
}
