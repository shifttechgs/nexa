import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';
import collapse from '@alpinejs/collapse';

window.Alpine = Alpine;

Alpine.plugin(intersect);
Alpine.plugin(collapse);

/* ---------------------------------------------------------------------------
   Quote list.

   Products a buyer adds while browsing ({ sku, name, qty }), kept in
   localStorage so the list survives moving between pages. The quote form
   submits it as items[]; storage failures (private mode, blocked site data)
   just leave the list in memory for the current page.
--------------------------------------------------------------------------- */
const QUOTE_KEY = 'nexa-quote-list';

const readQuote = () => {
    try {
        const items = JSON.parse(window.localStorage.getItem(QUOTE_KEY) || '[]');
        return Array.isArray(items) ? items : [];
    } catch (e) {
        return [];
    }
};

Alpine.store('quote', {
    items: readQuote(),

    get count() {
        return this.items.length;
    },
    has(sku) {
        return this.items.some((item) => item.sku === sku);
    },
    toggle(sku, name) {
        if (this.has(sku)) {
            this.remove(sku);
        } else {
            this.items.push({ sku, name, qty: 1 });
            this.save();
        }
    },
    setQty(sku, qty) {
        const item = this.items.find((i) => i.sku === sku);
        if (!item) return;
        item.qty = Math.max(1, parseInt(qty, 10) || 1);
        this.save();
    },
    remove(sku) {
        this.items = this.items.filter((item) => item.sku !== sku);
        this.save();
    },
    clear() {
        this.items = [];
        this.save();
    },
    save() {
        try {
            window.localStorage.setItem(QUOTE_KEY, JSON.stringify(this.items));
        } catch (e) {
            // storage unavailable: keep the in-memory list
        }
    },
});

/* ---------------------------------------------------------------------------
   Count-up number: x-data="countUp(4)" x-intersect.once="run()".

   The markup carries the real number, so it reads correctly without JS and
   under prefers-reduced-motion; otherwise it drops to 0 and counts up with an
   ease-out once it scrolls into view (a beat after its reveal starts).
--------------------------------------------------------------------------- */
Alpine.data('countUp', (target, duration = 1400) => ({
    reduced: window.matchMedia('(prefers-reduced-motion: reduce)').matches,
    init() {
        if (!this.reduced) this.$el.textContent = '0';
    },
    run() {
        if (this.reduced) return;
        const easeOut = (t) => 1 - Math.pow(1 - t, 3);
        let start = null;
        const step = (now) => {
            start ??= now;
            const t = Math.min(1, (now - start) / duration);
            this.$el.textContent = String(Math.round(target * easeOut(t)));
            if (t < 1) window.requestAnimationFrame(step);
        };
        window.setTimeout(() => window.requestAnimationFrame(step), 250);
    },
}));

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

