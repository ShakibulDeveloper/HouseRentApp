<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('user_id')->nullable();
            $table->longText('property_id')->nullable();
            $table->longText('name')->nullable();
            $table->longText('family_member')->nullable();
            $table->longText('card_number')->nullable();
            $table->longText('expiration')->nullable();
            $table->longText('security_code')->nullable();
            $table->longText('from')->nullable();
            $table->longText('to')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
