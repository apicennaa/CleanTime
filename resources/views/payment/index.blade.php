@extends('layouts.app', ['hideNavbar' => true, 'hideFooter' => true])

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-cyan-50 to-teal-50">
        <!-- Navbar -->
        <nav class="bg-white shadow-sm">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <a href="{{ route('home') }}">
                            <img src="{{ asset('image/logo.png') }}" alt="CleanTime" class="h-8">
                        </a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- Invoice Section -->
        <div class="container mx-auto px-4 py-12">
            <div class="max-w-3xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-lg text-teal-500 font-semibold">INVOICE DETAILS</h2>
                    <h1 class="text-4xl font-bold mt-2">
                        <span class="text-gray-700">Your Payment Summary</span>
                    </h1>
                </div>

                @if (session('invoice'))
                    <div class="bg-white rounded-lg shadow-lg p-8">
                        <!-- Invoice Details -->
                        <div class="bg-teal-50 rounded-lg p-6 mb-8">
                            <h3 class="text-lg font-semibold text-teal-600 mb-4">Invoice Information</h3>
                            <div class="space-y-3">
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Service Name</span>
                                    <span class="font-medium">{{ session('invoice')->service_name }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Full Name</span>
                                    <span class="font-medium">{{ session('invoice')->full_name }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Phone</span>
                                    <span class="font-medium">{{ session('invoice')->phone }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Address</span>
                                    <span class="font-medium">{{ session('invoice')->address }}</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Service Date</span>
                                    <span
                                        class="font-medium">{{ date('d M Y', strtotime(session('invoice')->service_date)) }}
                                        {{ date('H:i', strtotime(session('invoice')->service_time)) }}</span>
                                </div>
                                {{-- <div class="flex justify-between">
                                    <span class="text-gray-600">Status</span>
                                    <span class="font-medium">{{ session('invoice')->status }}</span>
                                </div> --}}
                                <div class="flex justify-between">
                                    <span class="text-gray-600">Payment Method</span>
                                    <span class="font-medium">{{ session('invoice')->payment_method }}</span>
                                </div>
                                <div class="flex justify-between pt-3 border-t">
                                    <span class="text-gray-900 font-semibold">Service Price</span>
                                    <span
                                        class="text-teal-600 font-bold">Rp{{ number_format(session('invoice')->service_price, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Return to Home Button -->
                        <div class="flex justify-end gap-4 mt-8">
                            <a href="{{ route('home') }}"
                                class="bg-teal-500 text-white px-6 py-3 rounded-md hover:bg-teal-600 transition duration-300 shadow">
                                Return to Home
                            </a>
                            <a href="{{ route('payment.downloadInvoice', session('invoice')->order_id) }}"
                                class="bg-teal-500 text-white px-6 py-3 rounded-md hover:bg-teal-600 transition duration-300 shadow">
                                Download Invoice
                            </a>
                        </div>
                    </div>
                @else
                    <div class="text-center bg-white rounded-lg shadow-lg p-8">
                        <h3 class="text-lg font-semibold text-gray-700">No Invoice Found</h3>
                        <p class="text-gray-500 mt-4">It seems like there is no invoice available at the moment. Please try
                            again later.</p>
                        <div class="mt-8">
                            <a href="{{ route('home') }}"
                                class="bg-teal-500 text-white px-8 py-3 rounded-md hover:bg-teal-600 transition duration-300">
                                Return to Home
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white mt-16">
            <div class="container mx-auto px-4 py-8">
                <div class="text-center">
                    <p>© 2024, Kelompok 2.</p>
                </div>
            </div>
        </footer>
    </div>
@endsection
