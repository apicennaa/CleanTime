@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Profil Cleaner - {{ $cleaners->user->name }}</h1>
        <div class="space-x-2">
            @can('update', $cleaners)
            <a href="{{ route('cleaners.edit', $cleaners->id) }}" 
               class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                Edit Profil
            </a>
            @endcan
            <a href="{{ route('cleaners.index') }}" 
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Kembali
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid md:grid-cols-3 gap-6">
        {{-- Profil Cleaner --}}
        <div class="md:col-span-1 bg-white shadow-md rounded-lg p-6">
            <div class="flex items-center mb-4">
                <div class="w-20 h-20 bg-gray-200 rounded-full mr-4 flex items-center justify-center">
                    <span class="text-4xl font-bold text-gray-600">
                        {{ substr($cleaners->user->name, 0, 1) }}
                    </span>
                </div>
                <div>
                    <h2 class="text-2xl font-semibold">{{ $cleaners->user->name }}</h2>
                    <p class="text-sm text-gray-500">
                        @if($cleaners->status == 'available')
                            <span class="text-green-500">● Tersedia</span>
                        @else
                            <span class="text-red-500">● Tidak Tersedia</span>
                        @endif
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-3 gap-2 mb-4 text-center bg-gray-100 rounded p-3">
                <div>
                    <p class="text-sm text-gray-600">Pengalaman</p>
                    <p class="font-bold">{{ $cleaners->experience ?? 0 }} Tahun</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Total Order</p>
                    <p class="font-bold">{{ $cleaners->orders->count() }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Order Selesai</p>
                    <p class="font-bold">{{ $cleaners->orders->where('status', 'completed')->count() }}</p>
                </div>
            </div>

            <div class="bg-blue-50 border-l-4 border-blue-500 p-3">
                <p class="text-sm text-blue-700">
                    Kontak: {{ $cleaners->user->email }}
                </p>
            </div>
        </div>

        {{-- Jadwal Pekerjaan --}}
        <div class="md:col-span-2 space-y-6">
            {{-- Pekerjaan Aktif --}}
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-bold mb-4 border-b pb-2">Pekerjaan Aktif</h2>
                @if($activeJobs->isEmpty())
                    <p class="text-gray-500 text-center py-4">Tidak ada pekerjaan aktif saat ini.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-100 text-left">
                                    <th class="p-3">ID Order</th>
                                    <th class="p-3">Layanan</th>
                                    <th class="p-3">Tanggal Order</th>
                                    <th class="p-3">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($activeJobs as $job)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="p-3">#{{ $job->id }}</td>
                                        <td class="p-3">{{ $job->service->name }}</td>
                                        <td class="p-3">{{ $job->order_date ? $job->order_date->format('d M Y') : 'Belum dijadwalkan' }}</td>
                                        <td class="p-3">
                                            <span class="{{ $job->status == 'in_progress' ? 'text-yellow-600' : 'text-blue-600' }}">
                                                {{ ucfirst(str_replace('_', ' ', $job->status)) }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>

            {{-- Riwayat Pekerjaan --}}
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-bold mb-4 border-b pb-2">Riwayat Pekerjaan</h2>
                @if($jobHistory->isEmpty())
                    <p class="text-gray-500 text-center py-4">Belum ada riwayat pekerjaan.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-100 text-left">
                                    <th class="p-3">ID Order</th>
                                    <th class="p-3">Layanan</th>
                                    <th class="p-3">Tanggal Order</th>
                                    <th class="p-3">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jobHistory as $job)
                                    <tr class="border-b hover:bg-gray-50">
                                        <td class="p-3">#{{ $job->id }}</td>
                                        <td class="p-3">{{ $job->service->name }}</td>
                                        <td class="p-3">{{ $job->order_date ? $job->order_date->format('d M Y') : 'Belum dijadwalkan' }}</td>
                                        <td class="p-3">
                                            <span class="{{ $job->status == 'completed' ? 'text-green-600' : 'text-red-600' }}">
                                                {{ ucfirst(str_replace('_', ' ', $job->status)) }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="mt-8 bg-gray-100 p-6 rounded-lg">
        <h2 class="text-xl font-semibold mb-4">Catatan Penting</h2>
        <ul class="list-disc list-inside text-gray-700 space-y-2">
            <li>Pekerjaan aktif adalah order yang sedang berjalan atau menunggu dikerjakan</li>
            <li>Riwayat pekerjaan menunjukkan order yang sudah selesai atau dibatalkan</li>
            <li>Perbarui status ketersediaan Anda secara berkala</li>
        </ul>
    </div>
</div>
@endsection