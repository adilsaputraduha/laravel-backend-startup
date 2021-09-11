<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('transactionId');
            $table->integer('transactionUserId')->unsigned();
            $table->string('transactionPaymentCode');
            $table->string('transactionCode');
            $table->integer('transactionTotalItem')->unsigned();
            $table->bigInteger('transactionTotalPrice')->unsigned();
            $table->integer('transactionUniqueCode')->unsigned();
            $table->string('transactionStatus')->nullable();
            $table->string('transactionReceipt')->nullable();
            $table->string('transactionCourier')->nullable();
            $table->integer('transactionCostShipping');
            $table->bigInteger('transactionTotalTransfer');
            $table->string('transactionBank')->nullable();
            $table->string('transactionName')->nullable();
            $table->string('transactionPhone')->nullable();
            $table->string('transactionLocationDetail')->nullable();
            $table->string('transactionDescription')->nullable();
            $table->string('transactionMethod')->nullable();
            $table->timestamp('transactionExpiredAt')->nullable();
            $table->timestamp('transactionCreatedAt')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
