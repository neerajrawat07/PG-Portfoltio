<?php $experience = \App\Data\Portfolio::experience(); ?>
<section class="sec" id="experience">
    <div class="c-x">
        <div class="grid gap-12 lg:grid-cols-[0.85fr_1.15fr] lg:gap-16">
            <!-- LEFT : sticky heading -->
            <div class="lg:sticky lg:top-28 lg:self-start">
                <p class="eyebrow">My Career Journey</p>
                <h2 class="title-display mt-5">Experience &amp; <span class="grad-text">Milestones</span></h2>
                <p class="mt-5 max-w-sm text-ink-soft">From my BCA foundation to leading end-to-end social strategies for high-growth brands.</p>

                <div class="mt-10 flex items-center gap-6">
                    <div class="card card--pad text-center">
                        <p class="result-stat grad-text">1.5+</p>
                        <p class="mt-1 text-[11px] font-semibold uppercase tracking-[0.2em] text-ink-muted">Years Exp</p>
                    </div>
                    <div class="card card--pad text-center">
                        <p class="result-stat grad-text--cyan">500K+</p>
                        <p class="mt-1 text-[11px] font-semibold uppercase tracking-[0.2em] text-ink-muted">Reach</p>
                    </div>
                </div>
            </div>

            <!-- RIGHT : timeline -->
            <div class="tl">
                @foreach ($experience as $i => $job)
                    <article class="tl-item" data-l-reveal="up" style="transition-delay:{{ ($i % 3) * 80 }}ms">
                        <span class="tl-dot" aria-hidden="true"></span>
                        <div class="flex flex-wrap items-center justify-between gap-3">
                            <span class="tl-tag">{{ $job['period'] }}</span>
                            <span class="tl-year" aria-hidden="true">{{ $job['period'] }}</span>
                        </div>
                        <h3 class="font-display text-xl font-semibold">{{ $job['title'] }}</h3>
                        <p class="mt-2 text-ink-soft">{{ $job['body'] }}</p>
                        <ul class="mt-4 flex flex-wrap gap-2">
                            @foreach ($job['items'] as $item)
                                <li class="tl-chip">{{ $item }}</li>
                            @endforeach
                        </ul>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
</section>
