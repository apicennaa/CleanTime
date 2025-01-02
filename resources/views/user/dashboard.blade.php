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
                        <img src="{{ asset('image/logo.png') }}" alt="CleanTime" class="h-8">
                    </div>
                    <div class="flex items-center gap-4">
                        {{-- Logout Button --}}
                       <form method="POST" action="{{ route('logout') }}">
                       @csrf
                       <button type="submit" class="bg-teal-500 text-white px-4 py-2 rounded-md">Logout</button>
                       </form>
                   </div>
                </div>
            </div>
        </nav>
        <!-- Services Section -->
        <div class="container mx-auto px-4 py-12">
            <div class="text-center mb-12">
                <h2 class="text-lg text-teal-500 font-semibold">HIGHLY PROFESSIONAL CLEANING</h2>
                <h1 class="text-4xl font-bold mt-2">
                    <span class="text-teal-500">Our Services</span>
                    <br>
                    <span class="text-gray-700">Professional Cleaning Solutions for Every Need</span>
                </h1>
            </div>
            {{-- @if (session('success'))
                <div class="alert alert-success text-green-600 mt-4">{{ session('success') }}</div>
            @endif --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 relative">
                @foreach ($services as $service)
                    <div class="bg-teal-500 rounded-lg p-8 text-white hover:shadow-lg transition duration-300">
                        <div class="flex items-center mb-4">
                            <img src="{{ asset('storage/' . $service->service_image) }}" alt="{{ $service->service_name }}"
                                class="w-12 h-12">
                            <h3 class="text-2xl font-bold ml-4">{{ $service->service_name }}</h3>
                        </div>
                        <p class="mb-4">{{ $service->service_description }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-lg font-semibold">Rp
                                {{ number_format($service->service_price, 0, ',', '.') }}</span>
                            <a href="{{ route('user.order.create', ['service_id' => $service->id]) }}"
                                class="bg-white text-teal-500 px-4 py-2 rounded-md hover:bg-teal-50 transition duration-300">
                                Book Now
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Tabel Data Orders -->
            <div class="mt-16">
                <h2 class="text-xl font-bold mb-4">Order History</h2>
                <table class="min-w-full bg-white border border-gray-300 rounded-lg overflow-hidden">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="px-4 py-2">No</th>
                            {{-- <th class="px-4 py-2">Order ID</th> --}}
                            <th class="px-4 py-2">Full Name</th>
                            <th class="px-4 py-2">Service</th>
                            <th class="px-4 py-2">Service Date</th>
                            <th class="px-4 py-2">Service Time</th>
                            <th class="px-4 py-2">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                            <tr class="border-t">
                                <td class="px-4 py-2">{{ $loop->iteration }}</td>
                                {{-- <td class="px-4 py-2">{{ $order->id }}</td> --}}
                                <td class="px-4 py-2">{{ $order->full_name }}</td>
                                <td class="px-4 py-2">{{ $order->service->service_name }}</td>
                                <td class="px-4 py-2">{{ $order->service_date }}</td>
                                <td class="px-4 py-2">{{ $order->service_time }}</td>
                                <td class="px-4 py-2">
                                    <span
                                        class="px-3 py-1 text-xs font-semibold rounded-full 
                                        @if ($order->status === 'Completed') bg-green-100 text-green-800
                                        @elseif($order->status === 'Cancelled') bg-red-100 text-red-800
                                        @elseif($order->status === 'In Progress') bg-blue-100 text-blue-800
                                        @else bg-yellow-100 text-yellow-800 @endif">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-4 py-2 text-center">No orders found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Footer -->
        <footer class="bg-gray-900 text-white mt-16">
            <div class="container mx-auto px-4 py-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <h3 class="font-bold mb-4">Useful Links</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="hover:text-teal-500">Home Page</a></li>
                            <li><a href="#" class="hover:text-teal-500">Service Page</a></li>
                            <li><a href="#" class="hover:text-teal-500">FAQ's Page</a></li>
                            <li><a href="#" class="hover:text-teal-500">Contact Us</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-bold mb-4">Contact</h3>
                        <ul class="space-y-2">
                            <li>(402) 254 4458 187</li>
                            <li>cleantime@email.com</li>
                            <li>Jl. Ciledug Raya No. 142</li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="font-bold mb-4">Follow us on:</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="text-teal-500 hover:text-teal-400"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="text-teal-500 hover:text-teal-400"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="text-teal-500 hover:text-teal-400"><i class="fab fa-linkedin"></i></a>
                            <a href="#" class="text-teal-500 hover:text-teal-400"><i
                                    class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="text-center mt-8 pt-8 border-t border-gray-800">
                    <p>© 2024, Kelompok 2.</p>
                </div>
            </div>
        </footer>
    </div>
@endsection
