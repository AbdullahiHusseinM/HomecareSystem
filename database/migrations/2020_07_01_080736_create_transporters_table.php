<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransportersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transporters', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('surname');
            $table->integer('identification_number');
            $table->string('location');
            $table->string('email');
            $table->string('password');
            $table->string('radius_of_operation')->nullable();
            $table->string('drivers_license')->nullable();
            $table->string('identification_card')->nullable();
            $table->bigInteger('phone_number')->nullable();
            $table->string('mode_of_transport')->nullable();
            $table->string('passport_photo')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('model_mode_of_transport')->nullable();
            $table->integer('years_of_experience')->nullable();
          

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
        Schema::dropIfExists('transporters');
    }
}
