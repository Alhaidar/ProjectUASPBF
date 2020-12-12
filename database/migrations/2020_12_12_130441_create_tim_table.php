<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tim', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_user')->nullable()->index('tim_ibfk_1');
            $table->string('no_telp', 16);
            $table->string('judul_proposal')->nullable();
            $table->text('abstrak')->nullable();
            $table->integer('id_lomba')->nullable()->index('tim_ibfk_2');
            $table->string('dosen_pembimbing')->nullable();
            $table->string('nomor_induk_dosen')->nullable();
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
        Schema::dropIfExists('tim');
    }
}
