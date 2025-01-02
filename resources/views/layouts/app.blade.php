<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CleanTime - Professional Cleaning Services')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .nav-item {
            transition: all 0.3s ease;
        }

        .nav-item:hover {
            transform: translateY(-2px);
        }

        .logo-hover {
            transition: all 0.3s ease;
        }

        .logo-hover:hover {
            transform: scale(1.05);
        }

        .btn-transition {
            transition: all 0.3s ease;
        }

        .btn-transition:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.0/dist/sweetalert2.all.min.js"></script>

</head>

<body class="bg-gradient-to-r from-cyan-50 to-white">
    @if (!isset($hideNavbar) || !$hideNavbar)
        <!-- Navigation -->
        <nav class="pt-4 px-8">
            <div class="container mx-auto">
                <div class="flex justify-between items-center">
                    <!-- Logo -->
                    <div class="flex items-center logo-hover">
                        <img src="{{ asset('image/logo.svg') }}" alt="CleanTime Logo" class="h-8">
                        {{-- <span class="text-cyan-500 text-2xl font-semibold ml-2">CleanTime</span> --}}
                    </div>

                    <!-- Navigation Links -->
                    <div class="flex items-center space-x-8">
                        <a href="#" class="nav-item text-black font-bold hover:text-cyan-500">Home</a>
                        <a href="#" class="nav-item text-gray-600 hover:text-cyan-500">Services</a>
                        <a href="#" class="nav-item text-gray-600 hover:text-cyan-500">Promotion</a>
                        <a href="#" class="nav-item text-gray-600 hover:text-cyan-500">Testimonials</a>

                        <!-- Login & Register Buttons -->
                        <div class="flex space-x-4">
                            <a href="{{ route('login') }}"
                                class="btn-transition bg-cyan-500 text-white px-6 py-3 rounded-full hover:bg-cyan-600">
                                Login
                            </a>
                            <a href="{{ route('register') }}"
                                class="btn-transition bg-gray-100 text-cyan-500 px-6 py-3 rounded-full hover:bg-gray-200 border border-cyan-500">
                                Register
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    @endif

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    @if (!isset($hideFooter) || !$hideFooter)
        <footer class="bg-gray-900 text-white">
            <div class="container mx-auto px-4 py-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div>
                        <h3 class="text-xl font-bold mb-4">Contact Us</h3>
                        <p>Email: info@cleantime.com</p>
                        <p>Phone: +1-234-567-8900</p>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-4">Quick Links</h3>
                        <ul class="space-y-2">
                            <li><a href="#" class="hover:text-cyan-500">Services</a></li>
                            <li><a href="#" class="hover:text-cyan-500">Book Now</a></li>
                        </ul>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold mb-4">Follow Us</h3>
                        <div class="flex space-x-4">
                            <a href="#" class="hover:text-cyan-500"><i class="fab fa-facebook"></i></a>
                            <a href="#" class="hover:text-cyan-500"><i class="fab fa-twitter"></i></a>
                            <a href="#" class="hover:text-cyan-500"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="mt-8 text-center">
                    <p>&copy; {{ date('Y') }} CleanTime. Kelompok 2.</p>
                </div>
            </div>
        </footer>
    @endif
</body>

</html>
