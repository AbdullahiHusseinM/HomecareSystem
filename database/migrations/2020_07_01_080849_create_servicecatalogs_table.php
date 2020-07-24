<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicecatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('servicecatalogs', function (Blueprint $table) {
            $table->id();
            $table->string('service_name');
            $table->text('service_description');
            $table->string('specific_service_name');
            $table->text('specific_service_description');
            $table->string('pharmaceutical_product_name');
            $table->text('pharmaceutical_product_use');
            $table->string('pharmaceutical_product_priority');
            $table->string('equipment_name');
            $table->text('equipment_use');
            $table->string('equipment_priority');
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
        Schema::dropIfExists('servicecatalogs');
    }
}
