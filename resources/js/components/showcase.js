/**
 * Portfolio interactions:
 *  - category filter (All / Social / Ads)
 *  - subtle 3D tilt on project cards
 */
export default function initShowcase() {
    filterWork();
    initTilt();
    initReels();
}

/* ---------- Filter ---------- */
function filterWork() {
    const grid = document.getElementById('projGrid');
    const buttons = document.querySelectorAll('.work-filters button');
    if (!grid || !buttons.length) return;

    const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    buttons.forEach((btn) => {
        btn.addEventListener('click', () => {
            buttons.forEach((b) => {
                b.classList.toggle('active', b === btn);
                b.setAttribute('aria-pressed', String(b === btn));
            });
            const filter = btn.dataset.filter;

            grid.querySelectorAll('.proj-card').forEach((card) => {
                const show = filter === 'all' || card.dataset.category === filter;
                card.classList.toggle('is-hidden', !show);
                if (!reduced && show) {
                    card.animate(
                        [{ opacity: 0.3, transform: 'scale(0.985)' }, { opacity: 1, transform: 'scale(1)' }],
                        { duration: 380, easing: 'cubic-bezier(0.22,1,0.36,1)', fill: 'forwards' }
                    );
                }
            });
        });
    });
}

/* ---------- 3D tilt ---------- */
function initTilt() {
    const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (reduced || !window.matchMedia('(pointer: fine)').matches) return;

    document.querySelectorAll('[data-tilt]').forEach((card) => {
        let raf = null;

        card.addEventListener('mousemove', (e) => {
            if (raf) return;
            raf = requestAnimationFrame(() => {
                const r = card.getBoundingClientRect();
                const px = (e.clientX - r.left) / r.width - 0.5;
                const py = (e.clientY - r.top) / r.height - 0.5;
                card.style.transform = `perspective(900px) rotateY(${px * 6}deg) rotateX(${-py * 6}deg) translateZ(4px)`;
                raf = null;
            });
        });
        card.addEventListener('mouseleave', () => {
            card.style.transition = 'transform .5s cubic-bezier(.22,1,.36,1)';
            card.style.transform = 'perspective(900px) rotateY(0) rotateX(0)';
            setTimeout(() => (card.style.transition = ''), 520);
        });
    });
}

/* ---------- Reels: autoplay + play/pause + horizontal scroll ---------- */
function initReels() {
    const cards = document.querySelectorAll('.reel-card');
    const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (!cards.length) return;

    // Tap / Enter / Space toggles play-pause, and flips the "paused" affordance.
    cards.forEach((card) => {
        const video = card.querySelector('video');
        if (!video) return;
        const toggle = () => {
            if (video.paused) { video.play(); card.classList.remove('is-paused'); }
            else { video.pause(); card.classList.add('is-paused'); }
        };
        card.addEventListener('click', toggle);
        card.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); toggle(); }
        });
    });

    // Performance: only autoplay videos near the viewport; pause the rest.
    if ('IntersectionObserver' in window) {
        const io = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    const v = entry.target.querySelector('video');
                    if (!v) return;
                    if (entry.isIntersecting && !reduced) { v.play(); entry.target.classList.remove('is-paused'); }
                    else v.pause();
                });
            },
            { rootMargin: '0px 0px -12% 0px', threshold: 0.15 }
        );
        cards.forEach((c) => io.observe(c));
    }

    // Arrow buttons scroll each strip by ~1 card.
    document.querySelectorAll('[data-reel-strip]').forEach((strip) => {
        const wrap = strip.closest('.reel-row__media');
        if (!wrap) return;
        const prev = wrap.querySelector('[data-reel-prev]');
        const next = wrap.querySelector('[data-reel-next]');
        const step = () => (strip.querySelector('.reel-card')?.offsetWidth ?? 200) + 16;
        next?.addEventListener('click', () => strip.scrollBy({ left: step(), behavior: 'smooth' }));
        prev?.addEventListener('click', () => strip.scrollBy({ left: -step(), behavior: 'smooth' }));
    });
}
