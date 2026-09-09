<?php $projects = \App\Data\Portfolio::projects(); ?>
<section class="sec" id="portfolio">
    <div class="c-x">
        {{-- Header --}}
        <div class="mb-14 flex flex-wrap items-end justify-between gap-6">
            <div>
                <p class="eyebrow">Selected Projects</p>
                <h2 class="title-display mt-5" data-mask-reveal>Curated <span class="grad-text">Works</span></h2>
            </div>

            <div class="work-filters" role="group" aria-label="Filter projects">
                <button class="active" data-filter="all" aria-pressed="true">All</button>
                <button data-filter="social" aria-pressed="false">Social</button>
                <button data-filter="ads" aria-pressed="false">Ads</button>
            </div>
        </div>

        {{-- Project grid --}}
        <div class="proj-grid" id="projGrid">
            @foreach ($projects as $i => $project)
                <article class="proj-card group"
                         data-category="{{ $project['category'] }}"
                         data-l-reveal="up"
                         data-tilt
                         style="transition-delay:{{ $i * 80 }}ms">
                    <a href="{{ $project['caseUrl'] ?? $project['cta'] ?? '#' }}" class="proj-card__link">
                        {{-- Image --}}
                        <figure class="proj-card__media">
                            <img src="{{ $project['cover'] }}"
                                 alt="{{ $project['coverAlt'] ?? $project['title'] }}"
                                 loading="lazy" />
                            <span class="proj-card__num" aria-hidden="true">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                            <div class="proj-card__overlay">
                                <span class="proj-card__view">View Project <span aria-hidden="true">&rarr;</span></span>
                            </div>
                        </figure>

                        {{-- Body --}}
                        <div class="proj-card__body">
                            <div class="proj-card__meta">
                                <span class="proj-card__cat">{{ $project['categoryLabel'] }}</span>
                                <span class="proj-card__dot" aria-hidden="true">&middot;</span>
                                <span class="proj-card__kind">{{ $project['kind'] }}</span>
                            </div>
                            <h3 class="proj-card__title">{{ $project['title'] }}</h3>

                            @if (!empty($project['stats']))
                                <div class="proj-card__stats">
                                    @foreach ($project['stats'] as $stat)
                                        <div>
                                            <small>{{ $stat['label'] }}</small>
                                            <strong>{{ $stat['value'] }}</strong>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </a>
                </article>
            @endforeach
        </div>

        {{-- Featured Reels showcase --}}
        @php
            $reelProjects = collect($projects)->filter(fn ($p) => ($p['media'] ?? null) === 'reels')->values();
        @endphp
        @if ($reelProjects->isNotEmpty())
            <div class="reel-showcase" data-l-reveal="up">
                <div class="mb-10 flex flex-wrap items-end justify-between gap-6">
                    <div>
                        <p class="eyebrow">Watch the Work</p>
                        <h3 class="title-display mt-5">Featured <span class="grad-text">Reels</span></h3>
                    </div>
                    <p class="max-w-sm text-sm leading-relaxed text-ink-soft">Scroll each reel strip to preview the motion — tap any reel to play or pause.</p>
                </div>

                @foreach ($reelProjects as $i => $project)
                    <div class="reel-row">
                        <div class="reel-row__info">
                            <h4 class="reel-row__title">{{ $project['title'] }}</h4>
                            <p class="reel-row__kind">{{ $project['categoryLabel'] }} &middot; {{ $project['kind'] }}</p>
                            @if (!empty($project['reelStats']))
                                <ul class="reel-row__stats">
                                    @foreach ($project['reelStats'] as $stat)
                                        <li>
                                            <span aria-hidden="true">{{ $stat['icon'] }}</span>
                                            <strong>{{ $stat['value'] }}</strong>
                                            <small>{{ $stat['label'] }}</small>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>

                        <div class="reel-row__media">
                            <div class="reel-strip" data-reel-strip>
                                @foreach ($project['reels'] as $reel)
                                    <article class="reel-card" data-reel tabindex="0" role="button"
                                             aria-label="{{ $reel['aria'] }}"
                                             style="transition-delay:{{ $i * 60 }}ms">
                                        <video src="{{ $reel['video'] }}" poster="{{ $reel['poster'] }}"
                                               autoplay muted loop playsinline preload="metadata"></video>
                                        <span class="reel-card__views">{{ $reel['label'] }}</span>
                                        <span class="reel-card__play" aria-hidden="true">&#9654;</span>
                                    </article>
                                @endforeach
                            </div>
                            <div class="reel-row__nav">
                                <button class="reel-nav" type="button" data-reel-prev aria-label="Previous reels">&#8592;</button>
                                <button class="reel-nav" type="button" data-reel-next aria-label="Next reels">&#8594;</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>
