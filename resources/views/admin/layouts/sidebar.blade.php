<aside class="admin-sidebar">
    <div class="sidebar-brand">
        <a href="{{ route('admin.dashboard') }}" class="brand-link">
            <span class="brand-text">D'vacos Admin</span>
        </a>
    </div>

    <nav class="sidebar-nav">
        <ul class="nav flex-column" id="sidebarMenu">
            <!-- Dashboard -->
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- CMS Management -->
            <li class="nav-item">
                <a href="#cmsSubmenu" class="nav-link collapsed" data-toggle="collapse" aria-expanded="false">
                    <i class="fas fa-cog"></i>
                    <span>CMS Management</span>
                    <i class="fas fa-chevron-down ms-auto toggle-icon"></i>
                </a>
                <ul class="collapse submenu" id="cmsSubmenu">
                    <li><a href="#" class="nav-link"><i class="fas fa-circle"></i> Header</a></li>
                    <li><a href="#" class="nav-link"><i class="fas fa-circle"></i> Footer</a></li>
                    <li><a href="#" class="nav-link"><i class="fas fa-circle"></i> Sliders</a></li>
                    <li><a href="#" class="nav-link"><i class="fas fa-circle"></i> Products</a></li>
                    <li><a href="#" class="nav-link"><i class="fas fa-circle"></i> Features</a></li>
                </ul>
            </li>

            <!-- Pages Management -->
            <li class="nav-item">
                <a href="#pagesSubmenu" class="nav-link collapsed" data-toggle="collapse" aria-expanded="false">
                    <i class="fas fa-file-alt"></i>
                    <span>Pages</span>
                    <i class="fas fa-chevron-down ms-auto toggle-icon"></i>
                </a>
                <ul class="collapse submenu" id="pagesSubmenu">
                    <li><a href="#" class="nav-link"><i class="fas fa-circle"></i> About Page</a></li>
                    <li><a href="#" class="nav-link"><i class="fas fa-circle"></i> Gallery</a></li>
                    <li><a href="#" class="nav-link"><i class="fas fa-circle"></i> Policy Pages</a></li>
                </ul>
            </li>

            <!-- Product Page Management -->
            <li class="nav-item">
                <a href="#productSubmenu" class="nav-link collapsed" data-toggle="collapse" aria-expanded="false">
                    <i class="fas fa-box-open"></i>
                    <span>Product Page</span>
                    <i class="fas fa-chevron-down ms-auto toggle-icon"></i>
                </a>
                <ul class="collapse submenu" id="productSubmenu">
                    <li><a href="#" class="nav-link"><i class="fas fa-circle"></i> Product List</a></li>
                    <li><a href="#" class="nav-link"><i class="fas fa-circle"></i> Add Product</a></li>
                </ul>
            </li>

            <!-- Testimonials -->
            <li class="nav-item">
                <a href="{{ route('admin.testimonials.index') }}"
                   class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}">
                    <i class="fas fa-quote-left"></i>
                    <span>Testimonials</span>
                </a>
            </li>

            <!-- Contact Messages -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-envelope"></i>
                    <span>Contact Messages</span>
                </a>
            </li>

            <!-- Privacy Policy -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-user-shield"></i>
                    <span>Privacy Policy</span>
                </a>
            </li>

            <!-- Cookie Policy -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-cookie-bite"></i>
                    <span>Cookie Policy</span>
                </a>
            </li>

            <!-- Terms of Use -->
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fas fa-file-contract"></i>
                    <span>Terms of Use</span>
                </a>
            </li>

            <!-- Profile -->
            <li class="nav-item">
                <a href="{{ route('admin.profile') }}" class="nav-link {{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                    <i class="fas fa-user-circle"></i>
                    <span>Profile</span>
                </a>
            </li>

            <!-- Logout -->
            <li class="nav-item mt-3">
                <form method="POST" action="{{ route('admin.logout') }}" id="logout-form">
                    @csrf
                    <a href="#" class="nav-link text-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </form>
            </li>
        </ul>
    </nav>
</aside>

<style>
    /* Dropdown toggle icon rotation */
    .nav-link .toggle-icon {
        transition: transform 0.3s ease;
    }

    .nav-link[aria-expanded="true"] .toggle-icon {
        transform: rotate(180deg);
    }

    .nav-link.collapsed .toggle-icon {
        transform: rotate(0deg);
    }

    /* Submenu styling */
    .submenu {
        padding-left: 0;
        list-style: none;
    }

    .submenu li {
        padding-left: 20px;
    }

    .submenu .nav-link {
        padding: 8px 15px;
        font-size: 0.9rem;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Simple jQuery-style toggle for dropdowns
        const dropdownToggles = document.querySelectorAll('[data-toggle="collapse"]');

        dropdownToggles.forEach(function(toggle) {
            toggle.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href');
                const target = document.querySelector(targetId);

                if (target) {
                    // Toggle the dropdown
                    if (target.classList.contains('show')) {
                        // Close dropdown
                        target.classList.remove('show');
                        this.classList.add('collapsed');
                        this.setAttribute('aria-expanded', 'false');
                    } else {
                        // Open dropdown
                        target.classList.add('show');
                        this.classList.remove('collapsed');
                        this.setAttribute('aria-expanded', 'true');
                    }
                }
            });
        });

        // Auto-expand if submenu has active link
        document.querySelectorAll('.submenu').forEach(function(submenu) {
            const activeLink = submenu.querySelector('.nav-link.active');
            if (activeLink) {
                submenu.classList.add('show');
                const toggle = document.querySelector('[href="#' + submenu.id + '"]');
                if (toggle) {
                    toggle.classList.remove('collapsed');
                    toggle.setAttribute('aria-expanded', 'true');
                }
            }
        });
    });
</script>
