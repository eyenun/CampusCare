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
        Schema::create('laporans', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->foreignId('kategori_id')
                  ->constrained()
                  ->onDelete('cascade');

            $table->string('judul');

            $table->string('lokasi');

            $table->text('deskripsi');

            $table->string('foto')->nullable();

            $table->enum('status', [
                'pending',
                'diproses',
                'selesai',
                'ditolak'
            ])->default('pending');

            $table->enum('prioritas', [
                'rendah',
                'sedang',
                'tinggi'
            ])->default('sedang');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};