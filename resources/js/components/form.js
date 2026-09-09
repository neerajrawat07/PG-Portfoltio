/**
 * Contact form → Web3Forms. Handles validation, loading, success and
 * error states with accessible status output (aria-live).
 */
export default function initForm() {
    const form = document.getElementById('contactForm');
    if (!form) return;

    // Toggle a "stuck" state on the sticky form as it pins near the top of
    // the viewport, so its shadow/position animates smoothly while scrolling.
    const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (!reduced && 'IntersectionObserver' in window) {
        const io = new IntersectionObserver(
            ([e]) => form.classList.toggle('is-stuck', !e.isIntersecting),
            { rootMargin: '-120px 0px 0px 0px', threshold: 0 }
        );
        io.observe(form);
    }

    const status = document.getElementById('formStatus');
    const submit = form.querySelector('button[type="submit"]');
    const label = submit.querySelector('[data-label]');
    const spinner = submit.querySelector('.spinner');
    const original = submit.innerText;

    const setStatus = (kind, msg) => {
        status.classList.remove('hidden');
        status.classList.toggle('bg-emerald-50', kind === 'ok');
        status.classList.toggle('text-emerald-700', kind === 'ok');
        status.classList.toggle('bg-rose-50', kind === 'error');
        status.classList.toggle('text-rose-700', kind === 'error');
        status.textContent = msg;
    };

    const setBusy = (busy) => {
        submit.disabled = busy;
        label.textContent = busy ? 'Sending...' : 'Start a Conversation';
        spinner.classList.toggle('hidden', !busy);
        status.classList.add('hidden');
    };

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const name = form.name.value.trim();
        const email = form.email.value.trim();
        const message = form.message.value.trim();
        if (!name || !email || !message) {
            setStatus('error', 'Please fill in your name, email and message.');
            return;
        }
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
            setStatus('error', 'Please enter a valid email address.');
            return;
        }

        setBusy(true);

        try {
            const payload = Object.fromEntries(new FormData(form));
            const res = await fetch('https://api.web3forms.com/submit', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', Accept: 'application/json' },
                body: JSON.stringify(payload),
            });
            const json = await res.json();

            if (json.success) {
                setStatus('ok', "Thank you! Your message has been sent — I'll get back to you shortly.");
                form.reset();
            } else {
                setStatus('error', json.message || 'Something went wrong. Please try again.');
            }
        } catch {
            setStatus('error', 'Network error. Please check your connection and try again.');
        } finally {
            setBusy(false);
        }
    });
}