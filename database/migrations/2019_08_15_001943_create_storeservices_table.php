<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreservicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storeservices', function (Blueprint $table) {
            $table->increments('storeserviceid');
            $table->integer('storeid');
            $table->integer('serviceid');
            $table->boolean('paidserviceflg');
            $table->string('unitpricename');
            $table->integer('unitprice');
            $table->boolean('delete');
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
        Schema::dropIfExists('storeservices');
    }
}
