@extends('layouts.app')

@section('title', 'Create Penduduk')

@section('contents')
<h1 class="font-bold text-2xl ml-3">Tambah Penduduk</h1>
<hr />
<div class="border-b border-gray-900/10 pb-12">
    <form action="{{ route('admin.penduduk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
            <div class="sm:col-span-6">
                <label for="nik" class="block text-sm font-medium leading-6 text-gray-900">NIK</label>
                <input type="text" name="nik" id="nik" class="mt-2 block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm" value="{{ old('nik') }}" required>
                @error('nik')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-6">
                <label for="no_kk" class="block text-sm font-medium leading-6 text-gray-900">No KK</label>
                <input type="text" name="no_kk" id="no_kk" class="mt-2 block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm" value="{{ old('no_kk') }}" required>
                @error('no_kk')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-6">
                <label for="nama_lengkap" class="block text-sm font-medium leading-6 text-gray-900">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" id="nama_lengkap" class="mt-2 block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm" value="{{ old('nama_lengkap') }}" required>
                @error('nama_lengkap')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-6">
                <label for="alamat" class="block text-sm font-medium leading-6 text-gray-900">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="mt-2 block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm" value="{{ old('alamat') }}" required>
                @error('alamat')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-6">
                <label for="tanggal_lahir" class="block text-sm font-medium leading-6 text-gray-900">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="mt-2 block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm" value="{{ old('tanggal_lahir') }}" required>
                @error('tanggal_lahir')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-6">
                <label for="jenis_kelamin" class="block text-sm font-medium leading-6 text-gray-900">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="mt-2 block w-full rounded-md border-0 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-indigo-600 sm:text-sm" required>
                    <option value="Laki-Laki" {{ old('jenis_kelamin') == 'Laki-Laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                    <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="sm:col-span-6 mt-6">
                <button type="submit" class="w-full py-2 px-4 rounded-md bg-indigo-600 text-white font-semibold hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-600">
                    Submit
                </button>
            </div>

        </div>
    </form>
</div>
@endsection
