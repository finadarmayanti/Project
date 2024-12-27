@extends('layouts.app')

@section('title', 'Detail Surat')

@section('contents')
<div class="p-6 bg-white rounded shadow-md">
    <h1 class="text-2xl font-bold mb-6 border-b pb-2">Detail Surat</h1>

    @if(session('success'))
    <div class="p-4 rounded-md mb-6 
        @if(session('status') == 'selesai') bg-green-100 text-green-800 @else bg-red-100 text-red-800 @endif">
        {{ session('success') }}
    </div>
    @endif

    <div class="mb-4">
        <h2 class="text-lg font-semibold">Informasi Pengajuan</h2>
        <table class="w-full border-collapse border border-gray-300 mt-2">
            <tr class="bg-gray-100">
                <th class="px-4 py-2 text-left">Nama</th>
                <td class="px-4 py-2">{{ $surat->nama }}</td>
            </tr>
            <tr>
                <th class="px-4 py-2 text-left">NIK</th>
                <td class="px-4 py-2">{{ $surat->nik }}</td>
            </tr>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 text-left">Alamat</th>
                <td class="px-4 py-2">{{ $surat->alamat }}</td>
            </tr>
            <tr>
                <th class="px-4 py-2 text-left">Nomor Telepon</th>
                <td class="px-4 py-2">{{ $surat->telepon }}</td>
            </tr>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 text-left">Jenis Surat</th>
                <td class="px-4 py-2">{{ $surat->jenis_surat }}</td>
            </tr>
            <tr>
                <th class="px-4 py-2 text-left">Keperluan</th>
                <td class="px-4 py-2">{{ $surat->keperluan }}</td>
            </tr>
            <tr class="bg-gray-100">
                <th class="px-4 py-2 text-left">Dokumen Tambahan</th>
                <td class="px-4 py-2">
                    <a href="{{ asset('storage/' . $surat->dokumen_path) }}" class="text-blue-600" target="_blank">Lihat Dokumen</a>
                </td>
            </tr>            
        </table>
    </div>

    <div class="mb-6">
        <h2 class="text-lg font-semibold mb-4">Tindakan Admin</h2>
        <form action="{{ route('admin.surat.process', $surat->id) }}" method="POST" enctype="multipart/form-data" class="bg-gray-100 p-4 rounded shadow-md mb-4">
            @csrf
            <div class="mb-4">
                <label for="file_surat" class="block font-medium text-gray-700 mb-2">Unggah Surat:</label>
                <input type="file" name="file_surat" id="file_surat" required class="block w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-blue-500 focus:border-blue-500">
            </div>
    
            @if($surat->file_admin_path)
                <a href="{{ url('storage/' . $surat->file_admin_path) }}" target="_blank" class="text-blue-600 underline">Lihat Surat</a>
            @else
                <div class="mb-4">
                    <p class="text-sm text-gray-600 italic">Belum ada surat yang diunggah.</p>
                </div>
            @endif
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 transition">
                Selesai
            </button>
        </form>

        <div class="my-6 border-t border-gray-300 pt-6">
            <h3 class="text-lg font-semibold mb-4">Form Penolakan</h3>
            <form action="{{ route('admin.surat.reject', $surat->id) }}" method="POST" class="bg-gray-100 p-4 rounded shadow-md">
                @csrf
                <label for="alasan_penolakan" class="block font-medium text-gray-700 mb-2">Alasan Penolakan:</label>
                <textarea name="alasan_penolakan" id="alasan_penolakan" class="mt-2 w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" required></textarea>
                
                @if($surat->status === 'ditolak')
                    <div class="mt-2 text-sm text-gray-600">
                        <strong>Alasan Penolakan:</strong> {{ $surat->alasan_penolakan }}
                    </div>
                @else
                    <div class="mt-2 text-sm text-gray-500 italic">
                        Belum ada alasan penolakan.
                    </div>
                @endif
                
                <button type="submit" class="mt-4 bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                    Tolak Surat
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
