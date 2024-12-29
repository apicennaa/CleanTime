@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Daftar Sebagai Cleaner</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cleaners.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf

        <div class="mb-4">
            <label for="user_id" class="block text-gray-700 text-sm font-bold mb-2">
                User ID
            </label>
            <input type="number" name="user_id" id="user_id" 
                   value="{{ auth()->user()->id }}" 
                   readonly
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="status" class="block text-gray-700 text-sm font-bold mb-2">
                Status Ketersediaan
            </label>
            <select name="status" id="status" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="available">Tersedia</option>
                <option value="unavailable">Tidak Tersedia</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="experience" class="block text-gray-700 text-sm font-bold mb-2">
                Pengalaman Kerja (Tahun)
            </label>
            <input type="number" name="experience" id="experience" 
                   min="0" 
                   placeholder="Masukkan pengalaman kerja"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" 
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Daftar Sebagai Cleaner
            </button>
            <a href="{{ route('home') }}" 
               class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                Kembali
            </a>
        </div>
    </form>

    <div class="mt-6 bg-gray-100 p-4 rounded">
        <h2 class="text-xl font-semibold mb-4">Informasi Pendaftaran</h2>
        <p class="text-gray-700">
            Dengan mendaftar sebagai cleaner, Anda dapat:
            <ul class="list-disc list-inside">
                <li>Menerima pesanan pembersihan</li>
                <li>Mengelola jadwal pekerjaan</li>
                <li>Melihat riwayat pekerjaan</li>
                <li>Mengatur status ketersediaan</li>
            </ul>
        </p>
    </div>
</div>
@endsection