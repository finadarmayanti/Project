@extends('layouts.user')

@section('title', 'Pengajuan Surat')

@section('contents')
<div class="p-6 bg-gray-50 rounded-lg shadow-md">

    <h2 class="text-3xl font-bold text-gray-800">Ajukan Permohonan Surat</h2>

    <form action="{{ route('surat.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mt-6 space-y-4">

            <div>
                <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" class="mt-2 w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div>
                <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                <input type="text" name="nik" id="nik" class="mt-2 w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" maxlength="16" required>
                @error('nik')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                <textarea name="alamat" id="alamat" class="mt-2 w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" rows="2" required></textarea>
            </div>

            <div>
                <label for="telepon" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                <input type="text" name="telepon" id="telepon" class="mt-2 w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div>
                <label for="jenis_surat" class="block text-sm font-medium text-gray-700">Jenis Surat</label>
                <select name="jenis_surat" id="jenis_surat" class="mt-2 w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="" disabled selected>Pilih jenis surat</option>
                    <option value="Surat Keterangan Domisili (SKD)">Surat Keterangan Domisili (SKD)</option>
                    <option value="Surat Keterangan Tidak Mampu (SKTM)">Surat Keterangan Tidak Mampu (SKTM)</option>
                    <option value="Surat Pengantar">Surat Pengantar</option>
                    <option value="Surat Keterangan Usaha (SKU)">Surat Keterangan Usaha (SKU)</option>
                    <option value="Surat Keterangan Kelahiran">Surat Keterangan Kelahiran</option>
                    <option value="Surat Keterangan Kematian">Surat Keterangan Kematian</option>
                    <option value="Surat Izin Acara">Surat Izin Acara</option>
                    <option value="Surat Keterangan Belum Menikah">Surat Keterangan Belum Menikah</option>
                    <option value="Surat Keterangan Pindah">Surat Keterangan Pindah</option>
                </select>
            </div>

            <div>
                <label for="keperluan" class="block text-sm font-medium text-gray-700">Keperluan</label>
                <textarea name="keperluan" id="keperluan" class="mt-2 w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" required></textarea>
            </div>

            <div>
                <label for="dokumen" class="block text-sm font-medium text-gray-700">Dokumen Tambahan (PDF atau Gambar)</label>
                <input type="file" name="dokumen" id="dokumen" class="mt-2 w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" accept=".pdf,.jpg,.jpeg,.png" required>
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-md hover:bg-blue-700 transition duration-200">Submit</button>
            </div>

        </div>
    </form>

</div>
@endsection
