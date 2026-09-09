<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Red Bull — Gives You Wings. An immersive 3D experience.">
    <title>@yield('title', 'Red Bull | Gives You Wings')</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Custom Styles -->
    <link rel="stylesheet" href="{{ asset('redbull/css/style.css') }}">
    @stack('styles')
</head>
<body class="rb-body">
    <!-- Fixed 3D canvas background -->
    <canvas id="rb-scene"></canvas>
    <!-- Scroll progress bar -->
    <div class="rb-progress" id="rb-progress"></div>

    <!-- Preloader -->
    <div class="rb-preloader" id="rb-preloader">
        <div class="rb-preloader-inner">
            <div class="rb-bulls">
                <span></span><span></span>
            </div>
            <p class="rb-preloader-text">Red Bull</p>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="rb-nav" id="rb-nav">
        <div class="rb-nav-inner">
            <a href="#hero" class="rb-brand">
                <span class="rb-brand-bull">
                    <span></span><span></span>
                </span>
                <span class="rb-brand-name">RED&nbsp;BULL</span>
            </a>
            <ul class="rb-nav-links">
                <li><a href="#stats">Energy</a></li>
                <li><a href="#products">Products</a></li>
                <li><a href="#athletes">Athletes</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li><a href="#cta" class="rb-nav-cta">Get Wings</a></li>
            </ul>
            <button class="rb-hamburger" id="rb-hamburger" aria-label="Menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </nav>

    <!-- Mobile menu overlay -->
    <div class="rb-mobile-menu" id="rb-mobile-menu">
        <ul>
            <li><a href="#hero">Home</a></li>
            <li><a href="#stats">Energy</a></li>
            <li><a href="#products">Products</a></li>
            <li><a href="#athletes">Athletes</a></li>
            <li><a href="#gallery">Gallery</a></li>
            <li><a href="#cta">Get Wings</a></li>
        </ul>
    </div>

    <!-- Page content -->
    <main>
        @yield('content')
    </main>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    <script src="{{ asset('redbull/js/scene.js') }}"></script>
    <script src="{{ asset('redbull/js/main.js') }}"></script>
    @stack('scripts')
</body>
</html>
