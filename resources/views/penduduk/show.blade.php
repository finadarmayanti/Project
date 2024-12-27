@extends('layouts.app')
 
@section('title', 'Show Penduduk')
 
@section('contents')
<h1 class="font-bold text-2xl ml-3">Detail Penduduk</h1>
<hr />
<div class="border-b border-gray-900/10 pb-12">
    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">NIK</label>
            <div class="mt-2">
                {{ $penduduk->nik }}
            </div>
        </div>

        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">No KK</label>
            <div class="mt-2">
                {{ $penduduk->no_kk }}
            </div>
        </div>

        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Nama Lengkap</label>
            <div class="mt-2">
                {{ $penduduk->nama_lengkap }}
            </div>
        </div>

        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Alamat</label>
            <div class="mt-2">
                {{ $penduduk->alamat }}
            </div>
        </div>

        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Tanggal Lahir</label>
            <div class="mt-2">
                {{ $penduduk->tanggal_lahir }}
            </div>
        </div>

        <div class="sm:col-span-4">
            <label class="block text-sm font-medium leading-6 text-gray-900">Jenis Kelamin</label>
            <div class="mt-2">
                {{ $penduduk->jenis_kelamin == 'Laki-Laki' ? 'Laki-Laki' : 'Perempuan' }}
            </div>
        </div>
    </div>    
</div>
@endsection
