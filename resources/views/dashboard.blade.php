@extends('layouts.app')

@section('title', 'Dashboard')

@section('contents')
<div class="min-h-screen bg-cover bg-center relative" style="background-image: url('/images/pemkab lamongan.jpg');">
    <div class="absolute inset-0 bg-black opacity-50"></div>
    
    <div class="flex flex-col items-center justify-center space-y-6 py-10 relative z-10">
        <h1 class="font-bold text-3xl text-center text-white mb-4">Hallo Admin, Selamat Datang di Website Pemerintah Desa</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 w-full max-w-5xl px-4">
            <div class="bg-white p-6 rounded-lg shadow-xl text-center">
                <h3 class="text-xl font-semibold text-gray-700">Total Penduduk</h3>
                <p class="text-2xl font-bold text-blue-600">{{ $totalPenduduk }}</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-xl text-center">
                <h3 class="text-xl font-semibold text-gray-700">Surat Menunggu</h3>
                <p class="text-2xl font-bold text-yellow-500">{{ $suratMenunggu }}</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-xl text-center">
                <h3 class="text-xl font-semibold text-gray-700">Surat Selesai</h3>
                <p class="text-2xl font-bold text-orange-500">{{ $suratDiproses }}</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-xl text-center">
                <h3 class="text-xl font-semibold text-gray-700">Surat Ditolak</h3>
                <p class="text-2xl font-bold text-red-600">{{ $suratDitolak }}</p>
            </div>
        </div>
    </div>
</div>
@endsection
