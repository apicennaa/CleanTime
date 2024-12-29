<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm py-3">
    <div class="container-fluid">
        {{-- Mobile Toggle Sidebar --}}
        <button class="btn btn-outline-primary d-md-none me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
            <i class="bi bi-list"></i>
        </button>

        {{-- Page Title --}}
        <h1 class="navbar-brand mb-0 me-auto">
            @yield('page_title', 'Dashboard')
        </h1>

        {{-- Navbar Actions --}}
        <div class="d-flex align-items-center">
            {{-- Notification Dropdown --}}
            <div class="dropdown me-3">
                <button class="btn btn-outline-secondary position-relative" type="button" data-bs-toggle="dropdown">
                    <i class="bi bi-bell"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        3
                        <span class="visually-hidden">unread notifications</span>
                    </span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="#">New order received</a></li>
                    <li><a class="dropdown-item" href="#">Cleaner assigned</a></li>
                    <li><a class="dropdown-item" href="#">Payment completed</a></li>
                </ul>
            </div>

            {{-- User Profile Dropdown --}}
            <div class="dropdown">
                <button class="btn btn-outline-primary dropdown-toggle d-flex align-items-center" type="button" data-bs-toggle="dropdown">
                    <img src="{{ auth()->user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}" 
                         class="rounded-circle me-2" width="32" height="32">
                    <span class="d-none d-md-block">{{ auth()->user()->name }}</span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">
                        <i class="bi bi-person me-2"></i>Profile
                    </a></li>
                    <li><a class="dropdown-item" href="{{ route('settings') }}">
                        <i class="bi bi-gear me-2"></i>Settings
                    </a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" class="m-0">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger">
                                <i class="bi bi-box-arrow-right me-2"></i>Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>