/**
 * Derjoint Healthcare Admin Dashboard JavaScript
 * Handles sidebar toggle, interactions, and dynamic features
 */

// Wait for DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {

    // ================================
    // Sidebar Toggle Functionality
    // ================================
    const sidebarToggle = document.getElementById('sidebarToggle');
    const sidebar = document.querySelector('.admin-sidebar');
    const adminWrapper = document.querySelector('.admin-wrapper');

    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', function() {
            if (window.innerWidth <= 768) {
                // On mobile, show/hide sidebar
                sidebar.classList.toggle('show');
            } else {
                // On desktop, collapse sidebar
                sidebar.classList.toggle('collapsed');
                adminWrapper.classList.toggle('sidebar-collapsed');
            }
        });
    }

    // Close sidebar when clicking outside on mobile
    document.addEventListener('click', function(event) {
        if (window.innerWidth <= 768) {
            const isClickInsideSidebar = sidebar && sidebar.contains(event.target);
            const isClickOnToggle = sidebarToggle && sidebarToggle.contains(event.target);

            if (!isClickInsideSidebar && !isClickOnToggle && sidebar && sidebar.classList.contains('show')) {
                sidebar.classList.remove('show');
            }
        }
    });

    // ================================
    // Submenu Toggle
    // ================================
    const submenuToggles = document.querySelectorAll('.nav-link[data-bs-toggle="collapse"]');

    submenuToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            const targetSubmenu = document.querySelector(targetId);

            if (targetSubmenu) {
                // Toggle the submenu
                targetSubmenu.classList.toggle('show');

                // Update aria-expanded
                const isExpanded = targetSubmenu.classList.contains('show');
                this.setAttribute('aria-expanded', isExpanded);
            }
        });
    });

    // ================================
    // Auto-dismiss alerts
    // ================================
    const alerts = document.querySelectorAll('.alert-dismissible');

    alerts.forEach(alert => {
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        }, 5000); // Auto-dismiss after 5 seconds
    });

    // ================================
    // Form Validation Enhancement
    // ================================
    const forms = document.querySelectorAll('form[data-validate="true"]');

    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            if (!form.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
            }
            form.classList.add('was-validated');
        });
    });

    // ================================
    // Image Preview Functionality
    // ================================
    const imageInputs = document.querySelectorAll('input[type="file"][accept*="image"]');

    imageInputs.forEach(input => {
        input.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    // Find the preview element (if exists)
                    const previewId = input.getAttribute('data-preview');
                    if (previewId) {
                        const preview = document.getElementById(previewId);
                        if (preview) {
                            preview.src = e.target.result;
                        }
                    }
                };

                reader.readAsDataURL(file);
            }
        });
    });

    // ================================
    // Confirm Dialog for Dangerous Actions
    // ================================
    const dangerousActions = document.querySelectorAll('[data-confirm]');

    dangerousActions.forEach(action => {
        action.addEventListener('click', function(e) {
            const message = this.getAttribute('data-confirm') || 'Are you sure you want to proceed?';
            if (!confirm(message)) {
                e.preventDefault();
                return false;
            }
        });
    });

    // ================================
    // Tooltips Initialization
    // ================================
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // ================================
    // Stats Animation on Scroll
    // ================================
    const statsCards = document.querySelectorAll('.stats-card');

    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '0';
                entry.target.style.transform = 'translateY(20px)';

                setTimeout(() => {
                    entry.target.style.transition = 'all 0.5s ease';
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, 100);

                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    statsCards.forEach(card => {
        observer.observe(card);
    });

    // ================================
    // Table Search Functionality
    // ================================
    const tableSearchInputs = document.querySelectorAll('input[data-table-search]');

    tableSearchInputs.forEach(input => {
        const tableId = input.getAttribute('data-table-search');
        const table = document.getElementById(tableId);

        if (table) {
            input.addEventListener('keyup', function() {
                const searchTerm = this.value.toLowerCase();
                const rows = table.querySelectorAll('tbody tr');

                rows.forEach(row => {
                    const text = row.textContent.toLowerCase();
                    row.style.display = text.includes(searchTerm) ? '' : 'none';
                });
            });
        }
    });

    // ================================
    // Active Menu Item Highlighting
    // ================================
    const currentPath = window.location.pathname;
    const menuLinks = document.querySelectorAll('.sidebar-nav .nav-link');

    menuLinks.forEach(link => {
        const href = link.getAttribute('href');
        if (href && href !== '#' && currentPath.includes(href)) {
            link.classList.add('active');

            // Expand parent submenu if exists
            const parentSubmenu = link.closest('.submenu');
            if (parentSubmenu) {
                parentSubmenu.classList.add('show');
                const parentToggle = document.querySelector(`[href="#${parentSubmenu.id}"]`);
                if (parentToggle) {
                    parentToggle.setAttribute('aria-expanded', 'true');
                }
            }
        }
    });

    // ================================
    // Dynamic Counter Animation
    // ================================
    function animateCounter(element, start, end, duration) {
        let startTimestamp = null;
        const step = (timestamp) => {
            if (!startTimestamp) startTimestamp = timestamp;
            const progress = Math.min((timestamp - startTimestamp) / duration, 1);
            const value = Math.floor(progress * (end - start) + start);
            element.textContent = value;
            if (progress < 1) {
                window.requestAnimationFrame(step);
            }
        };
        window.requestAnimationFrame(step);
    }

    // Animate counters on page load
    const counters = document.querySelectorAll('.stats-value');
    counters.forEach(counter => {
        const target = parseInt(counter.textContent);
        if (!isNaN(target)) {
            animateCounter(counter, 0, target, 1000);
        }
    });

    // ================================
    // Handle Responsive Sidebar
    // ================================
    function handleResize() {
        if (window.innerWidth > 768) {
            // Desktop view
            if (sidebar) {
                sidebar.classList.remove('show');
            }
        } else {
            // Mobile view
            if (sidebar && adminWrapper) {
                sidebar.classList.remove('collapsed');
                adminWrapper.classList.remove('sidebar-collapsed');
            }
        }
    }

    // Initial check
    handleResize();

    // Listen for window resize
    window.addEventListener('resize', handleResize);

    // ================================
    // Notification Badge Update
    // ================================
    function updateNotificationBadge(count) {
        const badge = document.querySelector('.header-icon .badge');
        if (badge) {
            badge.textContent = count;
            if (count > 0) {
                badge.style.display = 'inline-block';
            } else {
                badge.style.display = 'none';
            }
        }
    }

    // ================================
    // Loading State for Forms
    // ================================
    const formsWithLoading = document.querySelectorAll('form[data-loading="true"]');

    formsWithLoading.forEach(form => {
        form.addEventListener('submit', function() {
            const submitButton = form.querySelector('button[type="submit"]');
            if (submitButton) {
                submitButton.disabled = true;
                submitButton.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Processing...';
            }
        });
    });

    // ================================
    // Copy to Clipboard
    // ================================
    const copyButtons = document.querySelectorAll('[data-copy]');

    copyButtons.forEach(button => {
        button.addEventListener('click', function() {
            const textToCopy = this.getAttribute('data-copy');
            navigator.clipboard.writeText(textToCopy).then(() => {
                // Show success message
                const originalText = this.innerHTML;
                this.innerHTML = '<i class="fas fa-check me-2"></i> Copied!';
                this.classList.add('btn-success');

                setTimeout(() => {
                    this.innerHTML = originalText;
                    this.classList.remove('btn-success');
                }, 2000);
            });
        });
    });

    // ================================
    // Print Functionality
    // ================================
    const printButtons = document.querySelectorAll('[data-print]');

    printButtons.forEach(button => {
        button.addEventListener('click', function() {
            window.print();
        });
    });

    // ================================
    // Dark Mode Toggle (Optional)
    // ================================
    const darkModeToggle = document.getElementById('darkModeToggle');

    if (darkModeToggle) {
        // Check for saved dark mode preference
        const darkMode = localStorage.getItem('darkMode');
        if (darkMode === 'enabled') {
            document.body.classList.add('dark-mode');
        }

        darkModeToggle.addEventListener('click', function() {
            document.body.classList.toggle('dark-mode');

            // Save preference
            if (document.body.classList.contains('dark-mode')) {
                localStorage.setItem('darkMode', 'enabled');
            } else {
                localStorage.setItem('darkMode', 'disabled');
            }
        });
    }

    // ================================
    // Console Welcome Message
    // ================================
    console.log('%cD\'VACOS Admin Dashboard', 'color: #667eea; font-size: 24px; font-weight: bold;');
    console.log('%cWelcome to the admin panel!', 'color: #764ba2; font-size: 14px;');
});

// ================================
// Global Utility Functions
// ================================

// Show toast notification
function showToast(message, type = 'success') {
    const toastHTML = `
        <div class="toast align-items-center text-white bg-${type} border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    ${message}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    `;

    // Create toast container if it doesn't exist
    let toastContainer = document.querySelector('.toast-container');
    if (!toastContainer) {
        toastContainer = document.createElement('div');
        toastContainer.className = 'toast-container position-fixed top-0 end-0 p-3';
        document.body.appendChild(toastContainer);
    }

    // Add toast to container
    toastContainer.insertAdjacentHTML('beforeend', toastHTML);

    // Show the toast
    const toastElement = toastContainer.lastElementChild;
    const toast = new bootstrap.Toast(toastElement);
    toast.show();

    // Remove toast after it's hidden
    toastElement.addEventListener('hidden.bs.toast', function() {
        toastElement.remove();
    });
}

// Confirm action
function confirmAction(message, callback) {
    if (confirm(message)) {
        if (typeof callback === 'function') {
            callback();
        }
    }
}

// Format number with commas
function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

// Get CSRF token
function getCsrfToken() {
    const token = document.querySelector('meta[name="csrf-token"]');
    return token ? token.getAttribute('content') : '';
}
