<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('keluars', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomor');
            $table->date('tanggal');
            $table->string('pengirim');
            $table->string('perihal');
            $table->string('kategori');
            $table->string('keterangan');
            $table->string('lampiran');
            $table->string('status')->nullable();
            $table->string('keterangan_status')->nullable();
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
        Schema::dropIfExists('keluars');
    }
}
