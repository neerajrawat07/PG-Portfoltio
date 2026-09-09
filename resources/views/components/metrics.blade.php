<?php $metrics = \App\Data\Portfolio::metrics(); ?>
<section class="sec--tight relative overflow-hidden border-y border-ink-line bg-paper-soft">
    <div class="pointer-events-none absolute left-1/2 top-1/2 h-[22rem] w-[44rem] -translate-x-1/2 -translate-y-1/2 rounded-full bg-electric-violet/10 blur-[120px]" data-parallax data-parallax-speed="9" aria-hidden="true"></div>
    <div class="c-x relative grid grid-cols-2 gap-y-10 md:grid-cols-4">
        @foreach ($metrics as $i => $m)
            <div class="relative px-4 text-center" data-l-reveal="up" style="transition-delay:{{ $i * 100 }}ms">
                @if (!$loop->first)
                    <span class="absolute left-0 top-1/2 hidden h-10 w-px -translate-y-1/2 bg-ink-line md:block" aria-hidden="true"></span>
                @endif
                <p class="metric__num grad-text" data-count="{{ $m['value'] }}"
                   data-decimal="{{ $m['decimal'] }}" data-suffix="{{ $m['suffix'] }}">
                    0{{ $m['suffix'] }}
                </p>
                <span class="metric-bar" style="--bar-ms: {{ $i * 140 }}ms" aria-hidden="true"></span>
                <p class="mt-2 text-xs font-semibold uppercase tracking-[0.24em] text-ink-muted">{{ $m['label'] }}</p>
            </div>
        @endforeach
    </div>
</section>
