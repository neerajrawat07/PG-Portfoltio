<?php $brands = \App\Data\Portfolio::brands(); ?>
<section class="sec--tight overflow-hidden border-y border-ink-line bg-white" id="brands">
    <p class="mb-10 text-center font-display text-xs font-semibold uppercase tracking-[0.32em] text-ink-muted">Brands I've Worked With</p>

    {{-- Two-row infinite marquee --}}
    <div class="brand-marquee" data-l-reveal="fade">
        <div class="brand-track">
            @foreach ($brands as $brand)
                <span class="brand-item">{{ $brand }} <b aria-hidden="true"></b></span>
            @endforeach
            {{-- duplicate for seamless loop --}}
            @foreach ($brands as $brand)
                <span class="brand-item">{{ $brand }} <b aria-hidden="true"></b></span>
            @endforeach
        </div>
    </div>
    <div class="brand-marquee mt-5" data-l-reveal="fade">
        <div class="brand-track brand-track--rev">
            @foreach (array_reverse($brands) as $brand)
                <span class="brand-item">{{ $brand }} <b aria-hidden="true"></b></span>
            @endforeach
            @foreach (array_reverse($brands) as $brand)
                <span class="brand-item">{{ $brand }} <b aria-hidden="true"></b></span>
            @endforeach
        </div>
    </div>

    <p class="mt-10 text-center text-sm text-ink-muted">+ Many more</p>
</section>
