@extends('layouts.user')

@section('title', 'Profile Settings')

@section('contents')
<div class="p-6 bg-white rounded-lg shadow-md max-w-3xl mx-auto">
    <h1 class="text-xl font-bold mb-4">Profile</h1>
    <hr class="mb-6" />
    <form method="POST" enctype="multipart/form-data" action="">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2" for="name">Nama</label>
            <input 
                id="name" 
                name="name" 
                type="text" 
                value="{{ auth()->user()->name }}" 
                class="block w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
            />
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2" for="email">Email</label>
            <input 
                id="email" 
                name="email" 
                type="text" 
                value="{{ auth()->user()->email }}" 
                class="block w-full px-4 py-2 border rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none" 
            />
        </div>
    </form>
</div>
@endsection
