<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDietTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diet_translations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->foreignId('diet_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('diet_translations');
    }
}
