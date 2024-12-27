@extends('layouts.app')

@section('title', 'Daftar Surat Menunggu')

@section('contents')
<div class="p-6 bg-white rounded shadow-md">
    <h1 class="text-2xl font-bold mb-6 border-b pb-2">Daftar Pengajuan Surat</h1>
    
    <table class="table-auto w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="px-6 py-3 border text-left">No</th>
                <th class="px-6 py-3 border text-left">Nama</th>
                <th class="px-6 py-3 border text-left">Jenis Surat</th>
                <th class="px-6 py-3 border text-center">Status</th>
                <th class="px-6 py-3 border text-center">Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach($surats->reverse() as $surat)
            <tr class="hover:bg-gray-50">
                <td class="px-6 py-4 border text-center">{{ $loop->iteration }}</td>
                <td class="px-6 py-4 border">{{ $surat->nama }}</td>
                <td class="px-6 py-4 border">{{ $surat->jenis_surat }}</td>
                <td class="px-6 py-4 border text-center">
                    <span class="px-2 py-1 text-xs font-semibold rounded-full 
                        {{ $surat->status === 'ditolak' ? 'bg-red-100 text-red-700' : 
                        ($surat->status === 'selesai' ? 'bg-green-100 text-green-700' : 
                        'bg-yellow-100 text-yellow-700') }}">
                        {{ ucfirst($surat->status) }}
                    </span>
                </td>
                <td class="px-6 py-4 border text-center">
                    <a href="{{ route('admin.surat.show', $surat->id) }}" class="text-blue-500 hover:text-blue-700 font-medium">Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
