<?php $services = \App\Data\Portfolio::services(); ?>
<section class="sec" id="services">
    <div class="c-x">
        <div class="mb-14 flex flex-wrap items-end justify-between gap-6">
            <div>
                <p class="eyebrow">What I Offer</p>
                <h2 class="title-display mt-5" data-mask-reveal>Expert Marketing <span class="grad-text">Services</span></h2>
            </div>
            <p class="max-w-xs text-sm leading-relaxed text-ink-muted">Nine ways I help brands show up, sound right, and grow on social.</p>
        </div>

        <div class="svc-wrap" data-l-reveal="up">
            {{-- Service list --}}
            <div class="svc-list rounded-2xl border border-ink-line bg-white">
                @foreach ($services as $i => $service)
                    <div class="service-row group"
                         data-img="{{ $service['image'] }}"
                         data-alt="{{ $service['title'] }}"
                         data-idx="{{ $i }}">
                        <span class="s-num" aria-hidden="true">0{{ $i + 1 }}</span>
                        <div>
                            <h3 class="s-name flex items-center gap-3">
                                <span class="text-xl" aria-hidden="true">{{ $service['icon'] }}</span>
                                {{ $service['title'] }}
                            </h3>
                            <p class="mt-1 max-w-lg text-sm text-ink-muted opacity-0 transition-opacity duration-300 group-hover:opacity-100">
                                {{ $service['body'] }}
                            </p>
                        </div>
                        <span class="s-arrow font-display text-2xl" aria-hidden="true">↗</span>
                    </div>
                @endforeach
            </div>

            {{-- Floating image preview --}}
            <div class="svc-preview" aria-hidden="true">
                <img class="svc-preview__img" src="" alt="" />
                <span class="svc-preview__label"></span>
            </div>
        </div>
    </div>
</section>
