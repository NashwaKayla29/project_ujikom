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
        Schema::create('qcs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('qc_id');
            $table->unsignedBigInteger('jahit_id');
            $table->string('lolos_Qc');
            $table->string('cacat_jual');
            $table->string('cacat_permanen');
            $table->timestamps();
            $table->foreign('qc_id')->references('id')->on('data__qcs')->onDelete('cascade'); 
            $table->foreign('jahit_id')->references('id')->on('jahits')->onDelete('cascade');
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qcs');
    }
};
