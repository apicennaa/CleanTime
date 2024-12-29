@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Edit Profil Cleaner</h1>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('cleaners.update', $cleaners->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="user_name" class="block text-gray-700 text-sm font-bold mb-2">
                Nama Pengguna
            </label>
            <input type="text" id="user_name" 
                   value="{{ $cleaners->user->name }}" 
                   readonly
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <label for="status" class="block text-gray-700 text-sm font-bold mb-2">
                Status Ketersediaan
            </label>
            <select name="status" id="status" 
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                <option value="available" {{ $cleaners->status == 'available' ? 'selected' : '' }}>Tersedia</option>
                <option value="unavailable" {{ $cleaners->status == 'unavailable' ? 'selected' : '' }}>Tidak Tersedia</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="experience" class="block text-gray-700 text-sm font-bold mb-2">
                Pengalaman Kerja (Tahun)
            </label>
            <input type="number" name="experience" id="experience" 
                   min="0" 
                   value="{{ $cleaners->experience }}"
                   placeholder="Masukkan pengalaman kerja"
                   class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>

        <div class="mb-4">
            <h3 class="block text-gray-700 text-sm font-bold mb-2">Statistik Pekerjaan</h3>
            <div class="grid grid-cols-2 gap-4">
                <div class="bg-gray-100 p-4 rounded">
                    <p class="text-gray-600">Total Pekerjaan</p>
                    <p class="text-xl font-bold">{{ $cleaners->orders->count() }}</p>
                </div>
                <div class="bg-gray-100 p-4 rounded">
                    <p class="text-gray-600">Pekerjaan Selesai</p>
                    <p class="text-xl font-bold">{{ $cleaners->orders->where('status', 'completed')->count() }}</p>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-between">
            <button type="submit" 
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Perbarui Profil
            </button>
            <div>
                <a href="{{ route('cleaners.show', $cleaners->id) }}" 
                   class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800 mr-4">
                    Lihat Jadwal
                </a>
                <a href="{{ route('home') }}" 
                   class="inline-block align-baseline font-bold text-sm text-red-500 hover:text-red-800">
                    Kembali
                </a>
            </div>
        </div>
    </form>

    <div class="mt-6 bg-gray-100 p-4 rounded">
        <h2 class="text-xl font-semibold mb-4">Catatan Penting</h2>
        <p class="text-gray-700">
            • Status "Tersedia" memungkinkan Anda menerima pesanan baru
            • Status "Tidak Tersedia" akan menghentikan penawaran pekerjaan baru
            • Perbarui pengalaman kerja Anda secara berkala
        </p>
    </div>
</div>
@endsection