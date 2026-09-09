<?php $contact = \App\Data\Portfolio::contact(); ?>
<section class="sec relative overflow-hidden" id="contact">
    <!-- Ambient glows -->
    <div class="pointer-events-none absolute -right-40 top-10 h-[30rem] w-[30rem] rounded-full bg-electric-blue/15 blur-[130px]" data-parallax data-parallax-speed="10" aria-hidden="true"></div>
    <div class="pointer-events-none absolute -left-32 bottom-10 h-[26rem] w-[26rem] rounded-full bg-electric-cyan/15 blur-[130px]" data-parallax data-parallax-speed="-7" aria-hidden="true"></div>
    <!-- Animated particle sphere + orbiting 3D shapes (Three.js, lazily mounted) -->
    <div class="pointer-events-none absolute inset-0 opacity-80" id="contactCanvas" aria-hidden="true"></div>

    <!-- Floating social-marketing icons (SVG) -->
    <div class="contact-float hidden md:grid" style="left:6%; top:24%; animation-delay:0s" aria-hidden="true">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 3v18h18"/><path d="m7 15 4-6 4 3 5-7"/></svg>
    </div>
    <div class="contact-float contact-float--cyan hidden md:grid" style="right:7%; top:22%; animation-delay:0.8s" aria-hidden="true">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M3 11 18 3l-2.5 9L21 14l-6.5 3L12 22l-1.5-6L3 11Z"/></svg>
    </div>
    <div class="contact-float contact-float--violet hidden md:grid" style="left:12%; bottom:30%; animation-delay:1.6s" aria-hidden="true">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1"/></svg>
    </div>
    <div class="contact-float contact-float--pink hidden md:grid" style="right:13%; bottom:24%; animation-delay:2.2s" aria-hidden="true">
        <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.6l-1-.9a5.5 5.5 0 0 0-7.8 7.8l1 1L12 22l7.8-8.5 1-1a5.5 5.5 0 0 0 0-7.8Z"/></svg>
    </div>
    <div class="contact-float hidden lg:grid" style="left:30%; top:18%; animation-delay:0.4s; width:2.9rem; height:2.9rem" aria-hidden="true">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2Z"/></svg>
    </div>
    <div class="contact-float contact-float--cyan hidden xl:grid" style="right:24%; top:70%; animation-delay:2.8s; width:2.9rem; height:2.9rem" aria-hidden="true">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8a6 6 0 0 0-12 0c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.7 21a2 2 0 0 1-3.4 0"/></svg>
    </div>

    <div class="c-x relative z-10">
        <!-- ===== Header ===== -->
        <div class="grid gap-8 lg:grid-cols-[1fr_auto] lg:items-end" data-l-reveal="up">
            <div class="max-w-2xl">
                <p class="eyebrow">{{ $contact['eyebrow'] }}</p>
                <h2 class="title-display mt-5" data-mask-reveal>{{ $contact['title'] }}</h2>
                <p class="mt-6 max-w-xl text-lg leading-relaxed text-ink-soft">{{ $contact['body'] }}</p>
            </div>

            <p class="hidden items-center gap-2.5 rounded-full border border-ink-line bg-white px-4 py-2 text-sm text-ink-soft lg:inline-flex" data-l-reveal="up" style="transition-delay:100ms">
                <span class="relative flex h-2.5 w-2.5">
                    <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-70"></span>
                    <span class="relative inline-flex h-2.5 w-2.5 rounded-full bg-emerald-500"></span>
                </span>
                Currently accepting new projects
            </p>
        </div>

        <div class="mt-14 grid items-start gap-6 lg:grid-cols-[0.92fr_1.08fr] lg:gap-10">
            <!-- ===== LEFT : channels ===== -->
            <div class="space-y-5" data-l-reveal="up">
                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2">
                    @foreach ($contact['channels'] as $ch)
                        @if ($ch['href'])
                            <a href="{{ $ch['href'] }}" class="contact-channel group">
                        @else
                            <div class="contact-channel">
                        @endif

                        <span class="contact-channel__icon" aria-hidden="true">
                            @if ($ch['label'] === 'Email')
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="5" width="18" height="14" rx="2.5"/><path d="m3 7 9 6 9-6"/></svg>
                            @elseif ($ch['label'] === 'Phone')
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.13.96.36 1.9.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.91.34 1.85.57 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                            @else
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                            @endif
                        </span>

                        <div class="min-w-0">
                            <p class="text-[0.7rem] font-semibold uppercase tracking-[0.2em] text-ink-muted">{{ $ch['label'] }}</p>
                            @foreach ($ch['lines'] as $line)
                                <p class="truncate text-[0.95rem] font-semibold text-ink">{{ $line }}</p>
                            @endforeach
                        </div>

                        @if ($ch['href'])
                            <span class="contact-channel__arrow" aria-hidden="true">→</span>
                        @endif
                    @if ($ch['href'])</a>@else</div>@endif
                    @endforeach
                </div>

                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2">
                    <div class="contact-tile">
                        <p class="contact-tile__num">~1 Day</p>
                        <p class="text-xs font-semibold uppercase tracking-[0.16em] text-ink-muted">Avg. Response Time</p>
                    </div>
                    <div class="contact-tile">
                        <p class="contact-tile__num grad-text">100%</p>
                        <p class="text-xs font-semibold uppercase tracking-[0.16em] text-ink-muted">Client Focus</p>
                    </div>
                </div>

                <div class="flex items-center gap-3 pt-1">
                    <span class="text-xs font-semibold uppercase tracking-[0.22em] text-ink-faint">Follow</span>
                    <span class="h-px w-10 bg-ink-line" aria-hidden="true"></span>
                    @foreach (\App\Data\Portfolio::socials() as $s)
                        <a href="{{ $s['href'] }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $s['label'] }}"
                           class="grid h-11 w-11 place-items-center rounded-full border border-ink-line bg-white font-display text-xs font-bold text-ink-soft transition hover:-translate-y-0.5 hover:border-electric-blue hover:text-electric-blue">
                            {{ strtoupper(substr($s['label'], 0, 2)) }}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- ===== RIGHT : form ===== -->
            <form class="contact-form" id="contactForm" action="https://api.web3forms.com/submit" method="POST" novalidate data-l-reveal="up" style="transition-delay:120ms">
                <input type="hidden" name="access_key" value="6b8a577f-2050-4f05-b284-ac4d22e7c6d7" />
                <input type="hidden" name="subject" value="New enquiry from your portfolio website" />
                <input type="hidden" name="from_name" value="Priyanka Garg Portfolio" />
                <input type="hidden" name="to" value="neerajrawatrz9a@gmail.com" />
                <input type="checkbox" name="botcheck" style="display:none" tabindex="-1" autocomplete="off" />

                <div class="mb-8 flex items-center justify-between">
                    <div>
                        <h3 class="font-display text-xl font-semibold">Send a message</h3>
                        <p class="mt-1 text-sm text-ink-muted">Fill in the form and I'll get back to you shortly.</p>
                    </div>
                    <span class="contact-form__mark" aria-hidden="true">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16v16H4z"/><path d="m7 7 5 4 5-4"/></svg>
                    </span>
                </div>

                <div class="contact-form__grid">
                    <div class="contact-form__group">
                        <label for="cf-name" class="contact-label">Your Name</label>
                        <input class="contact-field" type="text" id="cf-name" name="name" placeholder="Jane Doe" required />
                    </div>
                    <div class="contact-form__group">
                        <label for="cf-email" class="contact-label">Your Email</label>
                        <input class="contact-field" type="email" id="cf-email" name="email" placeholder="jane@email.com" required />
                    </div>
                </div>

                <div class="contact-form__group">
                    <label for="cf-service" class="contact-label">Service Interested In</label>
                    <div class="contact-select">
                        <select class="contact-field" id="cf-service" name="service">
                            @foreach ($contact['formServices'] as $svc)
                                <option value="{{ $svc }}">{{ $svc }}</option>
                            @endforeach
                        </select>
                        <span class="contact-select__icon" aria-hidden="true">
                            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="m6 9 6 6 6-6"/>
                            </svg>
                        </span>
                    </div>
                </div>

                <div class="contact-form__group">
                    <label for="cf-message" class="contact-label">Your Message</label>
                    <textarea class="contact-field" id="cf-message" name="message" rows="5" placeholder="Tell me about your project..." required></textarea>
                </div>

                <button type="submit" class="btn btn-solid contact-form__submit" data-magnetic>
                    <span data-label>Start a Conversation</span>
                    <span aria-hidden="true">→</span>
                    <span class="spinner hidden h-4 w-4 animate-spin rounded-full border-2 border-white/40 border-t-white" aria-hidden="true"></span>
                </button>

                <p class="hidden rounded-xl px-4 py-3 text-sm" id="formStatus" role="status" aria-live="polite"></p>
            </form>
        </div>
    </div>
</section>