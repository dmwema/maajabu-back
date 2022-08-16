<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDatasToReservations2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {

            /* mastering
            $table->integer('seance_type')->nullable();
            $table->integer('songs_nb')->nullable();
            $table->dropColumn('date_reservation');
            $table->dropColumn('email');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            $table->date('start_date')->nullable();
            $table->string('enr_type')->nullable();
            $table->string('enr_type2')->nullable();
            $table->unsignedBigInteger('user_id')->nullable()->change();
            $table->dropForeign('reservations_user_id_foreign');

            // duplication
            $table->integer('duplication_nb')->nullable();
            $table->string('duplication_type')->nullable();

            // impression
            $table->string('copies')->nullable();
            $table->string('impression_proch')->nullable();
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservations', function (Blueprint $table) {
            //
        });
    }
}
