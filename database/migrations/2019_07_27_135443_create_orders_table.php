<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->nullable();
            $table->string('email', 99);
            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            $table->integer('total_price');
            $table->integer('shipping_cost');
            $table->integer('tax')->nullable();
            $table->string('contact_person');
            $table->string('contact_mobile');
            $table->text('address');
            $table->integer('zone')->nullable();
            $table->integer('status')->default(0);
            $table->string('feedback')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
