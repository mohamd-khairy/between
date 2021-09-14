<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food', function (Blueprint $table) {
            $table->id();
            $table->string('protein')->nullable();
            $table->string('carb')->nullable();
            $table->string('fats')->nullable();
            $table->string('price')->nullable();

            $table->unsignedBigInteger('main_type_id')->nullable();
            $table->enum('type', ['breakfast', 'dinner', 'launch', 'other'])->default('other');
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
        Schema::dropIfExists('food');
    }
}
