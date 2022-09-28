<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('names');
            $table->string('email');
            $table->string('telphone');
            $table->integer('car_id');
            $table->date('orderDate');
            $table->string('pickup_place');
            $table->string('pickoff_place');
            $table->date('pickup_date');
            $table->date('pickoff_date');
            $table->time('pickup_time');
            $table->time('pickoff_time');
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
