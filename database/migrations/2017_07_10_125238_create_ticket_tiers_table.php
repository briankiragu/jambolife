<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketTiersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_tiers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event_uuid',50);
            $table->integer('currency_id')->default(0);
            
            $table->string('name',50);
            $table->decimal('price',12,2)->default(0.00);
            $table->integer('ticket_limit')->nullable();
            $table->timestamp('close_date')->nullable();
            
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
        Schema::dropIfExists('ticket_tiers');
    }
}
