<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_id');
            $table->enum('TipeKamar', ['Single', 'Double', 'Suite']);
            $table->string('NamaKamar');
            $table->longText('FasilitasKamar');
            $table->integer('HargaKamar');
            $table->integer('UnitKamar');
            $table->string('FotoKamar');
            $table->timestamps();

            $table->foreign('hotel_id')->references('id')->on('hotels');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};
