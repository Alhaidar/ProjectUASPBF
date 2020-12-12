<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToPengumpulanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pengumpulan', function (Blueprint $table) {
            $table->foreign('id_tim', 'pengumpulan_ibfk_1')->references('id')->on('tim')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pengumpulan', function (Blueprint $table) {
            $table->dropForeign('pengumpulan_ibfk_1');
        });
    }
}
