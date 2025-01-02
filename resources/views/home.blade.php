@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<section class="pt-20 px-8">
    <div class="container mx-auto">
        <div class="flex justify-between items-center">
            <!-- Left Content -->
            <div class="w-1/2 animate-[fadeIn_1s_ease-out] pl-7">
                <h2 class="text-lg text-gray-600 mb-2">HIGHLY PROFESSIONAL CLEANING</h2>
                <h1 class="text-5xl font-bold mb-4">
                    <span class="text-cyan-500">EASY TO CLEAN</span><br>
                    <span class="text-gray-700">HOUSE AND OFFICE</span>
                </h1>
                <p class="text-gray-600 mb-8 max-w-lg">
                    Simplifying Cleanliness for Homes and Offices, Bringing Comfort, Trust, and Ease to Your Everyday Life
                </p>
                <a href="{{ route('login') }}" class="lets-talk-btn bg-cyan-500 text-white px-6 py-3 rounded-full inline-flex items-center space-x-2 hover:bg-cyan-600">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                    </svg>
                    <span>Book Schedule</span>
                </a>
            </div>
            
            <!-- Right Image -->
            <div class="w-1/2 animate-[fadeIn_1.5s_ease-out]">
                <img src="{{ asset('image/cleaner.png') }}" alt="Professional Cleaner" class="w-80 h-auto mx-auto mb-16">
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="bg-cyan-500 text-white py-12">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div>
                <h3 class="text-3xl font-bold">300+</h3>
                <p>Clean Houses</p>
            </div>
            <div>
                <h3 class="text-3xl font-bold">75</h3>
                <p>Expert Cleaners</p>
            </div>
            <div>
                <h3 class="text-3xl font-bold">98</h3>
                <p>Satisfied Clients</p>
            </div>
            <div>
                <h3 class="text-3xl font-bold">25+</h3>
                <p>Years Experience</p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="py-20">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">WHAT WE ARE OFFERING</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            @foreach($services as $service)
            <div class="bg-white p-6 rounded-lg shadow-md text-center">
                <img src="{{ asset($service['icon']) }}" alt="{{ $service['name'] }}" class="w-64 h-auto mx-auto mb-4">
                <h3 class="text-xl font-semibold mb-2">{{ $service['name'] }}</h3>
                <p class="text-gray-600">{{ $service['description'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Promotion Section -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center bg-white rounded-lg shadow-lg overflow-hidden">
            <div class="md:w-1/3">
                <img src="{{ asset('image/promotion.png') }}" alt="Promotion" class="w-full h-full object-cover">
            </div>
            <div class="md:w-2/3 p-8">
                <h2 class="text-3xl font-bold mb-4">15% Off For Our New Clients</h2>
                <p class="text-gray-600 mb-6">Book your first cleaning service with us today and receive a special discount!</p>
                <a href="{{ route('login') }}" class="bg-cyan-500 text-white px-8 py-3 rounded-md hover:bg-cyan-600 inline-block">
                    Book Now
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials Section -->
<section class="py-20">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">WHAT OUR CUSTOMERS SAY</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($testimonials as $testimonial)
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="flex items-center mb-4">
                    <img src="{{ asset($testimonial['image']) }}" alt="{{ $testimonial['name'] }}" class="w-12 h-12 rounded-full">
                    <div class="ml-4">
                        <h4 class="font-semibold">{{ $testimonial['name'] }}</h4>
                        <div class="flex text-yellow-400">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            @endfor
                        </div>
                    </div>
                </div>
                <p class="text-gray-600">{{ $testimonial['text'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="bg-cyan-600 py-16">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row items-center justify-between">
            <div class="md:w-1/2 text-white mb-8 md:mb-0">
                <h2 class="text-3xl font-bold mb-4">Subscribe To Our Newsletter</h2>
                <p>Get the latest updates and special offers directly in your inbox!</p>
            </div>
            <div class="md:w-1/2">
                <form class="flex">
                    <input type="email" placeholder="Enter your email" class="flex-1 p-3 rounded-l-md focus:outline-none">
                    <button type="submit" class="bg-gray-900 text-white px-6 py-3 rounded-r-md hover:bg-gray-800">
                        Subscribe
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection