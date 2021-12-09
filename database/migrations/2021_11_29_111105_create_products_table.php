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
            $table->text('image');
            $table->date('endDate');
            $table->date('date1');
            $table->date('date2');
            $table->date('date3');
            $table->string('cat_Id');
            $table->longText('contact');
            $table->integer('quantity');
            $table->float('price');
            $table->integer('r1');
            $table->integer('r2');
            $table->integer('r3');
            $table->integer('dis1');
            $table->integer('dis2');
            $table->integer('dis3');
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
