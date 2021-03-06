<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWonBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('won_bids', function (Blueprint $table) {
            $table->id();
            $table->biginteger('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name');
            $table->string('brand');
            $table->string('image')->nullable();
            $table->decimal('price',8,2);
            $table->string('display');
            $table->string('processor');
            $table->string('ram');
            $table->string('storage');
            $table->string('battery');
            $table->string('front_camera');
            $table->string('rear_camera');
            $table->string('os');
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
        Schema::dropIfExists('won_bids');
    }
}
