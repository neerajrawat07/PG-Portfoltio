/**
 * Skills: animates horizontal skill bars (--width) and, if present,
 * radial meters (--p) + % labels once the section scrolls into view.
 */
export default function initSkills() {
    const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    // --- Horizontal bars ---
    document.querySelectorAll('[data-skill-bar]').forEach((bar) => {
        const target = Number(bar.dataset.skillBar) || 0;
        const fill = bar.querySelector('span');
        if (!fill) return;

        const animate = () => {
            if (reduced) { fill.style.width = `${target}%`; return; }
            const start = performance.now();
            const duration = 1200;
            const step = (now) => {
                const t = Math.min(1, (now - start) / duration);
                const eased = 1 - Math.pow(1 - t, 3);
                fill.style.width = `${target * eased}%`;
                if (t < 1) requestAnimationFrame(step);
            };
            requestAnimationFrame(step);
        };

        const io = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) { animate(); io.unobserve(entry.target); }
            });
        }, { threshold: 0.35 });
        io.observe(bar);
    });

    // --- Radial meters (legacy / case-study style) ---
    const meters = document.querySelectorAll('.meter__circle');
    if (!meters.length) return;

    meters.forEach((meter) => {
        const target = Number(meter.dataset.skillVal) || 0;
        const label = meter.querySelector('[data-skill-num]');
        const color = meter.style.getPropertyValue('--c') || 'var(--blue)';
        meter.style.setProperty('--c', color.trim());

        const animate = () => {
            if (reduced) {
                meter.style.setProperty('--p', target);
                if (label) label.textContent = `${target}%`;
                return;
            }
            const start = performance.now();
            const duration = 1300;
            const step = (now) => {
                const t = Math.min(1, (now - start) / duration);
                const eased = 1 - Math.pow(1 - t, 3);
                const val = Math.round(target * eased);
                meter.style.setProperty('--p', val);
                if (label) label.textContent = `${val}%`;
                if (t < 1) requestAnimationFrame(step);
            };
            requestAnimationFrame(step);
        };

        const io = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) { animate(); io.unobserve(entry.target); }
            });
        }, { threshold: 0.4 });
        io.observe(meter);
    });
}
