<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'CleanTime') }}</title>

    {{-- Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f4f6f9;
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
        }

        .content-wrapper {
            margin-left: 250px;
            transition: margin-left 0.3s ease;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                position: fixed;
                z-index: 1050;
            }

            .content-wrapper {
                margin-left: 0;
            }

            .sidebar.show {
                transform: translateX(0);
            }
        }

        .sidebar-link {
            color: rgba(255,255,255,0.7);
            transition: all 0.3s ease;
        }

        .sidebar-link:hover {
            color: white;
            background-color: rgba(255,255,255,0.1);
        }

        .navbar {
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.08);
        }

        .dropdown-menu {
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            {{-- Sidebar --}}
            <div class="col-md-3 col-lg-2 sidebar d-md-block bg-dark p-0" id="sidebar">
                <div class="position-sticky">
                    <div class="d-flex flex-column">
                        <a href="{{ route('dashboard') }}" class="text-center text-white text-decoration-none p-4 border-bottom">
                            <h2 class="mb-0">CleanTime</h2>
                        </a>

                        <ul class="nav flex-column p-2">
                            <li class="nav-item">
                                <a class="nav-link sidebar-link d-flex align-items-center" href="{{ route('dashboard') }}">
                                    <i class="bi bi-speedometer2 me-2"></i> Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link sidebar-link d-flex align-items-center" href="{{ route('cleaners.index') }}">
                                    <i class="bi bi-people me-2"></i> Cleaners
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link sidebar-link d-flex align-items-center" href="{{ route('orders.index') }}">
                                    <i class="bi bi-list-task me-2"></i> Orders
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link sidebar-link d-flex align-items-center" href="{{ route('services.index') }}">
                                    <i class="bi bi-tools me-2"></i> Services
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Main Content --}}
            <div class="col-md-9 ms-sm-auto col-lg-10 content-wrapper px-4">
                {{-- Navbar --}}
                <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
                    <div class="container-fluid">
                        {{-- Mobile Toggle --}}
                        <button class="navbar-toggler d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="d-flex justify-content-between w-100 align-items-center">
                            <h1 class="h4 mb-0 d-none d-md-block">@yield('page_title', 'Dashboard')</h1>

                            {{-- User Dropdown --}}
                            <div class="dropdown">
                                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ auth()->user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}" 
                                         class="rounded-circle me-2" width="32" height="32">
                                    <span class="d-none d-md-block">{{ auth()->user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="bi bi-person me-2"></i>Profile</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                                            @csrf
                                            <button type="submit" class="dropdown-item">
                                                <i class="bi bi-box-arrow-right me-2"></i>Logout
                                            </button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>

                {{-- Content Area --}}
                <main class="py-4">
                    @yield('content')
                </main>

                {{-- Footer --}}
                <footer class="mt-4 py-3 text-center">
                    <p class="text-muted mb-0">
                        &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
                    </p>
                </footer>
            </div>
        </div>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>