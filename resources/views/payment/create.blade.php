@extends('layouts.app', ['hideNavbar' => true, 'hideFooter' => true])

@section('content')
    <div class="min-h-screen bg-gradient-to-br from-cyan-50 to-teal-50">
        <!-- Navbar -->
        <style>
            img.h-8 {
                max-width: 100%;
                height: 50px;
                width: 150px;
                object-fit: cover;
            }
    
            .h-8 {
                max-block-size: max-content;
            }
        </style>
        <nav class="bg-white shadow-sm">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center h-16">
                    <div class="flex items-center">
                        <a href="{{ route('home') }}" class="mx-auto">
                            <img src="{{ asset('image/logo.png') }}" alt="CleanTime" class="h-8">
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Payment Form Section -->
        <div class="container mx-auto px-4 py-12">
            <div class="max-w-3xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-lg text-teal-500 font-semibold">PAYMENT DETAILS</h2>
                    <h1 class="text-4xl font-bold mt-2">
                        <span class="text-gray-700">Complete Your Payment</span>
                    </h1>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-8">
                    <!-- Order Summary -->
                    <div class="bg-teal-50 rounded-lg p-6 mb-8">
                        <h3 class="text-lg font-semibold text-teal-600 mb-4">Order Summary</h3>
                        <div class="space-y-3">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Service</span>
                                <span class="font-medium">{{ $order->service->service_name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Customer Name</span>
                                <span class="font-medium">{{ $order->full_name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Service Date</span>
                                <span class="font-medium">{{ date('d M Y', strtotime($order->service_date)) }}
                                    {{ date('H:i', strtotime($order->service_time)) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Address</span>
                                <span class="font-medium">{{ $order->address }}</span>
                            </div>
                            <div class="flex justify-between pt-3 border-t">
                                <span class="text-gray-900 font-semibold">Total Amount</span>
                                <span class="text-teal-600 font-bold">Rp
                                    {{ number_format($order->service->service_price, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method Selection -->
                    <form action="{{ route('payment.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ $order->id }}">

                        <div>
                            <h3 class="text-lg font-semibold text-gray-700 mb-4">Select Payment Method</h3>
                            <div class="space-y-4">
                                <div class="flex items-center p-4 border rounded-lg hover:border-teal-500 cursor-pointer">
                                    <input type="radio" name="payment_method" id="credit_card" value="credit_card"
                                        class="mr-3">
                                    <label for="credit_card" class="flex items-center cursor-pointer">
                                        <i class="fas fa-credit-card text-teal-500 text-xl mr-2"></i>
                                        <span>Credit Card</span>
                                    </label>
                                </div>

                                <div class="flex items-center p-4 border rounded-lg hover:border-teal-500 cursor-pointer">
                                    <input type="radio" name="payment_method" id="bank_transfer" value="bank_transfer"
                                        class="mr-3">
                                    <label for="bank_transfer" class="flex items-center cursor-pointer">
                                        <i class="fas fa-university text-teal-500 text-xl mr-2"></i>
                                        <span>Bank Transfer</span>
                                    </label>
                                </div>

                                <div class="flex items-center p-4 border rounded-lg hover:border-teal-500 cursor-pointer">
                                    <input type="radio" name="payment_method" id="e-wallet" value="e-wallet"
                                        class="mr-3">
                                    <label for="e-wallet" class="flex items-center cursor-pointer">
                                        <i class="fas fa-wallet text-teal-500 text-xl mr-2"></i>
                                        <span>E-Wallet</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end mt-8">
                            <button type="submit"
                                class="bg-teal-500 text-white px-8 py-3 rounded-md hover:bg-teal-600 transition duration-300">
                                Proceed to Payment
                            </button>
                        </div>
                    </form>
                </div>
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
