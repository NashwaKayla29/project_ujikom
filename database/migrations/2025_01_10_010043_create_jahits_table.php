<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jahits', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->unsignedBigInteger('potong_id');
            $table->unsignedBigInteger('pegawai_id');
            $table->string('lolos');
            $table->string('cacat');
            $table->timestamps();
            $table->foreign('pegawai_id')->references('id')->on('data_pegawais')->onDelete('cascade');
            $table->foreign('potong_id')->references('id')->on('potongs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jahits');
    }
};
