<?php $hero = \App\Data\Portfolio::hero(); $socials = \App\Data\Portfolio::socials(); ?>
<section class="hero" id="top">
    <!-- Soft editorial grid backdrop -->
    <div class="hero__grid" aria-hidden="true"></div>

    <!-- Abstract 3D object (Three.js, lazily mounted) -->
    <div class="hero__canvas" id="heroCanvas" aria-hidden="true"></div>

    <div class="c-x relative z-10 grid items-center gap-16 lg:grid-cols-[1.05fr_0.95fr]">
        <!-- ===== LEFT : copy ===== -->
        <div>
            <p class="hero__eyebrow hero-stagger" data-h-s="0">
                <b>●</b>&nbsp; Digital Marketing&nbsp;&nbsp;•&nbsp;&nbsp;Social Media&nbsp;&nbsp;•&nbsp;&nbsp;Creative Strategy
            </p>

            <h1 class="hero__name mt-7">
                <span class="line-mask" data-h-l="0"><span>Priyanka</span></span>
                <span class="line-mask" data-h-l="1"><span class="hero__name-accent">Garg.</span></span>
            </h1>

            <p class="hero__role mt-6 hero-stagger" data-h-s="1">Social Media Marketing Executive · New Delhi</p>

            <p class="hero__statement mt-5 hero-stagger" data-h-s="2">
                Turning ideas into <em>digital experiences</em> people remember.
            </p>

            <p class="mt-5 max-w-xl text-[1.05rem] leading-relaxed text-ink-soft hero-stagger" data-h-s="3">
                {{ $hero['intro'] }}
            </p>

            <div class="mt-9 flex flex-wrap items-center gap-4 hero-stagger" data-h-s="4">
                <a href="#contact" class="btn btn-solid" data-magnetic>Let's Work Together <span aria-hidden="true">→</span></a>
                <a href="#portfolio" class="btn btn-ghost" data-magnetic>View My Work</a>
            </div>

            <div class="mt-9 flex items-center gap-5 hero-stagger" data-h-s="5">
                <span class="text-xs font-semibold uppercase tracking-[0.22em] text-ink-faint">Follow</span>
                <span class="h-px w-10 bg-ink-line" aria-hidden="true"></span>
                @foreach ($socials as $s)
                    <a href="{{ $s['href'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $s['label'] }}"
                       class="grid h-11 w-11 place-items-center rounded-full border border-ink-line bg-white font-display text-xs font-bold text-ink-soft transition hover:-translate-y-0.5 hover:border-electric-blue hover:text-electric-blue">
                        {{ strtoupper(substr($s['label'], 0, 2)) }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- ===== RIGHT : portrait ===== -->
        <div class="hero-stagger relative" data-h-s="6">
            <div class="hero__portrait">
                <div class="hero__frame-ring" aria-hidden="true"></div>
                <div class="hero__portrait-inner">
                    <img src="{{ \App\Data\Portfolio::IMG_PORTRAIT }}" alt="Priyanka Garg, Social Media Marketing Executive" loading="eager" width="800" height="1000" />
                    <span class="hero__badge" style="position:absolute; top:1.2rem; left:1.2rem; z-index:2;">
                        <span class="inline-block h-2 w-2 rounded-full bg-emerald-500"></span> Available
                    </span>
                </div>

                <!-- Floating metadata -->
                <div class="hero__float hidden sm:flex" style="top:16%; left:-3rem; animation:float 6s ease-in-out infinite; z-index:3;">
                    <span class="hero__float-num grad-text">✦</span>
                    <div>
                        <p class="hero__float-label">Social</p>
                        <p class="font-display text-sm font-semibold">Strategy</p>
                    </div>
                </div>
                <div class="hero__float hidden sm:flex" style="bottom:24%; right:-2.6rem; animation:float 7s ease-in-out 1s infinite; z-index:3;">
                    <div>
                        <p class="hero__float-num">500K+</p>
                        <p class="hero__float-label">Total Reach</p>
                    </div>
                </div>
                <div class="hero__float hidden sm:flex" style="top:4%; right:10%; animation:float 5.5s ease-in-out 0.4s infinite; z-index:3;">
                    <span class="hero__float-num grad-text--cyan">4.9★</span>
                    <div>
                        <p class="hero__float-label">Engagement</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="hero__scroll-hint" aria-hidden="true">
        <span>Scroll</span>
        <span class="wheel"></span>
    </div>
</section>
