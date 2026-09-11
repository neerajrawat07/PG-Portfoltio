/**
 * Split-word masked reveal for display headings.
 *
 * Elements marked [data-mask-reveal] get their text split into word
 * "masks" — each word is an overflow:hidden box containing an inner span
 * that slides up into place on scroll. Pure CSS transitions (no GSAP);
 * inline transition-delay gives the stagger. `.grad-text` spans are kept
 * whole (wrapped as a single word) so gradient background-clip:text keeps
 * rendering correctly inside the masks.
 */
export default function initSplitReveals() {
    const els = document.querySelectorAll('[data-mask-reveal]');
    if (!els.length) return;

    const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    if (reduced) {
        els.forEach((el) => el.classList.add('is-in'));
        return;
    }

    els.forEach((el) => {
        if (el.dataset.maskDone) return;
        el.dataset.maskDone = '1';
        splitWords(el);
    });

    const io = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('is-in');
                    io.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.45, rootMargin: '0px 0px -10% 0px' }
    );
    els.forEach((el) => io.observe(el));
}

function splitWords(root) {
    const counter = { n: 0 };

    const rebuild = (el) => {
        const kids = Array.from(el.childNodes);
        /* First strip any text nodes so we can re-gather cleanly. */
        kids.forEach((node) => {
            if (node.nodeType === Node.TEXT_NODE) {
                processText(node.ownerDocument, node, counter);
            } else if (node.nodeType === Node.ELEMENT_NODE) {
                if (node.tagName === 'BR' || node.dataset.maskKept) return;
                /* Keep gradient spans whole — wrapping them preserves
                   background-clip:text across the nested word boxes. */
                if (/(^|\s)grad-text(-\S+)?(\s|$)/.test(node.className || '')) {
                    node.dataset.maskKept = '1';
                    wrapElementInWord(node, counter);
                } else {
                    rebuild(node);
                }
            }
        });
    };

    rebuild(root);
}

function processText(doc, node, counter) {
    const text = node.textContent;
    if (!text.trim()) return;
    const frag = doc.createDocumentFragment();
    const tokens = text.split(/(\s+)/);

    let started = false;
    for (const tok of tokens) {
        if (!tok.length) continue;
        if (/^\s+$/.test(tok)) {
            if (started) frag.appendChild(doc.createTextNode(' '));
            continue;
        }
        started = true;
        frag.appendChild(makeWord(doc.createTextNode(tok), counter));
    }
    node.replaceWith(frag);
}

function makeWord(child, counter) {
    const mask = document.createElement('span');
    mask.className = 'mask-word';

    const inner = document.createElement('span');
    inner.className = 'mask-word__inner';
    inner.appendChild(child);
    inner.style.transitionDelay = `${(counter.n++ * 0.045).toFixed(3)}s`;

    mask.appendChild(inner);
    return mask;
}

/**
 * Wrap an existing element (e.g. a .grad-text span) in a word-mask. The
 * mask is inserted first, THEN the element is moved inside — never
 * `replaceWith(wrapper)` where the wrapper already contains the node,
 * which throws HierarchyRequestError ("new child contains the parent").
 */
function wrapElementInWord(el, counter) {
    const mask = document.createElement('span');
    mask.className = 'mask-word';

    const inner = document.createElement('span');
    inner.className = 'mask-word__inner';
    inner.style.transitionDelay = `${(counter.n++ * 0.045).toFixed(3)}s`;
    mask.appendChild(inner);

    // mask does NOT contain el yet, so this swap is legal…
    el.replaceWith(mask);
    // …then move el inside the mask.
    inner.appendChild(el);
}
