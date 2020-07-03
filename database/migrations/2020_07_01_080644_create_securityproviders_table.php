<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecurityprovidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('securityproviders', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('registration_number');
            $table->string('location');
            $table->string('contact_first_name');
            $table->string('contact_last_name');
            $table->bigInteger('contact_phone_number');
            $table->string('email');
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
        Schema::dropIfExists('securityproviders');
    }
}
