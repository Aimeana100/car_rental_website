<?php

use App\Models\Admin\Category;
use App\Models\Admin\Feature;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('model');
            $table->string('transmission');
            $table->string('luggage');
            $table->integer('seats');
            $table->integer('per_hour');
            $table->integer('per_day');
            $table->integer('per_month');
            $table->text('description');
            $table->integer('category_id');
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('cars');
    }
}
