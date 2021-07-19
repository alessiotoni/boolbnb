<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccomodationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accomodations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->mediumText('description');
            $table->tinyInteger('number_rooms');
            $table->tinyInteger('number_bathrooms');
            $table->tinyInteger('number_beds');
            $table->smallInteger('square_mts')->nullable();
            $table->smallInteger('price_per_night');
            $table->boolean('visibility')->default(false);
            $table->string('country');
            $table->string('city');
            $table->string('street_name');
            $table->smallInteger('buildingNumber');
            $table->decimal('lat');
            $table->decimal('long');      
            $table->string('placeholder');            
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
        Schema::dropIfExists('accomodations');
    }
}