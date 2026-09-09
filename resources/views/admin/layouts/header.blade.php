<header class="admin-header">
    <div class="header-left">
        <button class="sidebar-toggle" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>
        <h1 class="header-title">@yield('page-title', 'Dashboard')</h1>
    </div>

    <div class="header-right">
        <!-- Notifications Dropdown - Hidden as requested -->
        <div class="dropdown header-dropdown" style="display: none;">
            <button class="btn btn-link header-icon" type="button" id="notificationsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-bell"></i>
                <span class="badge badge-danger">3</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationsDropdown">
                <li class="dropdown-header">Notifications</li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-envelope me-2"></i> New message received</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> New user registered</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-exclamation-circle me-2"></i> System alert</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-center" href="#">View all notifications</a></li>
            </ul>
        </div>

        <!-- User Profile Dropdown -->
        <div class="dropdown header-dropdown">
            <button class="btn btn-link header-user" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                @if(Auth::user()->profile_image)
                    <img src="{{ asset(Auth::user()->profile_image) }}" alt="Profile" class="user-avatar">
                @else
                    <img src="{{ asset('Admin/images/default-avatar.png') }}" alt="Profile" class="user-avatar">
                @endif
                <span class="user-name">{{ Auth::user()->name }}</span>
                <i class="fas fa-chevron-down ms-2"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li class="dropdown-header">
                    <div class="text-center">
                        @if(Auth::user()->profile_image)
                            <img src="{{ asset(Auth::user()->profile_image) }}" alt="Profile" class="dropdown-user-avatar">
                        @else
                            <img src="{{ asset('Admin/images/default-avatar.png') }}" alt="Profile" class="dropdown-user-avatar">
                        @endif
                        <div class="mt-2">
                            <strong>{{ Auth::user()->name }}</strong>
                            <div class="text-muted small">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profile</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form method="POST" action="{{ route('admin.logout') }}" id="logout-form-header">
                        @csrf
                        <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form-header').submit();">
                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>
