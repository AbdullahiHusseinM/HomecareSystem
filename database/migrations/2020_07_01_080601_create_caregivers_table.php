<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaregiversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caregivers', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('surname');
            $table->string('gender');
            $table->integer('identification_number');
            $table->integer('phone_number');
            $table->string('job_title');
            $table->string('physical_location');
            $table->string('email');
            $table->string('verification_status')->default('false')->nullable();
            $table->string('passport_photo')->nullable();
            $table->string('license_number')->nullable();
            $table->string('license_certificate')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('education')->nullable();
            $table->string('experience')->nullable();
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
        Schema::dropIfExists('caregivers');
    }
}
