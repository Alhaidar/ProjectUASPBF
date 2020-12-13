<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('nama', 128)->nullable();
            $table->string('email', 64)->nullable();
            $table->string('password', 64)->nullable();
            $table->char('role', 10)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable();
            $table->softDeletes();
        });
          $seed= \App\User::create([
            'nama'    =>  "Haidar",
            'email'   =>  "haidarcorp22@gmail.com",
            'password'=>  Hash::make("admin"),
            'role'    =>  "admin",
          ]);
          $seed= \App\User::create([
            'nama'    =>  "Safrudin Buddy",
            'email'   =>  "admin@taskforce.id",
            'password'=>  Hash::make("admin"),
            'role'    =>  "admin",
          ]);

          $user= \App\User::create([
            'nama'    =>  "Hartawan Bahari Mulyadi",
            'email'   =>  "hartawanbahari@gmail.com",
            'password'=>  Hash::make("juri"),
            'role'    =>  "juri"
          ]);
          $user= \App\User::create([
            'nama'    =>  "Muhammad Amri Zaman",
            'email'   =>  "amrizaman3@gmail.com",
            'password'=>  Hash::make("juri"),
            'role'    =>  "juri"
          ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}
