<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('detail_permintaans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('permintaan_id')->constrained('permintaans')->onDelete('cascade');
            $table->string('nama_barang');
            $table->integer('kuantiti');
            $table->string('keterangan')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_permintaans');
    }
};
