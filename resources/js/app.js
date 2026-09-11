import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';
import collapse from '@alpinejs/collapse';

window.Alpine = Alpine;

Alpine.plugin(intersect);
Alpine.plugin(collapse);
Alpine.start();

/* ---------------------------------------------------------------------------
   Word-by-word statement reveal.

   Any element carrying [data-word-reveal] has its text split into per-word
   spans that fade from dim to lit as the section scrolls through the viewport.
   Honours prefers-reduced-motion by lighting every word immediately.
--------------------------------------------------------------------------- */
function initWordReveal() {
    const targets = document.querySelectorAll('[data-word-reveal]');
    if (!targets.length) return;

    const reduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    const instances = [];

    targets.forEach((el) => {
        const text = el.textContent.trim().replace(/\s+/g, ' ');
        el.textContent = '';

        const words = text.split(' ').map((word) => {
            const span = document.createElement('span');
            span.className = 'wr-word';
            span.textContent = word;
            el.appendChild(span);
            el.appendChild(document.createTextNode(' '));
            return span;
        });

        if (reduced) {
            words.forEach((w) => w.classList.add('is-lit'));
            return;
        }

        instances.push({ el, words });
    });

    if (!instances.length) return;

    let ticking = false;

    const update = () => {
        ticking = false;
        const vh = window.innerHeight;

        instances.forEach(({ el, words }) => {
            const rect = el.getBoundingClientRect();
            // Progress: 0 when the block's top sits at 80% viewport height,
            // 1 by the time its top reaches ~28% viewport height.
            const start = vh * 0.8;
            const end = vh * 0.28;
            const progress = Math.max(0, Math.min(1, (start - rect.top) / (start - end)));

            const lit = Math.round(progress * words.length);
            words.forEach((w, i) => {
                w.classList.toggle('is-lit', i < lit);
            });
        });
    };

    const onScroll = () => {
        if (ticking) return;
        ticking = true;
        window.requestAnimationFrame(update);
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    window.addEventListener('resize', onScroll, { passive: true });
    update();
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initWordReveal);
} else {
    initWordReveal();
}
