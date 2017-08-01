<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('event_uuid', 50);
            $table->integer('event_type_id');
            $table->string('merchant_uuid', 50);

            $table->string('name');
            $table->string('city', 60);
            $table->string('street', 60);
            $table->string('building', 60);
            $table->string('coordinates')->nullable();
            $table->string('big_image')->nullable();
            $table->string('small_image')->nullable();
            $table->text('description');
            $table->string('video_url')->nullable();
            $table->timestamp('sales_close')->nullable();
            $table->timestamp('event_start')->nullable();
            $table->timestamp('event_end')->nullable();
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
        Schema::dropIfExists('events');
    }
}
