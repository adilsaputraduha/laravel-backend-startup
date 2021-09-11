<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->integerIncrements('storeId');
            $table->string('storeName');
            $table->string('storeEmail');
            $table->string('storePhoneNumber');
            $table->string('storeStreet');
            $table->string('storeDistrict');
            $table->string('storeCity');
            $table->string('storeProvince');
            $table->string('storeZipCode');
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
        Schema::dropIfExists('stores');
    }
}
