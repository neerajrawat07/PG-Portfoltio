<?php $contact = \App\Data\Portfolio::contact(); ?>
<section class="sec relative overflow-hidden" id="contact">
    <!-- Animated light/sphere background (Three.js, lazily mounted) -->
    <div class="absolute inset-0 pointer-events-none" id="contactCanvas" aria-hidden="true"></div>
    <div class="pointer-events-none absolute -right-40 top-10 h-[30rem] w-[30rem] rounded-full bg-electric-blue/10 blur-[130px]" aria-hidden="true"></div>
    <div class="pointer-events-none absolute -left-32 bottom-10 h-[26rem] w-[26rem] rounded-full bg-electric-cyan/10 blur-[130px]" aria-hidden="true"></div>

    <div class="c-x relative grid gap-14 lg:grid-cols-2 lg:gap-16">
        <!-- LEFT : pitch -->
        <div data-l-reveal="up">
            <p class="eyebrow">{{ $contact['eyebrow'] }}</p>
            <h2 class="title-display mt-5">
                {{ str_replace('?', '?', $contact['title']) }}<br />
                <span class="grad-text">Let's make it happen.</span>
            </h2>
            <p class="mt-6 max-w-md text-lg leading-relaxed text-ink-soft">{{ $contact['body'] }}</p>

            <div class="mt-10 space-y-4">
                @foreach ($contact['channels'] as $ch)
                    @if ($ch['href'])
                        <a href="{{ $ch['href'] }}" class="contact-channel group">
                    @else
                        <div class="contact-channel">
                    @endif
                        <span class="grid h-12 w-12 shrink-0 place-items-center rounded-xl bg-gradient-to-br from-electric-blue/10 to-electric-violet/10 text-xl" aria-hidden="true">{{ $ch['icon'] }}</span>
                        <div>
                            <p class="text-xs font-semibold uppercase tracking-[0.2em] text-ink-muted">{{ $ch['label'] }}</p>
                            @foreach ($ch['lines'] as $line)
                                <p class="font-medium">{{ $line }}</p>
                            @endforeach
                        </div>
                        @if ($ch['href'])
                            <span class="ml-auto text-ink-faint transition group-hover:translate-x-1 group-hover:text-electric-blue" aria-hidden="true">→</span>
                        @endif
                    @if ($ch['href'])</a>@else</div>@endif
                @endforeach
            </div>

            <div class="mt-8 flex items-center gap-3">
                @foreach (\App\Data\Portfolio::socials() as $s)
                    <a href="{{ $s['href'] }}" target="_blank" rel="noopener noreferrer"
                       class="grid h-12 w-12 place-items-center rounded-full border border-ink-line bg-white text-sm font-semibold text-ink-soft transition hover:-translate-y-0.5 hover:border-electric-blue hover:text-electric-blue">
                        {{ strtoupper(substr($s['label'], 0, 2)) }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- RIGHT : form -->
        <form class="contact-form card" id="contactForm" action="https://api.web3forms.com/submit" method="POST" novalidate data-l-reveal="up" style="transition-delay: 120ms">
            <input type="hidden" name="access_key" value="768475f0-7232-4ee0-980c-904f881034f0" />
            <input type="hidden" name="subject" value="New enquiry from your portfolio website" />
            <input type="hidden" name="from_name" value="Priyanka Garg Portfolio" />
            <input type="checkbox" name="botcheck" style="display:none" tabindex="-1" autocomplete="off" />

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
</section>
