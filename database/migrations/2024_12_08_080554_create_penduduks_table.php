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
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->string('nik', 16)->unique(); // Nomor Induk Kependudukan (unik, 16 digit)
            $table->string('no_kk', 16); // Nomor Kartu Keluarga (16 digit)
            $table->string('nama_lengkap', 100); // Nama lengkap penduduk
            $table->text('alamat'); // Alamat lengkap
            $table->date('tanggal_lahir'); // Tanggal lahir
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']); // Jenis kelamin: Laki-laki (L), Perempuan (P)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduks');
    }
};
