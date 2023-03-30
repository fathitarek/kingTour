<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirwayAgeGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airway_age_groups', function (Blueprint $table) {
            $table->id();
            $table->string('name_en');
            $table->string('name_hu');
            $table->string('name_sk');
            $table->string('name_de');
            $table->integer('min');
            $table->integer('max');
            $table->double('price');
            $table->unsignedBigInteger('airway_id');
            $table->foreign('airway_id')->references('id')->on('currencies');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airway_age_groups');
    }
}
