@extends('layouts.app')
@section('title', 'Edit Penduduk')

@section('contents')
<h1 class="mb-0">Edit Penduduk</h1>
<hr />
<div class="border-b border-gray-900/10 pb-12">
    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <form action="{{ route('admin.penduduk.update', $penduduk->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="sm:col-span-4">
                <label for="nik" class="block text-sm font-medium leading-6 text-gray-900">NIK</label>
                <div class="mt-2">
                    <input type="text" name="nik" id="nik" value="{{ old('nik', $penduduk->nik) }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm">
                    @error('nik')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="sm:col-span-4">
                <label for="no_kk" class="block text-sm font-medium leading-6 text-gray-900">No KK</label>
                <div class="mt-2">
                    <input type="text" name="no_kk" id="no_kk" value="{{ old('no_kk', $penduduk->no_kk) }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm">
                    @error('no_kk')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="sm:col-span-4">
                <label for="nama_lengkap" class="block text-sm font-medium leading-6 text-gray-900">Nama Lengkap</label>
                <div class="mt-2">
                    <input type="text" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap', $penduduk->nama_lengkap) }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm">
                    @error('nama_lengkap')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="sm:col-span-4">
                <label for="alamat" class="block text-sm font-medium leading-6 text-gray-900">Alamat</label>
                <div class="mt-2">
                    <textarea name="alamat" id="alamat" rows="3" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm">{{ old('alamat', $penduduk->alamat) }}</textarea>
                    @error('alamat')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="sm:col-span-4">
                <label for="tanggal_lahir" class="block text-sm font-medium leading-6 text-gray-900">Tanggal Lahir</label>
                <div class="mt-2">
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir', $penduduk->tanggal_lahir) }}" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm">
                    @error('tanggal_lahir')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="sm:col-span-4">
                <label for="jenis_kelamin" class="block text-sm font-medium leading-6 text-gray-900">Jenis Kelamin</label>
                <div class="mt-2">
                    <select name="jenis_kelamin" id="jenis_kelamin" class="block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-600 focus:border-indigo-600 sm:text-sm">
                        <option value="Laki-Laki" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'Laki-Laki' ? 'selected' : '' }}>Laki-Laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin', $penduduk->jenis_kelamin) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="w-full mt-10 rounded-md bg-indigo-600 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus:ring-indigo-600">Update</button>
        </form>
    </div>
</div>
@endsection
