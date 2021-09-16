<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('user_id')->nullable();
            $table->longText('image')->nullable();
            $table->longText('phone')->nullable();
            $table->longText('family_member')->nullable();
            $table->longText('bio')->nullable();
            $table->longText('country')->nullable();
            $table->longText('Address_1')->nullable();
            $table->longText('Address_2')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
