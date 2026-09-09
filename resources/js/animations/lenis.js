import Lenis from 'lenis';

/**
 * Smooth scrolling via Lenis, wired into GSAP's ticker + ScrollTrigger
 * so scroll-position reads stay in sync. Falls back to native scroll
 * for users who prefer reduced motion or coarse (touch) pointers that
 * handle their own momentum.
 */
export default function initLenis() {
    const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (prefersReduced) return null;

    const lenis = new Lenis({
        duration: 1.15,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        smoothWheel: true,
        touchMultiplier: 1.4,
    });

    // Keep GSAP & ScrollTrigger on the same clock as Lenis.
    import('gsap').then(({ default: gsap }) => {
        import('gsap/ScrollTrigger').then(({ ScrollTrigger }) => {
            gsap.registerPlugin(ScrollTrigger);
            lenis.on('scroll', ScrollTrigger.update);
            gsap.ticker.add((time) => lenis.raf(time * 1000));
            gsap.ticker.lagSmoothing(0);
        });
    });

    // Smooth-scroll in-page anchors instead of the default jump.
    document.addEventListener('click', (e) => {
        const anchor = e.target.closest('a[href^="#"]');
        if (anchor) {
            e.preventDefault();
            const id = anchor.getAttribute('href');
            lenis.scrollTo(id === '#' || id === '#top' ? 0 : id, { offset: -70 });
        }
    });

    return lenis;
}