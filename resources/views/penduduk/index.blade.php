@extends('layouts.app')

@section('title', 'Home Penduduk')

@section('contents')
<div class="p-6 bg-white rounded shadow-md">
    <h1 class="font-bold text-2xl mb-4">Data Penduduk</h1>
    
    @if(session('success'))
    <div class="p-3 rounded-md mb-4 text-white"
         style="background-color: {{ session('success_type') == 'upload' ? '#38a169' : (session('success_type') == 'update' ? '#d69e2e' : '#e53e3e') }}">
        {{ session('success') }}
    </div>
    @endif

    <div class="flex justify-between mb-6">
        <input id="searchInput" type="text" placeholder="Cari Penduduk..." class="border border-gray-300 rounded-lg p-2 w-64">
        <a href="{{ route('admin.penduduk.create') }}" class="bg-blue-700 text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 rounded-lg text-sm px-5 py-2.5">Tambah Penduduk</a>
    </div>

    <div class="overflow-y-auto" style="max-height: 630px;">
        <table id="dataTable" class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th class="px-6 py-3">No</th>
                    <th class="px-6 py-3">NIK</th>
                    <th class="px-6 py-3">No KK</th>
                    <th class="px-6 py-3">Nama Lengkap</th>
                    <th class="px-6 py-3">Alamat</th>
                    <th class="px-6 py-3">Tanggal Lahir</th>
                    <th class="px-6 py-3">Jenis Kelamin</th>
                    <th class="px-6 py-3">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if($penduduk->count() > 0)
                @foreach($penduduk->reverse() as $rs)
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="px-6 py-3">{{ $loop->iteration }}</td>
                    <td class="px-6 py-3">{{ $rs->nik }}</td>
                    <td class="px-6 py-3">{{ $rs->no_kk }}</td>
                    <td class="px-6 py-3">{{ $rs->nama_lengkap }}</td>
                    <td class="px-6 py-3">{{ $rs->alamat }}</td>
                    <td class="px-6 py-3">{{ $rs->tanggal_lahir }}</td>
                    <td class="px-6 py-3">{{ $rs->jenis_kelamin }}</td>
                    <td class="px-6 py-3">
                        <div class="flex space-x-2">
                            <a href="{{ route('admin.penduduk.show', $rs->id) }}" class="text-blue-500 hover:underline">Detail</a>
                            <a href="{{ route('admin.penduduk.edit', $rs->id) }}" class="text-yellow-500 hover:underline">Edit</a>
                            <form action="{{ route('admin.penduduk.destroy', $rs->id) }}" method="POST" onsubmit="return confirm('Hapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
                @else
                <tr>
                    <td class="px-6 py-3 text-center" colspan="8">Penduduk tidak ditemukan</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</div>

<script>
    document.getElementById('searchInput').addEventListener('input', function () {
        const searchValue = this.value.toLowerCase();
        const rows = document.querySelectorAll('#dataTable tbody tr');

        rows.forEach(row => {
            const rowText = row.textContent.toLowerCase();
            row.style.display = rowText.includes(searchValue) ? '' : 'none';
        });
    });
</script>
@endsection
