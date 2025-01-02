@extends('layouts.app', ['hideNavbar' => true, 'hideFooter' => true])

@section('content')
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ session('success') }}',
                showConfirmButton: true,
            });
        </script>
    @endif
    <div class="min-h-screen bg-gradient-to-br from-cyan-50 to-teal-50">

        <!-- Navbar -->
        <nav class="bg-white shadow-sm">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <img src="{{ asset('images/logo.png') }}" alt="CleanTime" class="h-8">
                    </div>

                    <div class="flex items-center gap-4">
                        <a href="#" class="text-gray-700">HOME</a>
                        <a href="#" class="text-gray-700">ORDER DETAIL</a>
                        <a href="#" class="text-gray-700">CONTACT</a>

                        {{-- Logout Button --}}
                        {{-- <form method="POST" action="{{ route('logout') }}"> --}}
                        @csrf
                        <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded-md">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <div class="container mx-auto px-4 py-8">

            <!-- Welcome Message -->
            <h1 class="text-2xl font-bold text-gray-800 mb-8">
                Welcome, {{ auth()->user()->name }}! Here's an overview of your tasks today
            </h1>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-teal-500 text-white rounded-lg p-6 shadow-md">
                    <h3 class="text-lg font-bold italic">Total Order : {{ $stats['total_orders'] }}</h3>
                </div>
                <div class="bg-teal-500 text-white rounded-lg p-6 shadow-md">
                    <h3 class="text-lg font-bold italic">Pending Task : {{ $stats['pending_tasks'] }}</h3>
                </div>
                <div class="bg-teal-500 text-white rounded-lg p-6 shadow-md">
                    <h3 class="text-lg font-bold italic">Completed Task : {{ $stats['completed_tasks'] }}</h3>
                </div>
            </div>

            <!-- Orders List -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-8">

                @if ($orders->isEmpty())
                    <div class="text-center py-8 text-gray-500">
                        No Order Added
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        No</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Customer</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Service</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Schedule</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Price</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Payment Method</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Status</th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $loop->iteration }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $order->service->service_name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $order->service_date }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            Rp{{ number_format($order->service->service_price, 0, ',', '.') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $order->payment->payment_method ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span
                                                class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                    @if ($order->status === 'Completed') bg-green-100 text-green-800
                                    @elseif($order->status === 'Cancelled') bg-red-100 text-red-800
                                    @elseif($order->status === 'In Progress') bg-blue-100 text-blue-800
                                    @else bg-yellow-100 text-yellow-800 @endif">
                                                {{ ucfirst($order->status) }}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            @if ($order->status !== 'Cancelled' && $order->status !== 'Completed')
                                                <form action="{{ route('cleaner.order.updateStatus', $order->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    <select name="status" class="">
                                                        <option value="Pending"
                                                            {{ $order->status === 'Pending' ? 'selected' : '' }}>Pending
                                                        </option>
                                                        <option value="In Progress"
                                                            {{ $order->status === 'In Progress' ? 'selected' : '' }}>In
                                                            Progress</option>
                                                        <option value="Completed"
                                                            {{ $order->status === 'Completed' ? 'selected' : '' }}>
                                                            Completed</option>
                                                        <option value="Cancelled"
                                                            {{ $order->status === 'Cancelled' ? 'selected' : '' }}>
                                                            Cancelled</option>
                                                    </select>
                                                    <button type="submit"
                                                        class="text-teal-600 hover:text-teal-900 ml-2">Update
                                                        Status</button>
                                                </form>
                                            @endif
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{ $orders->links() }}
                        </div>
                    </div>
                @endif
            </div>

            {{-- <!-- Update Status Modal -->
    <div id="statusModal" class="hidden fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full">
        <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
            <div class="mt-3 text-center">
                <h3 class="text-lg leading-6 font-medium text-gray-900">Update Order Status</h3>
                <div class="mt-2 px-7 py-3">
                    <form id="updateStatusForm" method="POST">
                        @csrf
                        @method('PATCH')
                        <select name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm">
                            <option value="pending">Pending</option>
                            <option value="in_progress">In Progress</option>
                            <option value="completed">Completed</option>
                        </select>
                        <div class="mt-4 flex justify-end">
                            <button type="button" onclick="closeModal()"
                                class="mr-2 px-4 py-2 bg-gray-300 text-gray-800 rounded-md">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-4 py-2 bg-teal-500 text-white rounded-md">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
            <!-- Add Service Button -->
            <div class="flex justify-center items-center">
                <a href="{{ route('cleaner.services.create') }}"
                    class="bg-teal-600 text-white px-4 py-2 rounded-md hover:bg-teal-700">
                    Add New Service
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mt-6">
                @foreach ($services as $service)
                    <div class="bg-white shadow rounded-lg p-6">
                        <h3 class="text-xl font-bold">{{ $service->service_name }}</h3>
                        <p>{{ $service->service_description }}</p>
                        <p class="text-teal-500 font-semibold mt-2">Rp
                            {{ number_format($service->service_price, 0, ',', '.') }}
                        </p>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('cleaner.services.edit', $service->service_name) }}"
                                class="text-teal-600 hover:text-teal-900">Edit</a>
                            <form action="{{ route('cleaner.services.destroy', $service->service_name) }}" method="POST"
                                class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900"
                                    onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection
{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Services</h1>
    <a href="{{ route('cleaner.services.create') }}" class="btn btn-primary mb-3">Add New Service</a>

    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
            <tr>
                <td><img src="{{ asset('storage/' . $service->service_image) }}" alt="Service Image" width="100"></td>
                <td>{{ $service->service_name }}</td>
                <td>{{ $service->service_description }}</td>
                <td>${{ $service->service_price }}</td>
                <td>
                    <a href="{{ route('cleaner.services.edit', $service) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('cleaner.services.delete', $service) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection --}}
