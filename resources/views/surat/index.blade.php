@extends('layouts.user')

@section('title', 'Daftar Surat yang Diajukan')

@section('contents')
<div class="p-6 bg-gray-100 rounded-lg shadow-lg">

    <h2 class="text-3xl font-bold mb-6">Daftar Surat yang Diajukan</h2>
    @if(session('success'))
    <div class="bg-green-100 text-green-800 p-4 rounded-md mb-6">
        {{ session('success') }}
    </div>
    @endif
    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-200 text-gray-800">
                <tr>
                    <th class="px-4 py-3 text-left">No</th>
                    <th class="px-4 py-3 text-left">Nama Lengkap</th>
                    <th class="px-4 py-3 text-left">NIK</th>
                    <th class="px-4 py-3 text-left">Alamat</th>
                    <th class="px-4 py-3 text-left">Nomor Telepon</th>
                    <th class="px-4 py-3 text-left">Jenis Surat</th>
                    <th class="px-4 py-3 text-left">Keperluan</th>
                    <th class="px-4 py-3 text-left">Status</th>
                    <th class="px-4 py-3 text-left">Dokumen Tambahan</th>
                    <th class="px-4 py-3 text-left">Surat</th>
                    <th class="px-4 py-3 text-left">Alasan Penolakan</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @foreach($surats as $index => $surat)
                    <tr class="hover:bg-gray-100 border-b">
                        <td class="px-4 py-3">{{ $index + 1 }}</td>
                        <td class="px-4 py-3">{{ $surat->nama }}</td>
                        <td class="px-4 py-3">{{ $surat->nik }}</td>
                        <td class="px-4 py-3">{{ $surat->alamat }}</td>
                        <td class="px-4 py-3">{{ $surat->telepon }}</td>
                        <td class="px-4 py-3">{{ $surat->jenis_surat }}</td>
                        <td class="px-4 py-3">{{ $surat->keperluan }}</td>
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                {{ $surat->status === 'ditolak' ? 'bg-red-100 text-red-700' : 
                                ($surat->status === 'selesai' ? 'bg-green-100 text-green-700' : 
                                'bg-yellow-100 text-yellow-700') }}">
                                {{ ucfirst($surat->status) }}
                            </span>
                        </td>
                        <td class="px-4 py-3">
                            <a href="{{ asset('storage/' . $surat->dokumen_path) }}" class="text-blue-500 hover:underline" target="_blank">Lihat Dokumen</a>
                        </td>
                        <td class="px-4 py-3">
                            @if($surat->status === 'selesai')
                                @if($surat->file_admin_path)
                                    <a href="{{ url('storage/' . $surat->file_admin_path) }}" target="_blank" class="text-blue-600 underline">Lihat Surat</a>
                                @else
                                    <div class="mb-4">
                                        <p class="text-sm text-gray-600 italic">Belum ada surat yang diunggah.</p>
                                    </div>
                                @endif
                            @else
                                <span class="text-gray-500 italic">-</span>
                            @endif
                        </td>
                        <td class="px-4 py-3">
                            @if($surat->status === 'ditolak')
                                {{ $surat->alasan_penolakan }}
                            @else
                                <span class="text-gray-500 italic">-</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>     
        </table>
    </div>
</div>
@endsection
