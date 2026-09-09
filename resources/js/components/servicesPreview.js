/**
 * Service preview — "What I Offer" rows.
 *
 * Hovering a service row swaps the floating preview card's image
 * (crossfade) and slides the card in. Leaving the list slides it out.
 * Also handles click: on touch/coarse pointers a tap pins the card.
 */
export default function initServicesPreview() {
    const wrap = document.querySelector('.svc-wrap');
    if (!wrap) return;

    const rows = [...wrap.querySelectorAll('.service-row')];
    const preview = wrap.querySelector('.svc-preview');
    const img = preview?.querySelector('.svc-preview__img');
    const label = preview?.querySelector('.svc-preview__label');
    if (!preview || !img || !label || !rows.length) return;

    const coarse = window.matchMedia('(pointer: coarse)').matches;

    let activeRow = null;
    let pinned = null;

    // Set the image; while the new frame loads the card dims (fade-through
    // crossfade), then brightens back once decoded — cached images load on
    // the next frame so this feels instant on repeat visits.
    const setImage = (row) => {
        const newSrc = row.dataset.img || '';
        if (newSrc && newSrc !== img.dataset.loaded) {
            preview.classList.add('is-loading');
            img.addEventListener('load', () => {
                if (img.dataset.loaded === newSrc) preview.classList.remove('is-loading');
            }, { once: true });
            img.src = newSrc;
            img.dataset.loaded = newSrc;
        }
        img.alt = row.dataset.alt || '';
        label.textContent = row.querySelector('.s-name')?.textContent.trim() || '';
    };

    const enter = (row) => {
        activeRow = row;
        setImage(row);
        preview.classList.add('is-active');
    };

    const leave = () => {
        activeRow = null;
        preview.classList.remove('is-active');
    };

    rows.forEach((row) => {
        row.addEventListener('mouseenter', () => {
            pinned = null;
            enter(row);
        });
        row.addEventListener('mouseleave', () => {
            if (!pinned && activeRow === row) leave();
        });
        row.addEventListener('click', () => {
            if (!coarse) return; // click is a hover by-product on fine pointers
            pinned = pinned === row ? null : row;
            if (pinned) enter(pinned);
            else leave();
        });
    });

    // Leaving the whole area dismisses the card (unless pinned).
    wrap.addEventListener('mouseleave', () => {
        if (!pinned) leave();
    });
}