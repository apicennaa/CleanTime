@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Daftar Cleaner</h1>
        @can('create', App\Models\Cleaners::class)
        <a href="{{ route('cleaners.create') }}" 
           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            + Daftar Sebagai Cleaner
        </a>
        @endcan
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if($cleaners->isEmpty())
        <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative" role="alert">
            Belum ada cleaner terdaftar.
        </div>
    @else
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($cleaners as $cleaner)
                <div class="bg-white shadow-md rounded-lg overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center mb-4">
                            <div class="w-16 h-16 bg-gray-200 rounded-full mr-4 flex items-center justify-center">
                                <span class="text-2xl font-bold text-gray-600">
                                    {{ substr($cleaner->user->name, 0, 1) }}
                                </span>
                            </div>
                            <div>
                                <h2 class="text-xl font-semibold">{{ $cleaner->user->name }}</h2>
                                <p class="text-sm text-gray-500">
                                    @if($cleaner->status == 'available')
                                        <span class="text-green-500">● Tersedia</span>
                                    @else
                                        <span class="text-red-500">● Tidak Tersedia</span>
                                    @endif
                                </p>
                            </div>
                        </div>

                        <div class="grid grid-cols-3 gap-2 mb-4 text-center">
                            <div>
                                <p class="text-sm text-gray-600">Pengalaman</p>
                                <p class="font-bold">{{ $cleaner->experience ?? 0 }} Tahun</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Total Order</p>
                                <p class="font-bold">{{ $cleaner->orders->count() }}</p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-600">Order Selesai</p>
                                <p class="font-bold">{{ $cleaner->orders->where('status', 'completed')->count() }}</p>
                            </div>
                        </div>

                        <div class="flex justify-between items-center">
                            <a href="{{ route('cleaners.show', $cleaner->id) }}" 
                               class="text-blue-500 hover:text-blue-700 font-bold">
                                Lihat Detail
                            </a>
                            @can('update', $cleaner)
                            <a href="{{ route('cleaners.edit', $cleaner->id) }}" 
                               class="text-yellow-500 hover:text-yellow-700 font-bold">
                                Edit Profil
                            </a>
                            @endcan
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $cleaners->links() }}
        </div>
    @endif

    <div class="mt-8 bg-gray-100 p-6 rounded-lg">
        <h2 class="text-xl font-semibold mb-4">Informasi Cleaner</h2>
        <ul class="list-disc list-inside text-gray-700 space-y-2">
            <li>Cleaner yang tersedia siap menerima order pembersihan</li>
            <li>Status ketersediaan dapat diubah kapan saja</li>
            <li>Pengalaman kerja membantu pelanggan memilih cleaner terbaik</li>
            <li>Kinerja cleaner dinilai berdasarkan jumlah order dan order yang diselesaikan</li>
        </ul>
    </div>
</div>
@endsection