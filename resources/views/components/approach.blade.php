@if(isset($approach))
<section class="sec" id="process">
    <div class="c-x">
        <div class="grid items-start gap-14 lg:grid-cols-2 lg:gap-20">
            <!-- LEFT : label + heading + points -->
            <div class="lg:sticky lg:top-28">
                <p class="eyebrow">{{ $approach['eyebrow'] }}</p>
                <h2 class="title-display mt-5" data-mask-reveal>
                    {{ $approach['titleA'] }}<br />
                    <span class="grad-text">{{ $approach['titleB'] }}</span>
                </h2>
                <p class="mt-6 max-w-md text-lg leading-relaxed text-ink-soft">{{ $approach['blurb'] }}</p>

                <ul class="mt-8 space-y-4">
                    @foreach ($approach['points'] as $pt)
                        <li class="flex items-start gap-4" data-l-reveal="up">
                            <span class="mt-2 h-2 w-2 shrink-0 rotate-45 rounded-[2px] bg-electric-blue" aria-hidden="true"></span>
                            <span class="text-ink-soft">
                                {{ $pt['label'] }}<b class="font-semibold text-ink">{{ $pt['bold'] }}</b>{{ $pt['suffix'] }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- RIGHT : feature blocks -->
            <div class="grid gap-5">
                @foreach ($approach['cards'] as $i => $card)
                    <div class="approach-feature" data-l-reveal="up" style="transition-delay:{{ $i * 90 }}ms">
                        <div class="flex flex-col items-start gap-3">
                            <span class="af-icon" aria-hidden="true">{{ $card['icon'] }}</span>
                            @if ($card['stat'])
                                <span class="af-num">{{ $card['stat'] }}</span>
                            @else
                                <span class="af-num">0{{ $i + 1 }}</span>
                            @endif
                        </div>
                        <div class="relative">
                            <h3 class="font-display text-xl font-semibold leading-tight">{{ $card['title'] }}</h3>
                            @if ($card['stat'])
                                <p class="mt-1 text-sm uppercase tracking-[0.2em] text-ink-muted">Total Reach</p>
                            @elseif (isset($card['blurb']) && $card['blurb'])
                                <p class="mt-2 text-sm text-ink-muted">{{ $card['blurb'] }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif
