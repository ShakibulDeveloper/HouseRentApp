<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('title')->nullable();
            $table->longText('price')->nullable();
            $table->longText('area')->nullable();
            $table->longText('rooms')->nullable();
            $table->longText('type')->nullable();
            $table->longText('kind')->nullable();
            $table->longText('location')->nullable();
            $table->longText('latitute')->nullable();
            $table->longText('longitute')->nullable();
            $table->longText('image')->nullable();
            $table->longText('discription')->nullable();
            $table->longText('user_id')->nullable();
            $table->longText('bedrooms')->nullable();
            $table->longText('bathrooms')->nullable();
            $table->longText('garages')->nullable();
            $table->longText('inspection_date')->nullable();
            $table->longText('inspection_time')->nullable();
            $table->longText('status')->nullable();
            $table->longText('sort_id')->nullable();
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
        Schema::dropIfExists('properties');
    }
}
