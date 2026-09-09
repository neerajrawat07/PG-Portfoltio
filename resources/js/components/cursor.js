/**
 * Custom cursor (desktop / fine pointers only): a small dot that snaps
 * and a trailing ring that lerps behind it. Enlarges over interactive
 * elements; magnetic buttons are pulled toward the pointer.
 */
export default function initCursor() {
    const fine = window.matchMedia('(pointer: fine)').matches;
    const ring = document.querySelector('.cursor-ring');
    const dot = document.querySelector('.cursor-dot');

    if (!fine || !ring || !dot) return;

    document.body.classList.add('cursor-on');

    const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const pos = { x: -100, y: -100 };
    let rx = -100;
    let ry = -100;
    let raf = null;

    const move = (e) => {
        pos.x = e.clientX;
        pos.y = e.clientY;
        dot.style.transform = `translate(${pos.x}px, ${pos.y}px) translate(-50%, -50%)`;
        if (!raf) loop();
    };

    const loop = () => {
        rx += (pos.x - rx) * 0.18;
        ry += (pos.y - ry) * 0.18;
        ring.style.transform = `translate(${rx}px, ${ry}px) translate(-50%, -50%)`;
        raf = null;
        if (Math.abs(pos.x - rx) > 0.3 || Math.abs(pos.y - ry) > 0.3) raf = requestAnimationFrame(loop);
    };

    window.addEventListener('mousemove', move, { passive: true });

    // Grow over interactive elements; show "VIEW" over project cards.
    const targets = 'a, button, [data-magnetic], [data-reel], [data-tilt], .work-card';
    document.addEventListener('mouseover', (e) => {
        if (e.target.closest(targets)) ring.classList.add('is-hover');
        if (e.target.closest('.work-card, [data-reel]')) ring.classList.add('is-hover--view');
    });
    document.addEventListener('mouseout', (e) => {
        if (e.target.closest(targets)) ring.classList.remove('is-hover');
        if (e.target.closest('.work-card, [data-reel]')) ring.classList.remove('is-hover--view');
    });
    document.addEventListener('mousedown', () => ring.classList.add('is-down'));
    document.addEventListener('mouseup', () => ring.classList.remove('is-down'));

    // Magnetic buttons: translate toward the pointer, spring back on leave.
    document.querySelectorAll('[data-magnetic]').forEach((el) => {
        let strength = 0.35;
        el.addEventListener('mousemove', (e) => {
            if (reduced) return;
            const r = el.getBoundingClientRect();
            const dx = e.clientX - (r.left + r.width / 2);
            const dy = e.clientY - (r.top + r.height / 2);
            el.style.transform = `translate(${dx * strength}px, ${dy * strength}px)`;
        });
        el.addEventListener('mouseleave', () => {
            el.style.transition = 'transform 0.4s cubic-bezier(0.22, 1, 0.36, 1)';
            el.style.transform = 'translate(0, 0)';
            setTimeout(() => (el.style.transition = ''), 420);
        });
    });

    return () => window.removeEventListener('mousemove', move);
}