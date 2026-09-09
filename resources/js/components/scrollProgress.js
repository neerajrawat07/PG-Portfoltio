/**
 * Scroll progress bar + back-to-top.
 *
 * A thin gradient bar at the top of the viewport tracks page progress,
 * and a circular button floats in after the user scrolls past the hero.
 * Works whether or not Lenis is active (it reads the real scroll offset);
 * the button reuses the Lenis instance for a smooth scroll-to-top.
 */
export default function initScrollProgress() {
    const barEl = document.getElementById('scrollProgress');
    const fillEl = barEl?.querySelector('.scroll-progress__fill');
    const topBtn = document.getElementById('toTop');
    if (!fillEl || !topBtn) return;

    const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    let ticking = false;

    const update = () => {
        ticking = false;
        const doc = document.documentElement;
        const max = doc.scrollHeight - window.innerHeight;
        const y = window.scrollY || doc.scrollTop;

        const progress = max > 0 ? Math.min(1, Math.max(0, y / max)) : 0;
        fillEl.style.transform = `scaleX(${progress})`;
        barEl.classList.toggle('is-visible', y > 8);
        topBtn.classList.toggle('is-visible', y > window.innerHeight * 0.6);
    };

    const onScroll = () => {
        if (!ticking) {
            ticking = true;
            requestAnimationFrame(update);
        }
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', onScroll, { passive: true });
    update();

    /* Smooth scroll-to-top. Prefer Lenis; fall back to native smooth. */
    topBtn.addEventListener('click', () => {
        if (window.__lenis) {
            window.__lenis.scrollTo(0, { offset: 0 });
        } else {
            window.scrollTo({ top: 0, behavior: reduced ? 'auto' : 'smooth' });
        }
    });
}