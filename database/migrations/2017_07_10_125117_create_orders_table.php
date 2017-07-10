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
            $table->increments('id');
            $table->string('order_uuid',50);
            $table->string('user_uuid',50);
            $table->string('transaction_uuid',50);
            
            $table->text('order_details');
            $table->decimal('order_total',12,2)->default(0.00);
            $table->boolean('is_valid')->default(false);
            $table->boolean('is_payable')->default(true);
            
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
