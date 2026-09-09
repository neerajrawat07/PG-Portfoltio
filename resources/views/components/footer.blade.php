<footer class="footer">
    <div class="c-x relative">
        {{-- Big gradient watermark --}}
        <div class="footer__watermark" aria-hidden="true">Let's<br />Connect</div>

        <div class="footer__top">
            <div>
                <p class="eyebrow">Designed &amp; built with intention</p>
                <a href="#contact" class="footer__cta group">
                    Have a project in mind?
                    <span class="footer__cta-link" data-magnetic>
                        Let's talk
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                            <path d="M7 17L17 7M17 7H8M17 7v9" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </a>
            </div>
        </div>

        <div class="footer__bottom">
            <a href="/" class="font-display text-sm font-bold" aria-label="Priyanka Garg — home">
                Priyanka&nbsp;<span class="grad-text">Garg</span>
            </a>

            <nav class="footer__nav" aria-label="Footer">
                @foreach (\App\Data\Portfolio::nav() as $link)
                    <a href="{{ $link['href'] }}" class="transition hover:text-electric-blue">{{ $link['label'] }}</a>
                @endforeach
            </nav>

            <p class="text-sm text-ink-muted">© {{ date('Y') }} Priyanka Garg. All rights reserved.</p>
        </div>
    </div>
</footer>