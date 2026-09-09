<?php
    /** @var string $title */
    /** @var string $description */
    $title       = $title       ?? 'Priyanka Garg — Digital Marketing Professional';
    $description = $description ?? 'Portfolio of Priyanka Garg, a Social Media Marketing Executive & content creator in New Delhi — crafting brand strategies, creative campaigns and high-converting content.';
    $canonical   = $canonical   ?? url()->current();
    $bodyClass   = $bodyClass   ?? '';
    $disableReveal = $disableReveal ?? false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover" />
    <meta name="theme-color" content="#F7F7F5" />
    <title>{{ $title }}</title>
    <meta name="description" content="{{ $description }}" />
    <meta name="author" content="Priyanka Garg" />
    <link rel="canonical" href="{{ $canonical }}" />

    <!-- Open Graph -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $title }}" />
    <meta property="og:description" content="{{ $description }}" />
    <meta property="og:url" content="{{ $canonical }}" />
    <meta property="og:image" content="{{ url(\App\Data\Portfolio::IMG_PORTRAIT) }}" />
    <meta property="og:site_name" content="Priyanka Garg" />

    <!-- Twitter / X -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $title }}" />
    <meta name="twitter:description" content="{{ $description }}" />
    <meta name="twitter:image" content="{{ url(\App\Data\Portfolio::IMG_PORTRAIT) }}" />

    <link rel="icon" type="image/x-icon" href="/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;600;700&family=Manrope:wght@400;500;600;700&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="{{ $bodyClass }}">
    <!-- Film grain -->
    <div class="grain" aria-hidden="true"></div>

    <!-- Custom cursor (desktop only, hidden via CSS on touch) -->
    <div class="cursor-ring" aria-hidden="true"></div>
    <div class="cursor-dot" aria-hidden="true"></div>

    @include('components.preloader')

    @include('components.navbar')

    <!-- Mobile fullscreen menu -->
    @include('components.mobile-menu')

    <main id="top">
        @yield('content')
    </main>

    @unless($bodyClass === 'case-study')
        @include('components.footer')
    @endunless

    @stack('scripts')
</body>
</html>