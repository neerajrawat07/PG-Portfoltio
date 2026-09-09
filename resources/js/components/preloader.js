import { fadePreloader } from '../animations/scroll';

/**
 * Branded preloader: counts 0 → 100 with a gradient progress bar,
 * locks scrolling while it runs, then lifts away as a curtain.
 */
export default function initPreloader() {
    const pre = document.getElementById('preloader');
    const bar = document.getElementById('preloaderBar');
    const pct = document.getElementById('preloaderPct');
    if (!pre) return;

    const html = document.documentElement;

    const unlock = () => { html.classList.remove('is-loading'); };
    html.classList.add('is-loading');

    // Give the count-up an ease-out feel: big jumps early, small late.
    let n = 0;
    const tick = () => {
        n = Math.min(n + Math.ceil(Math.pow(Math.random(), 1.6) * 14), 100);
        bar.style.width = `${n}%`;
        if (pct) pct.textContent = `${n}%`;
        if (n >= 100) {
            setTimeout(unlock, 120);
            fadePreloader(pre);
            return;
        }
        setTimeout(tick, 90 + Math.random() * 120);
    };
    tick();
}