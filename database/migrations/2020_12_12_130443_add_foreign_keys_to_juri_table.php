<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToJuriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('juri', function (Blueprint $table) {
            $table->foreign('id_lomba', 'juri_ibfk_1')->references('id')->on('lomba')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_user', 'juri_ibfk_2')->references('id')->on('user')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('juri', function (Blueprint $table) {
            $table->dropForeign('juri_ibfk_1');
            $table->dropForeign('juri_ibfk_2');
        });
    }
}
