<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_tim')->nullable()->index('anggota_ibfk_2');
            $table->integer('id_fakultas')->nullable()->index('anggota_ibfk_1');
            $table->string('nama', 128)->nullable();
            $table->string('nim', 12)->nullable();
            $table->string('no_telp', 16)->nullable();
            $table->string('email', 64)->nullable();
            // $table->string('alamat')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anggota');
    }
}
