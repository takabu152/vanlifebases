<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('guestid');
            $table->integer('storeid');
            $table->datetime('checkinday');
            $table->datetime('checkoutday');
            $table->integer('paymentmoney');
            $table->integer('bookingstatus')->default(0);
            $table->integer('checkinstatus')->default(0);;
            $table->boolean('delete')->default(0);;
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
        Schema::dropIfExists('bookings');
    }
}
