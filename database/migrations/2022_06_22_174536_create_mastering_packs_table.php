<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasteringPacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mastering_packs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('hdwav');
            $table->string('hdwav_price');
            $table->string('wav');
            $table->string('wav_price');
            $table->string('mp3');
            $table->string('mp3_price');
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
        Schema::dropIfExists('mastering_packs');
    }
}
