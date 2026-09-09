<footer class="border-t border-ink-line bg-white py-10">
    <div class="c-x flex flex-col items-center justify-between gap-6 md:flex-row">
        <p class="font-display text-sm font-bold">
            Priyanka&nbsp;<span class="grad-text">Garg</span>
        </p>

        <nav class="flex flex-wrap justify-center gap-x-6 gap-y-2 text-sm text-ink-muted" aria-label="Footer">
            @foreach (\App\Data\Portfolio::nav() as $link)
                <a href="{{ $link['href'] }}" class="transition hover:text-electric-blue">{{ $link['label'] }}</a>
            @endforeach
        </nav>

        <p class="text-sm text-ink-muted">© {{ date('Y') }} Priyanka Garg. All rights reserved.</p>
    </div>
</footer>