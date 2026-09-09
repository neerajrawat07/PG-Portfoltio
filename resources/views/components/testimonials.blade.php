<?php $testimonials = \App\Data\Portfolio::testimonials(); ?>
<section class="sec" id="testimonials">
    <div class="c-x">
        <div class="mb-12 text-center">
            <p class="eyebrow justify-center">Client Stories</p>
            <h2 class="title-display mt-5">What Clients <span class="grad-text">Say</span></h2>
        </div>

        <div class="relative mx-auto max-w-3xl" id="testiSlider" data-l-reveal="fade">
            <div class="card relative min-h-[300px] p-8 md:p-12">
                @foreach ($testimonials as $i => $t)
                    <blockquote class="t-slide {{ $i === 0 ? '' : 'is-idle' }}" data-t-slide="{{ $i }}">
                        <svg class="t-quote-mark mb-6" width="42" height="30" viewBox="0 0 42 30" aria-hidden="true" fill="currentColor">
                            <path d="M0 30V18.9C0 8.8 4.7 2 13.8 0l1.9 4.4c-5.6 1.6-9 6.2-9.4 11.6H13v14H0zm28 0V18.9C28 8.8 32.7 2 41.8 0l1.9 4.4c-5.6 1.6-9 6.2-9.4 11.6H41v14H28z"/>
                        </svg>
                        <p class="text-lg leading-relaxed text-ink md:text-xl">"{{ $t['quote'] }}"</p>
                        <footer class="mt-8 flex items-center gap-4">
                            <span class="t-avatar">PG</span>
                            <div>
                                <strong class="block font-display">{{ $t['name'] }}</strong>
                                <span class="text-sm text-ink-muted">{{ $t['role'] }}</span>
                            </div>
                            <span class="ml-auto text-electric-gold" aria-hidden="true">★★★★★</span>
                        </footer>
                    </blockquote>
                @endforeach
            </div>

            <div class="mt-6 flex items-center justify-between">
                <button class="btn btn-ghost !px-4" data-t-prev aria-label="Previous testimonial">← Prev</button>
                <div class="flex items-center gap-2">
                    @foreach ($testimonials as $i => $t)
                        <button class="t-dot {{ $i === 0 ? 'is-active' : '' }}" data-t-dot="{{ $i }}" aria-label="Go to testimonial {{ $i + 1 }}"></button>
                    @endforeach
                </div>
                <button class="btn btn-ghost !px-4" data-t-next aria-label="Next testimonial">Next →</button>
            </div>
        </div>
    </div>
</section>
