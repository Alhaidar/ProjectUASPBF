<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJuriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juri', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_user')->nullable()->index('juri_ibfk_2');
            $table->integer('id_lomba')->nullable()->index('juri_ibfk_1');
            $table->timestamp('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable();
            $table->softDeletes();
        });
        $juri= \App\Juri::create([
          'id_user'    =>  3,
          'id_lomba'   =>  '8'
        ]);

        $juri= \App\Juri::create([
          'id_user'    =>  4,
          'id_lomba'   =>  '4'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('juri');
    }
}
