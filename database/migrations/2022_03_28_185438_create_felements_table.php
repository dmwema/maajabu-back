<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFelementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('felements', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('level');
            $table->string('fx');
            $table->text('comment');
            $table->foreignId('file_id')->constrained()->onDelete('cascade');
            $table->foreignId('ftitle_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('felements');
    }
}
