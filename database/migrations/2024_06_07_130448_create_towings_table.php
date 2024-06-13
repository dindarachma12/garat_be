<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('towings', function (Blueprint $table) {
            $table->id("id_towing");
            $table->string("nama_bengkel");
            $table->string("alamat");
            $table->string("no_hp");
            $table->string("pemilik");
            $table->text("deskripsi");
            $table->string("foto")->nullable();
            $table->bigInteger("id_jenis_layanan")->unsigned();
            $table->timestamps();
            //foreign key
            $table->foreign("id_jenis_layanan")->references("id_jenis_layanan")->on("jenis_layanans")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('towings');
    }
};
