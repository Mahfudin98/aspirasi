<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplaintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('nama');
            $table->enum('keterangan',['mahasiswa', 'dosen', 'umum']);
            $table->string('email');
            $table->string('file')->nullable();
            $table->text('masukan');
            $table->enum('jenis_privasi',['umum','anonim']);
            $table->enum('kategori',['masukan','keluhan']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complaints');
    }
}
