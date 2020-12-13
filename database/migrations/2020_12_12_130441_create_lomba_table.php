<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLombaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lomba', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nama')->nullable();
            $table->dateTime('batas_waktu')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable();
            $table->softDeletes();
        });
        $bidang = [
          "PKM-P",
          "PKM-M",
          "PKM-K",
          "PKM-T",
          "PKM-KC",
          "PKM-AI",
          "PKM-GT",
          "PKM-GFK"
        ];
        foreach ($bidang as $pkm) {
          $seed= \App\Lomba::create([
            'nama' => $pkm,
            'batas_waktu' => '2021-1-13 00:00:00'
          ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lomba');
    }
}
