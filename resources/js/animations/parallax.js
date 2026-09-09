import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

/**
 * Gentle parallax drift for background decorations.
 *
 * Elements marked [data-parallax] (blurred glow orbs, ambient shapes)
 * slide vertically on a slight scrub curve as their section scrolls past
 * the viewport. `data-parallax-speed` controls the amplitude in percent
 * (default 10). Skipped entirely for reduced-motion users.
 */
export default function initParallax() {
    const els = gsap.utils.toArray('[data-parallax]');
    if (!els.length) return;

    const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (reduced) return;

    els.forEach((el) => {
        const speed = parseFloat(el.dataset.parallaxSpeed || '10');
        const trigger = el.closest('section') || el.parentElement;

        gsap.fromTo(
            el,
            { yPercent: -speed },
            {
                yPercent: speed,
                ease: 'none',
                scrollTrigger: {
                    trigger,
                    start: 'top bottom',
                    end: 'bottom top',
                    scrub: 0.6,
                },
            }
        );
    });
}