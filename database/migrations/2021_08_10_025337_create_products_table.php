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
            $table->integerIncrements('productId');
            $table->string('productName');
            $table->string('productDescription');
            $table->integer('productStore')->unsigned();
            $table->integer('productCategory')->unsigned();
            $table->integer('productPrice');
            $table->string('productImage');
            $table->integer('productStatus');
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
