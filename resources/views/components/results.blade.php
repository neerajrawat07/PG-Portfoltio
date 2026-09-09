<?php $results = \App\Data\Portfolio::caseStudy()['results']; ?>
<section class="sec relative overflow-hidden">
    <div class="pointer-events-none absolute left-1/2 top-0 h-[26rem] w-[56rem] -translate-x-1/2 rounded-full bg-electric-violet/10 blur-[130px]" data-parallax data-parallax-speed="8" aria-hidden="true"></div>

    <div class="c-x relative">
        <div class="mx-auto max-w-2xl text-center">
            <p class="eyebrow justify-center">Viral Results</p>
            <h2 class="title-display mt-5" data-mask-reveal>Content that <span class="grad-text">Performs</span></h2>
            <p class="mx-auto mt-4 max-w-lg text-ink-soft">Real numbers behind the campaigns — lift in reach, engagement and community growth.</p>
        </div>

        <div class="mt-14 grid grid-cols-2 gap-4 md:grid-cols-3 lg:gap-5">
            @foreach ($results as $i => $m)
                <div class="result-card card p-8 text-center" data-l-reveal="up" style="transition-delay:{{ ($i % 3) * 90 }}ms">
                    <p class="result-stat grad-text">{{ $m['value'] }}</p>
                    <p class="mt-2 text-[11px] font-semibold uppercase tracking-[0.22em] text-ink-muted">{{ $m['label'] }}</p>
                </div>
            @endforeach
        </div>

        <p class="mt-10 text-center text-sm text-ink-muted">
            Measured across a 3-month brand launch engagement — see the full breakdown in the <a href="{{ route('case-study.avni') }}" class="font-semibold text-electric-blue underline-offset-4 hover:underline">Avni case study</a>.
        </p>
    </div>
</section>