/* ---------------------------------------------------------------------------
   Scroll-linked section progress.

   Any element carrying [data-scroll-progress] gets a --p custom property
   (0 → 1, eased) that tracks its entry: 0 as its top crosses the bottom of
   the viewport, 1 once its top reaches ~30% viewport height. CSS maps --p to
   the motion, so it follows the scroll and reverses on the way back up.
   Left at the CSS default (fully revealed) under prefers-reduced-motion.
--------------------------------------------------------------------------- */
function initScrollProgress() {
    const targets = [...document.querySelectorAll('[data-scroll-progress]')];
    if (!targets.length) return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    let ticking = false;
    const easeOut = (t) => 1 - Math.pow(1 - t, 3);

    const update = () => {
        ticking = false;
        const vh = window.innerHeight;
        const start = vh;
        const end = vh * 0.3;

        targets.forEach((el) => {
            const top = el.getBoundingClientRect().top;
            const progress = Math.max(0, Math.min(1, (start - top) / (start - end)));
            el.style.setProperty('--p', easeOut(progress).toFixed(4));
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

/* ---------------------------------------------------------------------------
   Hero parallax.

   The [data-hero-parallax] wrapper drifts down at a fifth of the scroll speed
   and grows slightly while the hero scrolls away, so the photo sits deeper
   than the copy. The ken-burns on the image itself keeps running inside it.
   Skipped under prefers-reduced-motion.
--------------------------------------------------------------------------- */
function initHeroParallax() {
    const layer = document.querySelector('[data-hero-parallax]');
    if (!layer) return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    const hero = layer.parentElement;
    let ticking = false;

    const update = () => {
        ticking = false;
        const height = hero.offsetHeight;
        const scrolled = Math.min(Math.max(-hero.getBoundingClientRect().top, 0), height);
        const progress = height ? scrolled / height : 0;
        layer.style.transform = `translate3d(0, ${(scrolled * 0.2).toFixed(1)}px, 0) scale(${(1 + progress * 0.05).toFixed(4)})`;
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

/* ---------------------------------------------------------------------------
   Automatic scroll reveal.

   Tags the content blocks inside <main> (headings, copy, lists, images and each
   card of a grid) with [data-auto-reveal]; each one rises 40px into place as it
   enters the viewport. Blocks that come in together follow each other 50ms
   apart (capped at 400ms). Anything inside a block that's already tagged is
   left alone, as is anything with its own entrance: [data-reveal],
   [data-word-reveal], .rise-in and the hero ([data-no-reveal]).
   Skipped entirely under prefers-reduced-motion.
--------------------------------------------------------------------------- */
const REVEAL_UNITS = '.grid > *, h2, h3, h4, p, ul, ol, blockquote, figure, picture, img, form, table';
const REVEAL_SKIP = '[data-no-reveal], [data-reveal], [data-reveal-stagger], [data-word-reveal], .rise-in';

function initAutoReveal() {
    const root = document.querySelector('main');
    if (!root || !('IntersectionObserver' in window)) return;
    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;

    const units = [];
    root.querySelectorAll(REVEAL_UNITS).forEach((el) => {
        if (el.closest(REVEAL_SKIP)) return;
        if (el.parentElement.closest('[data-auto-reveal]')) return;
        // Already scrolled past (e.g. a reload part-way down): leave it visible.
        if (el.getBoundingClientRect().bottom < 0) return;
        el.setAttribute('data-auto-reveal', '');
        units.push(el);
    });

    // Once it has landed, drop the attribute so the element's own transitions apply again.
    const settle = (el) => {
        el.removeAttribute('data-auto-reveal');
        el.classList.remove('is-in');
        el.style.removeProperty('--reveal-delay');
    };

    const observer = new IntersectionObserver((entries) => {
        entries
            .filter((entry) => entry.isIntersecting)
            .sort((a, b) => a.boundingClientRect.top - b.boundingClientRect.top || a.boundingClientRect.left - b.boundingClientRect.left)
            .forEach((entry, i) => {
                const el = entry.target;
                const delay = Math.min(i * 50, 400);
                observer.unobserve(el);
                el.style.setProperty('--reveal-delay', `${delay}ms`);
                el.classList.add('is-in');
                window.setTimeout(() => settle(el), delay + 500);
            });
    }, { rootMargin: '0px 0px -8% 0px' });

    units.forEach((el) => observer.observe(el));

    // A fast fling (common on phones) can carry a block from below the viewport to above it
    // between two observer checks, so it never registers as intersecting and would stay
    // hidden. Anything that ends up above the viewport is shown straight away instead.
    let ticking = false;
    const sweep = () => {
        ticking = false;
        const pending = root.querySelectorAll('[data-auto-reveal]:not(.is-in)');
        if (!pending.length) {
            window.removeEventListener('scroll', onScroll);
            return;
        }
        pending.forEach((el) => {
            if (el.getBoundingClientRect().bottom < 0) {
                observer.unobserve(el);
                settle(el);
            }
        });
    };
    const onScroll = () => {
        if (ticking) return;
        ticking = true;
        window.requestAnimationFrame(sweep);
    };
    window.addEventListener('scroll', onScroll, { passive: true });
}

function init() {
    // iOS Safari only applies :active (the tap state of cards and buttons) once a touch listener exists.
    document.addEventListener('touchstart', () => {}, { passive: true });
    initWordReveal();
    initScrollProgress();
    initHeroParallax();
    initAutoReveal();
}

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
} else {
    init();
}
