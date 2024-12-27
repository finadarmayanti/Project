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
        Schema::create('surats', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik', 16);
            $table->text('alamat');
            $table->string('telepon');
            $table->string('jenis_surat');
            $table->text('keperluan');
            $table->string('dokumen_path')->nullable(); // Dokumen hanya jika surat diproses
            $table->text('alasan_penolakan')->nullable(); // Untuk alasan jika ditolak
            $table->unsignedBigInteger('user_id');
            $table->string('status')->default('menunggu'); // Default status: 'menunggu'
            $table->string('file_admin_path')->nullable();
            $table->timestamps();
    
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surats');
    }
};
