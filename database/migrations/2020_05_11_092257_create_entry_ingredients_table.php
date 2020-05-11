<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntryIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entry_ingredients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('quantity');
            $table->double('balance');
            $table->unsignedBigInteger('branch_office_ingredient_id');
            $table->timestamps();

            $table->foreign('branch_office_ingredient_id')->references('id')->on('branch_office_ingredients');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entry_ingredients');
    }
}
