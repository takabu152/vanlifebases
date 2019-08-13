<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('storeid');
            $table->string('storename');
            $table->string('forusermessage');
            $table->string('salespointmessage');
            $table->string('websiteurl');
            $table->string('postalcode');
            $table->string('storeaddress01');
            $table->string('storeaddress02');
            $table->string('storeaddress03');
            $table->string('weekdays_opentime');
            $table->string('weekdays_closetime');
            $table->string('saturday_opentime');
            $table->string('saturday_closetime');
            $table->string('sunday_opentime');
            $table->string('sunday_closetime');
            $table->string('businesstime_remarks');
            $table->string('contactname1');
            $table->string('contactname2');
            $table->string('emai1');
            $table->string('email2');
            $table->string('phoneno1');
            $table->string('phoneno2');
            $table->string('topimageurl');
            $table->string('subimageurl01');
            $table->string('subimageurl02');
            $table->string('subimageurl03');
            $table->string('subimageurl04');
            $table->string('subimageurl05');
            $table->integer('hostid');
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
        Schema::dropIfExists('stores');
    }
}
