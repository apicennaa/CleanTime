@extends('layouts.app', ['hideNavbar' => true, 'hideFooter' => true])

@section('content')
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

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 relative">
            @foreach($services as $service)
            <div class="bg-teal-500 rounded-lg p-8 text-white hover:shadow-lg transition duration-300">
                <div class="flex items-center mb-4">
                    <img src="{{ asset('storage/' . $service->service_image) }}" alt="{{ $service->service_name }}" class="w-12 h-12">
                    <h3 class="text-2xl font-bold ml-4">{{ $service->service_name }}</h3>
                </div>
                <p class="mb-4">{{ $service->service_description }}</p>
                <div class="flex justify-between items-center">
                    <span class="text-lg font-semibold">Rp {{ number_format($service->service_price, 0, ',', '.') }}</span>
                    <a href="{{ route('user.order.create', ['service_id' => $service->id]) }}" 
                       class="bg-white text-teal-500 px-4 py-2 rounded-md hover:bg-teal-50 transition duration-300">
                        Book Now
                    </a>
                </div>
            </div>
            @endforeach
        </div>
{{-- 
        <!-- Newsletter Section -->
        <div class="bg-teal-600 rounded-lg mt-16 p-8 text-white relative overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-center">
                <div>
                    <h2 class="text-2xl font-bold mb-4">Subscribe To Our News Letter</h2>
                    <p class="mb-6">Subscribe Our News Letter To Get Latest News And Updates</p>
                    <form action="{{ route('newsletter.subscribe') }}" method="POST" class="flex">
                        @csrf
                        <input type="email" name="email" placeholder="Enter Your Email" 
                               class="flex-1 px-4 py-2 rounded-l-md text-gray-700">
                        <button type="submit" class="bg-teal-800 px-6 py-2 rounded-r-md hover:bg-teal-700">
                            →
                        </button>
                    </form>
                </div>
            </div>
        </div> --}}
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
                        <a href="#" class="text-teal-500 hover:text-teal-400"><i class="fab fa-instagram"></i></a>
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