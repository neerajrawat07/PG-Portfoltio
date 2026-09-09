/**
 * Animated number counters (metrics wall). Reads data-count / data-decimal
 * / data-suffix and counts up when scrolled into view.
 */
export default function initCounters() {
    const counters = document.querySelectorAll('[data-count]');
    if (!counters.length) return;

    const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    const run = (el) => {
        const target = Number(el.dataset.count || 0);
        const decimals = Number(el.dataset.decimal || 0);
        const suffix = el.dataset.suffix || '';

        const render = (val) => {
            // 1.5 → "1.5", 500 → "500"
            const n = decimals > 0 ? val.toFixed(decimals) : String(Math.round(val));
            el.textContent = `${n}${suffix}`;
        };

        if (reduced) {
            render(target);
            return;
        }

        const start = performance.now();
        const duration = 1600;
        const step = (now) => {
            const t = Math.min(1, (now - start) / duration);
            const eased = 1 - Math.pow(1 - t, 3);
            render(target * eased);
            if (t < 1) requestAnimationFrame(step);
        };
        requestAnimationFrame(step);
    };

    const io = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                run(entry.target);
                io.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });
    counters.forEach((el) => io.observe(el));
}