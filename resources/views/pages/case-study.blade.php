@extends('layouts.app', [
    'title' => 'Avni Pure Masale — Brand Launch Campaign | Priyanka Garg',
    'description' => 'Case study: how a strategic content, design and social media campaign built a digital identity for Avni Pure Masale.',
    'bodyClass' => 'case-study',
])

@section('content')
    @php $c = $case ?? \App\Data\Portfolio::caseStudy(); @endphp

    {{-- ===== HERO ===== --}}
    <section class="cs-hero">
        <div class="hero__canvas absolute inset-0 !right-0 !top-0 !h-full !w-full !translate-y-0" id="caseCanvas" aria-hidden="true"></div>
        <div class="c-x relative z-10">
            <span class="eyebrow">{{ $c['kicker'] }}</span>
            <h1 class="mt-6 font-display font-semibold leading-[1.02] tracking-[-0.03em]" style="font-size: clamp(2.6rem, 8vw, 6rem)">
                {{ $c['title'] }}<br />
                <span class="grad-text">{{ $c['titleAccent'] }}</span>
            </h1>
            <p class="mt-6 max-w-xl text-lg text-ink-soft">{{ $c['sub'] }}</p>
            <div class="mt-9 flex flex-wrap gap-4">
                <a href="{{ $c['live'] }}" target="_blank" rel="noopener noreferrer" class="btn btn-solid" data-magnetic>Live Instagram</a>
                <a href="#creatives" class="btn btn-ghost" data-magnetic>View Creatives</a>
                <a href="{{ route('home') }}#portfolio" class="btn btn-ghost" data-magnetic>← Back to Portfolio</a>
            </div>
            <p class="mt-10 text-sm text-ink-muted">Scroll to explore the full breakdown ↓</p>
        </div>
    </section>

    {{-- ===== 1. OVERVIEW ===== --}}
    <section class="sec border-t border-ink-line">
        <div class="c-x">
            <span class="eyebrow">01 — Overview</span>
            <h2 class="title-display mt-4">Project <span class="grad-text">Overview</span></h2>
            <p class="mt-3 text-ink-muted">The essentials of the engagement at a glance.</p>

            <dl class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($c['overview'] as $row)
                    <div class="card card--pad" data-l-reveal="up">
                        <dt class="text-xs font-semibold uppercase tracking-[0.22em] text-ink-muted">{{ $row['dt'] }}</dt>
                        <dd class="mt-2 font-medium">{{ $row['dd'] }}</dd>
                    </div>
                @endforeach
            </dl>
        </div>
    </section>

    {{-- ===== 2. CHALLENGE ===== --}}
    <section class="sec border-t border-ink-line">
        <div class="c-x">
            <span class="eyebrow">02 — The Problem</span>
            <h2 class="title-display mt-4">The <span class="grad-text">Challenge</span></h2>
            <p class="mt-6 max-w-3xl text-xl leading-relaxed text-ink-soft">{{ $c['challenge'] }}</p>
        </div>
    </section>

    {{-- ===== 3. GOALS ===== --}}
    <section class="sec border-t border-ink-line">
        <div class="c-x">
            <span class="eyebrow">03 — Objectives</span>
            <h2 class="title-display mt-4">Goals</h2>
            <p class="mt-3 text-ink-muted">Six outcomes defined the success of the campaign.</p>

            <div class="mt-10 grid gap-4 sm:grid-cols-2 lg:grid-cols-3">
                @foreach ($c['goals'] as $i => $goal)
                    <div class="card card--hover flex items-center gap-4 p-5" data-l-reveal="up" style="transition-delay:{{ ($i % 3) * 80 }}ms">
                        <span class="cs-num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <p class="font-medium">{{ $goal }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== 4. STRATEGY ===== --}}
    <section class="sec border-t border-ink-line">
        <div class="c-x">
            <span class="eyebrow">04 — Approach</span>
            <h2 class="title-display mt-4">My <span class="grad-text">Strategy</span></h2>
            <p class="mt-3 text-ink-muted">Three parallel tracks — what we publish, how it looks, and how the audience is drawn in.</p>

            <div class="mt-10 grid gap-6 md:grid-cols-3">
                @foreach ($c['strategy'] as $i => $col)
                    <div class="card card--pad card--hover" data-tilt data-l-reveal="up" style="transition-delay:{{ $i * 90 }}ms">
                        <h3 class="font-display text-xl font-semibold"><span class="grad-text--cyan">0{{ $i + 1 }}</span>&nbsp; {{ $col['title'] }}</h3>
                        <ul class="mt-5 space-y-2.5">
                            @foreach ($col['items'] as $item)
                                <li class="flex items-start gap-3 text-ink-soft">
                                    <span class="mt-2 h-1.5 w-1.5 shrink-0 rotate-45 rounded-[1px] bg-electric-blue" aria-hidden="true"></span>{{ $item }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== 5. PROCESS ===== --}}
    <section class="sec border-t border-ink-line">
        <div class="c-x">
            <span class="eyebrow">05 — Workflow</span>
            <h2 class="title-display mt-4">Process</h2>
            <p class="mt-3 text-ink-muted">A repeatable loop, from research through to optimisation.</p>

            <div class="mt-10 grid grid-cols-2 gap-3 sm:grid-cols-4" data-l-reveal="up">
                @foreach ($c['process'] as $i => $step)
                    <div class="card card--pad text-center">
                        <span class="font-display text-lg font-bold grad-text--cyan">{{ $i + 1 }}</span>
                        <p class="mt-1 text-sm text-ink-soft">{{ $step }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== 6. CREATIVE SHOWCASE ===== --}}
    <section class="sec border-t border-ink-line" id="creatives">
        <div class="c-x">
            <span class="eyebrow">06 — The Work</span>
            <h2 class="title-display mt-4">Creative <span class="grad-text">Showcase</span></h2>
            <p class="mt-3 max-w-md text-ink-muted">Reels, feed posts and campaign creatives produced across the engagement. Hover any reel to preview it.</p>

            <div class="mt-10 grid grid-cols-2 gap-4 md:grid-cols-3" data-l-reveal="fade">
                @foreach ($c['creatives'] as $shot)
                    <figure class="overflow-hidden rounded-2xl border border-ink-line bg-white {{ $loop->index % 5 === 0 ? 'col-span-2 row-span-2 aspect-[4/4.8]' : 'aspect-[4/5]' }}">
                        @if (isset($shot['video']))
                            <div class="reel h-[85%] w-full !rounded-none">
                                <video class="h-full w-full object-cover" src="{{ $shot['video'] }}"
                                       poster="{{ $shot['poster'] }}" muted loop playsinline preload="none" data-cs-reel></video>
                                <div class="reel-veil"><span class="reel-play">▶</span></div>
                            </div>
                        @elseif ($shot['mock'] === 'feed')
                            <div class="cs-mock-grid h-full w-full place-items-center content-center p-8">
                                @for ($i = 0; $i < 9; $i++)<span class="aspect-square w-full"></span>@endfor
                            </div>
                        @else
                            <div class="flex h-full w-full flex-col items-center justify-center gap-3 p-8">
                                <div class="aspect-[4/3] w-full rounded-xl border border-ink-line bg-gradient-to-br from-electric-blue/15 to-electric-violet/15"></div>
                                <div class="flex gap-2">
                                    <span class="h-1.5 w-1.5 rounded-full bg-electric-blue"></span>
                                    <span class="h-1.5 w-1.5 rounded-full bg-ink-line"></span>
                                    <span class="h-1.5 w-1.5 rounded-full bg-ink-line"></span>
                                </div>
                            </div>
                        @endif
                        <figcaption class="p-3 text-xs font-medium tracking-wide text-ink-muted">{{ $shot['caption'] }}</figcaption>
                    </figure>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== 7. TOOLS ===== --}}
    <section class="sec border-t border-ink-line">
        <div class="c-x">
            <span class="eyebrow">07 — Stack</span>
            <h2 class="title-display mt-4">Tools <span class="grad-text">Used</span></h2>
            <p class="mt-3 text-ink-muted">Design, scheduling, editing and analytics.</p>
            <div class="mt-8 flex flex-wrap gap-3">
                @foreach ($c['tools'] as $tool)
                    <span class="rounded-full border border-ink-line bg-white px-4 py-2 text-sm text-ink-soft transition hover:-translate-y-0.5 hover:border-electric-blue hover:text-electric-blue">{{ $tool }}</span>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== 8. RESULTS ===== --}}
    <section class="sec border-t border-ink-line">
        <div class="c-x">
            <span class="eyebrow">08 — Impact</span>
            <h2 class="title-display mt-4">Results</h2>
            <p class="mt-3 text-ink-muted">Campaign performance across the three-month engagement.</p>

            <div class="mt-10 grid grid-cols-2 gap-4 md:grid-cols-3">
                @foreach ($c['results'] as $r)
                    <div class="result-card card p-7 text-center" data-count-static="{{ $r['value'] }}" data-l-reveal="up">
                        <p class="result-stat grad-text">{{ $r['value'] }}</p>
                        <p class="mt-1 text-[11px] font-semibold uppercase tracking-[0.22em] text-ink-muted">{{ $r['label'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== 9. BEFORE vs AFTER ===== --}}
    <section class="sec border-t border-ink-line">
        <div class="c-x">
            <span class="eyebrow">09 — The Shift</span>
            <h2 class="title-display mt-4">Before <span class="text-ink-faint">vs</span> <span class="grad-text--cyan">After</span></h2>

            <div class="mt-10 grid gap-6 md:grid-cols-2">
                <div class="card card--pad" data-l-reveal="up">
                    <h3 class="font-display text-lg font-semibold text-ink-muted">Before</h3>
                    <ul class="mt-5 space-y-3">
                        @foreach ($c['before'] as $b)
                            <li class="flex items-center gap-3 text-ink-muted"><span class="grid h-5 w-5 place-items-center rounded-full bg-rose-50 text-xs text-rose-500">✕</span>{{ $b }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="card cs-compare-col--after card--pad" data-l-reveal="up" style="transition-delay:100ms">
                    <h3 class="font-display text-lg font-semibold text-emerald-600">After</h3>
                    <ul class="mt-5 space-y-3">
                        @foreach ($c['after'] as $a)
                            <li class="flex items-center gap-3 text-ink"><span class="grid h-5 w-5 place-items-center rounded-full bg-emerald-50 text-xs text-emerald-600">✓</span>{{ $a }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </section>

    {{-- ===== 10. LEARNINGS ===== --}}
    <section class="sec border-t border-ink-line">
        <div class="c-x">
            <span class="eyebrow">10 — Reflection</span>
            <h2 class="title-display mt-4">Key <span class="grad-text">Learnings</span></h2>
            <p class="mt-6 max-w-3xl text-xl leading-relaxed text-ink-soft">{{ $c['learning'] }}</p>
        </div>
    </section>

    {{-- ===== 11. TESTIMONIAL ===== --}}
    @if (isset($c['quotes']) && count($c['quotes']))
    <section class="sec border-t border-ink-line">
        <div class="c-x">
            <div class="mx-auto max-w-3xl text-center">
                @foreach ($c['quotes'] as $q)
                    <blockquote class="card mx-auto p-10 md:p-14" data-l-reveal="fade">
                        <p class="text-xl leading-relaxed text-ink md:text-2xl">"{{ $q['quote'] }}"</p>
                        <span class="mt-6 block text-electric-gold">@for ($i = 0; $i < $q['stars']; $i++)★@endfor</span>
                        <cite class="mt-3 block not-italic">
                            <strong class="font-display">{{ $q['name'] }}</strong>
                            <span class="block text-sm text-ink-muted">{{ $q['role'] }}</span>
                        </cite>
                    </blockquote>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- ===== 12. RELATED ===== --}}
    <section class="sec border-t border-ink-line">
        <div class="c-x">
            <span class="eyebrow">11 — More Work</span>
            <h2 class="title-display mt-4">Related <span class="grad-text">Projects</span></h2>
            <p class="mt-3 text-ink-muted">Other campaigns from the same period.</p>

            <div class="mt-10 space-y-3">
                @foreach ($c['related'] as $rel)
                    <a href="{{ $rel['href'] }}" class="group flex items-center justify-between gap-6 border-b border-ink-line py-6 transition hover:border-electric-blue/40" data-l-reveal="up">
                        <div>
                            <h4 class="font-display text-xl font-semibold transition group-hover:text-electric-blue md:text-2xl">{{ $rel['title'] }}</h4>
                            <small class="text-sm text-ink-muted">{{ $rel['sub'] }}</small>
                        </div>
                        <span class="font-display text-3xl text-ink-faint transition group-hover:translate-x-2 group-hover:text-electric-blue" aria-hidden="true">→</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ===== 13. CTA ===== --}}
    <section class="sec relative overflow-hidden">
        <div class="pointer-events-none absolute left-1/2 top-1/2 h-[34rem] w-[34rem] -translate-x-1/2 -translate-y-1/2 rounded-full bg-electric-violet/10 blur-[140px]" aria-hidden="true"></div>
        <div class="c-x relative text-center">
            <span class="eyebrow justify-center">Let's Work Together</span>
            <h2 class="title-display mt-4">Ready to Grow <span class="grad-text">Your Brand?</span></h2>
            <p class="mx-auto mt-4 max-w-md text-ink-soft">Looking for a creative social media marketer to build your online presence? Let's work together.</p>
            <div class="mt-8 flex flex-wrap justify-center gap-4">
                <a href="{{ route('home') }}#contact" class="btn btn-solid" data-magnetic>Hire Me</a>
                <a href="{{ route('home') }}#contact" class="btn btn-ghost" data-magnetic>Contact Me</a>
            </div>
        </div>
    </section>

    {{-- Case study footer --}}
    <footer class="border-t border-ink-line bg-white py-8">
        <div class="c-x flex items-center justify-between text-sm text-ink-muted">
            <span>© {{ date('Y') }} Priyanka Garg</span>
            <a href="{{ route('home') }}" class="transition hover:text-electric-blue">Back to portfolio →</a>
        </div>
    </footer>
@endsection