<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('polisis', function (Blueprint $table) {
            $table->bigIncrements('id_laporan');
            $table->string('pelapor');
            $table->string('no_hp');
            $table->string('alamat');
            $table->text('keterangan');
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_jenis_layanan')->unsigned();
            $table->timestamps();

            // Foreign keys
            $table->foreign('id_jenis_layanan')->references('id_jenis_layanan')->on('jenis_layanans')->onDelete('cascade');
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('polisis');
    }
};
