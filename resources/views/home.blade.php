@extends('layouts.user')

@section('title', 'Dashboard')

@section('contents')
<div class="container mx-auto p-0" style="background-image: url('{{ asset('/images/pemkab lamongan.jpg') }}'); background-size: cover; background-position: center center; background-attachment: fixed; height: 66vh; overflow: hidden;">
    <div class="flex flex-col items-center justify-center min-h-full space-y-4 overflow-hidden">
        <h1 class="text-xl md:text-2xl font-semibold text-white text-center mb-4 bg-black bg-opacity-60 px-6 py-3 rounded-lg shadow-lg">
            Hallo {{ auth()->user()->name }}, Selamat Datang di Dashboard Desa
        </h1>
        
        <div class="flex max-w-4xl mx-auto space-x-4 md:space-x-8 overflow-hidden">
            <div class="flex-1 bg-white p-4 md:p-6 rounded-lg shadow-xl overflow-hidden">
                <h2 class="text-xl md:text-2xl font-semibold text-center text-gray-800 mb-4">Cara Pengajuan Surat</h2>
                <ol class="list-decimal list-inside text-gray-600 space-y-2 text-sm md:text-base">
                    <li>Pilih menu <strong>Pengajuan Surat</strong> di menu samping untuk memulai pengajuan.</li>
                    <li>Isi form dengan data yang diperlukan.</li>
                    <li>Kirim permohonan dengan klik tombol <strong>Submit</strong> setelah form diisi.</li>
                    <li>Pilih <strong>Riwayat Pengajuan Surat</strong> untuk melihat status pengajuan Anda.</li>
                    <ul class="list-none mt-2 text-gray-600">
                        <li>Jika Surat Disetujui: Anda dapat mengunduh surat yang telah diproses dengan mengklik <strong>Lihat Surat</strong>.</li>
                        <li>Jika Surat Ditolak: Alasan penolakan akan ditampilkan di kolom <strong>Alasan Penolakan</strong>.</li>
                    </ul>
                </ol>
            </div>

            <div class="flex-1 bg-white p-4 md:p-6 rounded-lg shadow-xl overflow-hidden">
                <h3 class="text-xl md:text-2xl font-semibold text-center text-gray-800 mb-4">Jam Kerja</h3>
                <p class="text-sm md:text-base text-gray-700 mb-4">Pengajuan surat dapat dilakukan selama jam kerja berikut:</p>
                <ul class="list-none text-gray-600">
                    <li class="text-sm md:text-base"><strong>Senin - Jumat</strong>: 08:00 - 15:00</li>
                    <li class="text-sm md:text-base"><strong>Sabtu - Minggu</strong>: Libur</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<footer class="bg-gray-800 text-white py-6">
    <div class="container mx-auto text-center">
        <h2 class="text-xl md:text-2xl font-semibold mb-4 text-gray-100">Contact Us</h2>
        <p class="text-sm md:text-base mb-4">Jika Anda memiliki pertanyaan, silakan hubungi kami:</p>
        <p class="text-sm md:text-base">
            <a href="mailto:admin@desa.com" class="text-blue-400 hover:underline">admin@desa.com</a>
        </p>
        <p class="text-sm md:text-base mt-2">Telepon: <span class="font-semibold">0812-3456-7xxx</span></p>
        <p class="mt-4 text-xs md:text-sm text-gray-300">&copy; 2024 Pemerintah Desa. All rights reserved.</p>
    </div>
</footer>
@endsection
