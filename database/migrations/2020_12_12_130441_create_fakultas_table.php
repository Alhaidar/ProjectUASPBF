<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFakultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fakultas', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nama')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable();
            $table->softDeletes();
        });
        $departements = [
          "Fakultas Hukum",
          "Fakultas Ilmu Sosial Dan Ilmu Politik",
          "Fakultas Pertanian",
          "Fakultas Ekonomi Dan Bisnis",
          "Fakultas Keguruan Dan Ilmu Pendidikan",
          "Fakultas Ilmu Budaya",
          "Fakultas Teknologi Pertanian",
          "Fakultas Kedokteran Gigi",
          "Fakultas Ilmu Matematika Dan Pengetahuan Alam",
          "Fakultas Kedokteran",
          "Fakultas Kesehatan Masyarakat",
          "Fakultas Teknik",
          "Fakultas Farmasi",
          "Fakultas Keperawatan",
          "Fakultas Ilmu Komputer"
        ];
        foreach ($departements as $fakultas) {
          $seed= \App\Fakultas::create([
            'nama'            => $fakultas
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
        Schema::dropIfExists('fakultas');
    }
}
