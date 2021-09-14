<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoodTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('food_translations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('details')->nullable();
            $table->foreignId('food_id')->constrained()->cascadeOnDelete();
            $table->string('locale')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('food_translations');
    }
}
