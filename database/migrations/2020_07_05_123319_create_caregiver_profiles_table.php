<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaregiverProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caregiver_profiles', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('caregiver_id')->unsigned();

            $table->string('passport_photo');
            $table->string('license_number');
            $table->string('license_certificate');
            $table->date('date_of_birth');
            $table->string('education');
            $table->string('experience');

            $table-> foreign('caregiver_id')->references('id')->on('caregivers');
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
        Schema::dropIfExists('caregiver_profiles');
    }
}
