/**
 * Active-section nav highlighting.
 *
 * Uses an IntersectionObserver with a probe band across the upper-middle
 * of the viewport: whichever section's heading sits inside that band is
 * considered "current", and its nav link gets .is-active (permanent
 * gradient underline). Falls back to scroll-position math if of any
 * section is missing.
 */
export default function initActiveNav() {
    const links = document.querySelectorAll('.nav-links a[data-nav-target]');
    if (!links.length) return;

    const sections = [...new Set([...links].map((l) => l.dataset.navTarget))]
        .map((id) => ({ id, el: document.getElementById(id) }))
        .filter(({ el }) => el);

    if (!sections.length) return;

    const setActive = (id) => {
        links.forEach((l) => {
            l.classList.toggle('is-active', l.dataset.navTarget === id);
        });
    };

    if ('IntersectionObserver' in window) {
        const io = new IntersectionObserver(
            (entries) => {
                // Pick the entry nearest the top of the band.
                entries.forEach((entry) => {
                    if (entry.isIntersecting) setActive(entry.target.id);
                });
            },
            // A thin probe line through the middle of the viewport — as
            // each section heading crosses it, that section becomes current.
            { rootMargin: '-50% 0px -47% 0px', threshold: 0 }
        );
        sections.forEach(({ el }) => io.observe(el));
        return;
    }

    // No IntersectionObserver — cheap scroll fallback.
    const onScroll = () => {
        let current = sections[0]?.id;
        for (const s of sections) {
            if (s.el.getBoundingClientRect().top <= window.innerHeight * 0.35) current = s.id;
        }
        setActive(current);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
}