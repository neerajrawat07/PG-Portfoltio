/**
 * Orbit animations — Tools (creative ecosystem) and Brands.
 *
 * Tools: nodes carry a brand-colour dot + skill % chip and rotate around
 * the hub with a subtle vertical squash and breathing bob. Pauses while
 * hovered so labels are easy to read.
 *
 * Brands: names travel an elliptical 3D ring (z-depth scales + fades the
 * far side). Pauses on hover; individual items lift and scale.
 *
 * One rAF loop per orbit; both are skipped for reduced-motion users.
 */
export default function initOrbits() {
    const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (reduced) return;

    /* ================================================================
       TOOLS ORBIT
       ---------------------------------------------------------------- */
    const tools = document.getElementById('toolsOrbit');
    if (tools) {
        const nodes = Array.from(tools.querySelectorAll('.tools-orbit__node'));
        if (!nodes.length) return;

        const state = nodes.map((node) => {
            const left = parseFloat(node.style.left);
            const top = parseFloat(node.style.top);
            const angle = Math.atan2(top - 50, left - 50);
            const radius = Math.hypot(left - 50, top - 50);
            const color = node.dataset.color || '#5B5BFF';

            node.style.setProperty('--in-hover', color);
            node.style.setProperty('--in-glow', `${color}55`);
            node.classList.add('is-orbiting');

            return { angle, radius };
        });

        let spin = 0;
        let active = false;
        let hovered = false;
        let inView = false;
        let rafId = 0;

        const hoverScale = new Map();
        nodes.forEach((node) => {
            node.addEventListener('mouseenter', () => hoverScale.set(node, true));
            node.addEventListener('mouseleave', () => hoverScale.set(node, false));
        });

        const tick = () => {
            if (!active) return;
            spin += 0.0065;
            nodes.forEach((node, i) => {
                const s = state[i];
                const a = s.angle + spin;
                // Follow the exact circular radius so nodes stay on their
                // dashed ring line (no ellipse squash, no vertical bob).
                const cx = 50 + s.radius * Math.cos(a);
                const cy = 50 + s.radius * Math.sin(a);
                const lift = hoverScale.get(node) ? 1.12 : 1;
                node.style.left = `${cx.toFixed(2)}%`;
                node.style.top = `${cy.toFixed(2)}%`;
                node.style.transform =
                    `translate(-50%, -50%) scale(${lift})`;
            });
            rafId = requestAnimationFrame(tick);
        };
        const start = () => { if (!active) { active = true; tick(); } };
        const stop = () => { active = false; cancelAnimationFrame(rafId); };

        tools.addEventListener('mouseenter', () => { hovered = true; stop(); });
        tools.addEventListener('mouseleave', () => { hovered = false; if (!document.hidden && inView) start(); });
        document.addEventListener('visibilitychange', () => {
            if (document.hidden) stop();
            else if (!hovered && inView) start();
        });

        const io = new IntersectionObserver((entries) => {
            entries.forEach((entry) => {
                inView = entry.isIntersecting;
                if (inView && !hovered) start();
                else if (!inView) stop();
            });
        }, { threshold: 0.1 });
        io.observe(tools);
    }

    /* ================================================================
       BRANDS ORBIT — elliptical 3D ring
       ---------------------------------------------------------------- */
    const brands = document.getElementById('brandOrbit');
    if (!brands) return;

    const items = Array.from(brands.querySelectorAll('.orbit-item'));
    if (!items.length) return;

    const SIZE = () => {
        const w = brands.clientWidth;
        const h = brands.clientHeight;
        return {
            a: Math.max((w * 0.5) * 0.94, 360),
            b: Math.max(h * 0.42, 120),
        };
    };

    const COUNT = items.length;
    const hover = new Map();
    let t = 0;
    let raf = 0;
    let running = false;

    items.forEach((el) => {
        el.addEventListener('mouseenter', () => { hover.set(el, true); el.classList.add('is-lift'); });
        const leave = () => {
            hover.set(el, false);
            el.classList.remove('is-lift');
            // Re-apply the current frame's transform so the lift eases out.
        };
        el.addEventListener('mouseleave', leave);
    });

    const draw = () => {
        if (!running) return;
        const { a, b } = SIZE();
        t += 0.9; // deg per frame ≈ full ring every 40s
        const rad = (t * Math.PI) / 180;

        for (let i = 0; i < COUNT; i++) {
            const el = items[i];
            const angle = rad + (i / COUNT) * Math.PI * 2;
            const x = a * Math.cos(angle);
            const y = b * Math.sin(angle);
            const depth = Math.sin(angle); // +1 front, −1 back
            const scale = 0.8 + 0.2 * depth;
            const opacity = 0.5 + 0.5 * depth;
            const lift = hover.get(el) ? 1.15 : 1;

            el.style.opacity = opacity.toFixed(2);
            el.style.transform =
                `translate3d(${x.toFixed(1)}px, ${y.toFixed(1)}px, 0) scale(${(scale * lift).toFixed(3)})`;
        }
        raf = requestAnimationFrame(draw);
    };

    const start = () => { if (!running) { running = true; raf = requestAnimationFrame(draw); } };
    const stop = () => { running = false; cancelAnimationFrame(raf); };

    const io = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) start();
            else stop();
        });
    }, { threshold: 0.1 });
    io.observe(brands);
}