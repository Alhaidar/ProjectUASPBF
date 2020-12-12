<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tim', function (Blueprint $table) {
            $table->foreign('id_user', 'tim_ibfk_1')->references('id')->on('user')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_lomba', 'tim_ibfk_2')->references('id')->on('lomba')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tim', function (Blueprint $table) {
            $table->dropForeign('tim_ibfk_1');
            $table->dropForeign('tim_ibfk_2');
        });
    }
}
