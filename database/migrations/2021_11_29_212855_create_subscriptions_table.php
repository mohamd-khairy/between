<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->longText('ingredient_ids')->nullable();
            $table->longText('protien_ids')->nullable();
            $table->longText('snack_ids')->nullable();
            $table->longText('carb_ids')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('target_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('meal_number_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('prefered_time_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('dish_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('food_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('address_id')->nullable()->constrained()->cascadeOnDelete();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
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
        Schema::dropIfExists('subscriptions');
    }
}
