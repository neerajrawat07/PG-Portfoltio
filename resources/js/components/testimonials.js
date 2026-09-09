/**
 * Auto-advancing testimonial slider: arrows + dots + 6s interval,
 * paused while hovered. Slides crossfade via .is-idle.
 */
export default function initTestimonials() {
    const slider = document.getElementById('testiSlider');
    if (!slider) return;

    const slides = [...slider.querySelectorAll('[data-t-slide]')];
    const dots = [...slider.querySelectorAll('[data-t-dot]')];
    const prev = slider.querySelector('[data-t-prev]');
    const next = slider.querySelector('[data-t-next]');
    if (slides.length < 2) return;

    const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    let index = 0;
    let timer;

    const show = (n) => {
        index = (n + slides.length) % slides.length;
        slides.forEach((s, i) => s.classList.toggle('is-idle', i !== index));
        dots.forEach((d, i) => d.classList.toggle('is-active', i === index));
    };

    const start = () => { if (!reduced) timer = setInterval(() => show(index + 1), 6000); };
    const stop = () => clearInterval(timer);

    prev?.addEventListener('click', () => { stop(); show(index - 1); start(); });
    next?.addEventListener('click', () => { stop(); show(index + 1); start(); });
    dots.forEach((d, i) => d.addEventListener('click', () => { stop(); show(i); start(); }));

    slider.addEventListener('mouseenter', stop);
    slider.addEventListener('mouseleave', start);

    show(0);
    start();
}