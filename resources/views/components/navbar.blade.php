<header class="nav" id="navbar" role="banner">
    <div class="c-x flex items-center justify-between">
        <a href="/" class="font-display text-[1.05rem] font-bold tracking-tight" aria-label="Priyanka Garg — home">
            Priyanka&nbsp;<span class="grad-text">Garg</span>
        </a>

        <nav class="nav-links hidden items-center gap-7 lg:flex" aria-label="Primary">
            @foreach (\App\Data\Portfolio::nav() as $link)
                <a href="{{ $link['href'] }}">{{ $link['label'] }}</a>
            @endforeach
        </nav>

        <div class="flex items-center gap-3">
            <a href="#contact" class="btn btn-solid hidden sm:inline-flex" data-magnetic>
                Let's Talk
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M7 17L17 7M17 7H8M17 7v9" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </a>

            <button class="burger flex h-11 w-11 flex-col items-center justify-center gap-[5px] lg:hidden"
                    id="burger" aria-label="Open menu" aria-expanded="false" aria-controls="mobileMenu">
                <span class="burger-line h-[2px] w-6 rounded-full transition-all duration-300"></span>
                <span class="burger-line h-[2px] w-6 rounded-full transition-all duration-300"></span>
            </button>
        </div>
    </div>
</header>