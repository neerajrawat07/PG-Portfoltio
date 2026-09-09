import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

/**
 * Cinematic hero entrance: masked name lines + staggered headline
 * elements, plus scroll-linked parallax on the photo/canvas.
 */
export function initHero() {
    const root = document.querySelector('.hero');
    if (!root) return;

    if (prefersReduced) {
        gsap.set(root.querySelectorAll('.line-mask > span, .hero-stagger'), { clearProps: 'all' });
        return;
    }

    const lines = root.querySelectorAll('.line-mask > span');
    const staggers = root.querySelectorAll('.hero-stagger');
    const canvas = root.querySelector('.hero__canvas');
    const portrait = root.querySelector('.hero__portrait');

    const tl = gsap.timeline({ defaults: { ease: 'power4.out' } });
    tl.to(lines, { y: 0, duration: 1.15, stagger: 0.15, ease: 'power4.out' }, 0.3)
      .to(staggers, { y: 0, autoAlpha: 1, duration: 0.95, stagger: 0.1 }, 0.65)
      .to('.hero__portrait', { scale: 1, autoAlpha: 1, duration: 1.1, ease: 'power3.out' }, 0.8);

    // GSAP owns hero transforms from here — drop CSS-driven intro states.
    gsap.set(lines, { y: '115%' });
    gsap.set(staggers, { y: 26, autoAlpha: 0 });
    gsap.set('.hero__portrait', { scale: 0.94, autoAlpha: 0 });
    tl.play();

    // Gentle parallax on the portrait + canvas while scrolling the hero.
    if (portrait) {
        gsap.to(portrait, {
            y: -56,
            ease: 'none',
            scrollTrigger: { trigger: root, start: 'top top', end: 'bottom top', scrub: 0.6 },
        });
    }
    if (canvas) {
        gsap.to(canvas, {
            yPercent: 18,
            ease: 'none',
            scrollTrigger: { trigger: root, start: 'top top', end: 'bottom top', scrub: 0.6 },
        });
    }
}

/** Utility for a scroll-triggered reveal for a group of elements. */
export function revealGroup(els, vars = {}) {
    if (!els.length) return;
    if (prefersReduced) {
        gsap.set(els, { clearProps: 'all' });
        return;
    }
    els.forEach((el, i) => {
        gsap.fromTo(
            el,
            { y: 36, autoAlpha: 0 },
            {
                y: 0, autoAlpha: 1, duration: 0.9, ease: 'power3.out',
                delay: (i % 3) * 0.08,
                scrollTrigger: { trigger: el, start: 'top 88%', once: true },
                ...vars,
            }
        );
    });
}

/** Fade the preloader out once it has completed its count. */
export function fadePreloader(el) {
    if (prefersReduced) {
        el.remove();
        return;
    }
    gsap.to(el, {
        yPercent: -100,
        duration: 0.9,
        ease: 'power4.inOut',
        borderRadius: '0 0 40px 40px',
        onComplete: () => el.remove(),
    });
}