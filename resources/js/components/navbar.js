/**
 * Navbar: elevates + blurs once scrolled; powers the animated
 * fullscreen mobile menu (burger <-> cross, aria state).
 */
export default function initNavbar() {
    const nav = document.getElementById('navbar');
    const burger = document.getElementById('burger');
    const menu = document.getElementById('mobileMenu');
    const lines = burger ? burger.querySelectorAll('.burger-line') : [];
    if (!nav) return;

    const onScroll = () => nav.classList.toggle('is-scrolled', window.scrollY > 12);

    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });

    if (burger && menu) {
        let open = false;

        const setOpen = (next) => {
            open = next;
            burger.setAttribute('aria-expanded', String(open));
            burger.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
            menu.classList.toggle('is-open', open);
            nav.classList.toggle('burger-open', open);
            document.documentElement.classList.toggle('m-menu-open', open);
            lines.forEach((l, i) => {
                l.style.transition = 'all .3s ease';
                l.style.width = i === 0 ? '26px' : '20px';
            });
            if (open) {
                lines[0].style.transform = 'translateY(7px) rotate(45deg)';
                lines[1].style.transform = 'translateY(-7px) rotate(-45deg)';
            } else {
                lines[0].style.transform = '';
                lines[1].style.transform = '';
            }
        };

        burger.addEventListener('click', () => setOpen(!open));

        // Tap a menu link → close.
        menu.querySelectorAll('a').forEach((a) =>
            a.addEventListener('click', () => setOpen(false))
        );
    }
}