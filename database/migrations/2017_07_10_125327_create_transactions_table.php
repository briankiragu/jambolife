<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');

            $table->string('JP_TRANSID')->unique();
            $table->string('JP_CUSTOMER_NAME')->nullable();
            $table->string('JP_MERCHANT_ORDERID');
            $table->string('JP_ITEM_NAME');
            $table->string('JP_AMOUNT');
            $table->string('JP_CURRENCY');
            $table->timestamp('JP_TIMESTAMP');
            $table->string('JP_PASSWORD');
            $table->string('JP_CHANNEL');
            $table->boolean('IS_VALID')->default(false);
            
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
