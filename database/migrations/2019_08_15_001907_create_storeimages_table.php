<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoreimagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storeimages', function (Blueprint $table) {
            $table->increments('storeimageid');
            $table->integer('storeid');
            $table->integer('imagedivision');
            $table->string('imageurl');
            $table->boolean('delete');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('storeimages');
    }
}
