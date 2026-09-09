<?php $skills = \App\Data\Portfolio::skills(); ?>
<section class="sec relative overflow-hidden">
    <!-- 3D floating geometry (Three.js, lazily mounted) -->
    <div class="absolute inset-0 pointer-events-none" id="skillsCanvas" aria-hidden="true"></div>
    <div class="pointer-events-none absolute -left-40 top-1/3 h-[26rem] w-[26rem] rounded-full bg-electric-cyan/10 blur-[120px]" data-parallax data-parallax-speed="12" aria-hidden="true"></div>

    <div class="c-x relative">
        <div class="max-w-2xl">
            <p class="eyebrow">Professional Highlights</p>
            <h2 class="title-display mt-5" data-mask-reveal>Skills &amp; <span class="grad-text">Capabilities</span></h2>
            <p class="mt-5 text-ink-soft">The craft behind the campaigns — from strategy and management to the tools that make it all run.</p>
        </div>

        <div class="mt-14 grid gap-6 lg:grid-cols-2">
            @foreach ([['Marketing', $skills['marketing']], ['Tools', $skills['tools']]] as $i => [$group, $list])
                <div class="card card--pad" data-l-reveal="up" style="transition-delay:{{ $i * 100 }}ms">
                    <div class="flex items-center justify-between">
                        <h3 class="font-display text-lg font-semibold">{{ $group }}</h3>
                        <span class="text-xs font-semibold uppercase tracking-[0.2em] text-ink-faint">0{{ $i + 1 }}</span>
                    </div>

                    <div class="mt-7 space-y-6">
                        @foreach ($list as $k => $skill)
                            <div>
                                <div class="mb-2 flex items-center justify-between">
                                    <p class="text-sm font-medium text-ink-soft">{{ $skill['label'] }}</p>
                                    <span class="font-display text-sm font-bold" data-skill-num>{{ $skill['value'] }}%</span>
                                </div>
                                <div class="skill-bar" data-skill-bar="{{ $skill['value'] }}"
                                     style="--bar-c: {{ $skill['color'] }}; --bar-c2: {{ $skill['color'] }}">
                                    <span></span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Extra highlights -->
        <div class="mt-8 grid gap-6 md:grid-cols-3" data-l-reveal="up">
            <div class="card card--pad card--hover">
                <p class="font-display text-2xl font-bold grad-text">4.9★</p>
                <p class="mt-1 font-display text-base font-semibold">Engagement Growth</p>
                <p class="mt-2 text-sm text-ink-muted">Driving consistent audience growth across multiple brand campaigns.</p>
            </div>
            <div class="card card--pad card--hover">
                <p class="font-display text-2xl font-bold grad-text--cyan">1.5+ Yr</p>
                <p class="mt-1 font-display text-base font-semibold">Work Integration</p>
                <p class="mt-2 text-sm text-ink-muted">Delivering value through collaborative teamwork and data-led decisions.</p>
            </div>
            <div class="card card--pad card--hover">
                <p class="font-display text-2xl font-bold">✦ Content</p>
                <p class="mt-1 font-display text-base font-semibold">Creation Output</p>
                <div class="mt-4 grid grid-cols-2 gap-4">
                    @foreach ($skills['creation'] as $c)
                        <div>
                            <p class="font-display text-lg font-bold">{{ $c['value'] }}</p>
                            <p class="text-[11px] font-semibold uppercase tracking-[0.16em] text-ink-muted">{{ $c['label'] }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
