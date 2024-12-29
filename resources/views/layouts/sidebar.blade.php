<div class="offcanvas-md offcanvas-start bg-primary" tabindex="-1" id="sidebar" aria-labelledby="sidebarLabel">
    <div class="offcanvas-header border-bottom border-light">
        <h5 class="offcanvas-title text-white" id="sidebarLabel">
            <i class="bi bi-house-clean me-2"></i>CleanTime
        </h5>
        <button type="button" class="btn-close btn-close-white d-md-none" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('dashboard') ? 'active bg-primary-subtle' : '' }}" 
                   href="{{ route('dashboard') }}">
                    <i class="bi bi-speedometer2 me-2"></i>Dashboard
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('orders*') ? 'active bg-primary-subtle' : '' }}" 
                   href="{{ route('orders.index') }}">
                    <i class="bi bi-list-task me-2"></i>Orders
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('cleaners*') ? 'active bg-primary-subtle' : '' }}" 
                   href="{{ route('cleaners.index') }}">
                    <i class="bi bi-people me-2"></i>Cleaners
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('services*') ? 'active bg-primary-subtle' : '' }}" 
                   href="{{ route('services.index') }}">
                    <i class="bi bi-tools me-2"></i>Services
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link text-white {{ request()->routeIs('customers*') ? 'active bg-primary-subtle' : '' }}" 
                   href="{{ route('customers.index') }}">
                    <i class="bi bi-person-check me-2"></i>Customers
                </a>
            </li>
        </ul>

        <hr class="text-white my-3">

        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('reports') }}">
                    <i class="bi bi-graph-up me-2"></i>Reports
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('settings') }}">
                    <i class="bi bi-gear me-2"></i>Settings
                </a>
            </li>
        </ul>
    </div>

    {{-- Bottom User Info --}}
    <div class="mt-auto p-3 border-top border-light">
        <div class="d-flex align-items-center">
            <img src="{{ auth()->user()->avatar ?? 'https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name) }}" 
                 class="rounded-circle me-3" width="48" height="48">
            <div>
                <h6 class="text-white mb-0">{{ auth()->user()->name }}</h6>
                <small class="text-light-subtle">{{ auth()->user()->email }}</small>
            </div>
        </div>
    </div>
</div>

<style>
    .nav-link.active {
        background-color: rgba(255,255,255,0.1) !important;
        color: white !important;
    }
</style>