<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->longText('image_link');
            $table->date('expiration_date');
            $table->text('contact_info');
            $table->integer('quantity');
            $table->integer('initial_price');
            $table->date('first_evaluation_date');
            $table->float('first_discount_ratio');
            $table->date('second_evaluation_date');
            $table->float('second_discount_ratio');
            $table->float('third_discount_ratio');
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
        Schema::dropIfExists('products');
    }
}