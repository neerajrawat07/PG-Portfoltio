import './bootstrap';
import Alpine from 'alpinejs';

import { initHero, revealGroup } from './animations/scroll';
import initReveals from './components/reveal';
import initCursor from './components/cursor';
import initPreloader from './components/preloader';
import initNavbar from './components/navbar';
import initShowcase from './components/showcase';
import initSkills from './components/skills';
import initCounters from './animations/counters';
import initOrbits from './animations/orbit';
import initTestimonials from './components/testimonials';
import initServicesPreview from './components/servicesPreview';
import initForm from './components/form';

import { mountScene } from './three/core';
import heroScene from './three/heroScene';
import skillsScene from './three/skillsScene';
import contactScene from './three/contactScene';

// Register Alpine (used by any optional interactive bits).
window.Alpine = Alpine;

const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

// Flag that JS is alive — CSS only hides reveal-targets behind this class,
// so content is never stuck invisible if scripting fails.
document.documentElement.classList.add('js');

/**
 * Central boot: runs after fonts/layout are in place. Everything is
 * guarded internally, so a missing node on any given page is a no-op.
 */
function boot() {
    // Smooth scrolling (skips itself for reduced-motion / coarse pointers).
    import('./animations/lenis').then(({ default: initLenis }) => initLenis());

    // Preloader → hero entrance.
    initPreloader();
    initHero();

    // Scroll reveals + counters (IntersectionObserver).
    initReveals();
    initCounters();

    // Navigation & pointer flair.
    initNavbar();
    initCursor();

    // Section interactivity.
    initShowcase();
    initSkills();
    initTestimonials();
    initServicesPreview();
    initForm();
    initOrbits();

    // Three.js scenes — only mounted if their container exists.
    mountScene(document.getElementById('heroCanvas'), heroScene);
    mountScene(document.getElementById('skillsCanvas'), skillsScene);
    mountScene(document.getElementById('contactCanvas'), contactScene);

    // Kick a hero reveal for a group of elements marked with .hero-group.
    revealGroup(document.querySelectorAll('.hero-group'));
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot);
} else {
    boot();
}

// Expose a small hook for inline/reduced-motion toggling if ever needed.
window.__portfolio = { reduced };
