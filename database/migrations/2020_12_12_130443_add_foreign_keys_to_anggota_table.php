<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('anggota', function (Blueprint $table) {
            $table->foreign('id_fakultas', 'anggota_ibfk_1')->references('id')->on('fakultas')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('id_tim', 'anggota_ibfk_2')->references('id')->on('tim')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('anggota', function (Blueprint $table) {
            $table->dropForeign('anggota_ibfk_1');
            $table->dropForeign('anggota_ibfk_2');
        });
    }
}
