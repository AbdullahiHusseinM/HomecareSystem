<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransporterProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transporter_profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('transporter_id')->unsigned();

            $table->string('drivers_license');
            $table->string('identification_card');
            $table->bigInteger('phone_number');
            $table->string('mode_of_transport');
            $table->string('passport_photo');
            $table->date('date_of_birth');
            $table->string('model_mode_of_transport');
            $table->integer('years_of_experience');


            $table->foreign('transporter_id')->references('id')->on('transporters');
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
        Schema::dropIfExists('transporter_profiles');
    }
}
