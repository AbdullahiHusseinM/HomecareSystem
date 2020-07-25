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
            $table->string('name_of_institution');
            $table->string('acquired_qualification');
            $table->date('qualification_start_date');
            $table->date('qualification_end_date');
            $table->string('copy_of_certificate');
            $table->string('name_of_organization');
            $table->string('organization_unit');
            $table->string('organization_job_title');
            $table->date('organization_start_date');
            $table->date('organization_end_date');
            $table->integer('radius_of_operation');

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
