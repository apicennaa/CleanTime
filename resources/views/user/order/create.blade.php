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

        <!-- Order Form Section -->
        <div class="container mx-auto px-4 py-12">
            <div class="max-w-3xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-lg text-teal-500 font-semibold">BOOK YOUR SERVICE</h2>
                    <h1 class="text-4xl font-bold mt-2">
                        <span class="text-gray-700">Create Your Cleaning Order</span>
                    </h1>
                </div>

                <div class="bg-white rounded-lg shadow-lg p-8">
                    <form action="{{ route('user.order.store') }}" method="POST" class="space-y-6">
                        @csrf
                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                        <input type="hidden" name="cleaner_id" value="{{ $service->cleaner_id }}">
                        <!-- Selected Service Info -->
                        <div class="bg-teal-50 rounded-lg p-4 mb-6">
                            <h3 class="text-lg font-semibold text-teal-600 mb-2">Selected Service</h3>
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-700 font-medium">{{ $service->service_name }}</p>
                                    <p class="text-sm text-gray-600">{{ $service->service_description }}</p>
                                </div>
                                <p class="text-teal-600 font-bold">Rp
                                    {{ number_format($service->service_price, 0, ',', '.') }}</p>
                            </div>
                        </div>

                        <!-- Customer Details -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 font-medium mb-2" for="name">Full Name</label>
                                <input type="text" name="name" id="name" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500">
                            </div>

                            <div>
                                <label class="block text-gray-700 font-medium mb-2" for="phone">Phone Number</label>
                                <input type="tel" name="phone" id="phone" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500">
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-gray-700 font-medium mb-2" for="address">Service Address</label>
                                <textarea name="address" id="address" rows="3" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500"></textarea>
                            </div>

                            <div>
                                <label class="block text-gray-700 font-medium mb-2" for="service_date">Service Date</label>
                                <input type="date" name="service_date" id="service_date" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500">
                            </div>

                            <div>
                                <label class="block text-gray-700 font-medium mb-2" for="service_time">Service Time</label>
                                <select name="service_time" id="service_time" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500">
                                    <option value="">Select Time</option>
                                    <option value="08:00">08:00 AM</option>
                                    <option value="10:00">10:00 AM</option>
                                    <option value="13:00">01:00 PM</option>
                                    <option value="15:00">03:00 PM</option>
                                </select>
                            </div>

                            <div class="md:col-span-2">
                                <label class="block text-gray-700 font-medium mb-2" for="note">Special Notes</label>
                                <textarea name="note" id="note" rows="3"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-teal-500 focus:border-teal-500"
                                    placeholder="Any special instructions or requirements..."></textarea>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end mt-8">
                            <button type="submit"
                                class="bg-teal-500 text-white px-8 py-3 rounded-md hover:bg-teal-600 transition duration-300">
                                Confirm Order
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
