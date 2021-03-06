<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('merchant_uuid',50);
           
            $table->string('name', 50);
            $table->text('description');
            $table->string('telephone', 20);
            $table->string('email', 50);
            $table->string('facebook');
            $table->string('twitter');
            $table->string('website');
            $table->boolean('is_active')->default(false);
           
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
        Schema::dropIfExists('merchants');
    }
}
