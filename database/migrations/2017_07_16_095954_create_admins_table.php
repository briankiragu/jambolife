<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');

            $table->string('user_uuid', 50)->unique();
            $table->string('merchant_uuid', 50)->nullable();

            $table->string('fname', 20);
            $table->string('lname', 20);
            $table->string('phone', 15)->unique();
            $table->string('email', 50)->unique();
            $table->string('identification', 20);
            $table->date('dob')->nullable();
            $table->string('password');
            $table->string('api_token')->unique();
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
        Schema::dropIfExists('admins');
    }
}
