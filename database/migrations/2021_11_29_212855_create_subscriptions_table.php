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
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->longText('ingredient_ids')->nullable();
            $table->longText('protien_ids')->nullable();
            $table->longText('snack_ids')->nullable();
            $table->longText('carb_ids')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('target_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('diet_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('day_number_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('meal_number_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('prefered_time_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('dish_id')->nullable()->constrained()->cascadeOnDelete();
            $table->foreignId('address_id')->nullable()->constrained()->cascadeOnDelete();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->string('coupon_code')->nullable();
            $table->double('coupon_discount')->default(0);
            $table->double('delivery_fees')->default(0);
            $table->double('package_value')->nullable();
            $table->double('total')->nullable();
            $table->string('status')->default('pending');
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
