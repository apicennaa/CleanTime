<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CleanTime - Professional Cleaning Services</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
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
        
        .lets-talk-btn {
            transition: all 0.3s ease;
            animation: fadeIn 0.5s ease-out;
        }
        
        .lets-talk-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        img.h-8 {
            max-width: 100%;
            height: 150px;
        }

        .h-8 {
            max-block-size: max-content;
        }
    </style>
</head>
<body class="bg-light">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
        <div class="container">
            <!-- Logo -->
            <a class="navbar-brand logo-hover" href="#">
                <img src="{{ asset('image/logo.svg') }}" alt="CleanTime Logo" class="h-8">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navigation Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark fw-bold">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-muted">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-muted">Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-muted">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link text-muted">Contact</a>
                    </li>
                    <!-- Login & Register Buttons -->
                    <li class="nav-item">
                        <a href="{{ route('login') }}" class="btn btn-primary ms-3">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="btn btn-outline-primary ms-3">Register</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5 class="mb-4">Contact Us</h5>
                    <p>Email: info@cleantime.com</p>
                    <p>Phone: +1-234-567-8900</p>
                </div>
                <div class="col-md-4">
                    <h5 class="mb-4">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white text-decoration-none">About Us</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Services</a></li>
                        <li><a href="#" class="text-white text-decoration-none">Book Now</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5 class="mb-4">Follow Us</h5>
                    <a href="#" class="text-white me-3"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="text-white me-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="text-center mt-4">
                <p>&copy; {{ date('Y') }} CleanTime. Kelompok 2.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
