<div class="m-menu" id="mobileMenu" aria-hidden="true">
    <nav class="w-full max-w-md mx-auto" aria-label="Mobile">
        @foreach (\App\Data\Portfolio::nav() as $link)
            <a href="{{ $link['href'] }}" class="m-menu__link pb-3 mb-4 border-b border-ink-line">{{ $link['label'] }}</a>
        @endforeach

        <div class="mt-8 flex flex-col gap-4">
            <a href="#contact" class="btn btn-solid w-fit mt-4">Let's Talk</a>
            <a href="{{ route('case-study.avni') }}" class="btn btn-ghost w-fit">View the Case Study →</a>
            <div class="flex gap-3 mt-2">
                @foreach (\App\Data\Portfolio::socials() as $s)
                    <a href="{{ $s['href'] }}" target="_blank" rel="noopener noreferrer"
                       class="rounded-full border border-ink-line px-4 py-2 text-sm text-ink-soft transition hover:border-electric-blue hover:text-electric-blue">
                        {{ $s['label'] }}
                    </a>
                @endforeach
            </div>
        </div>
    </nav>
</div>