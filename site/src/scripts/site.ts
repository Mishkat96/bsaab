import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import Lenis from 'lenis';

const root = document.documentElement;
const reduce = matchMedia('(prefers-reduced-motion: reduce)').matches;
const hero = document.getElementById('top')!;
const nav = document.getElementById('nav')!;
let lenis: Lenis | null = null;

/* ---------- Mobile menu ---------- */
const menu = document.getElementById('mobileMenu')!;
const menuBtn = document.getElementById('menuBtn')!;
const setMenu = (open: boolean) => {
  menu.classList.toggle('is-open', open);
  menu.setAttribute('aria-hidden', String(!open));
  menuBtn.setAttribute('aria-expanded', String(open));
  document.body.style.overflow = open ? 'hidden' : '';
  if (lenis) open ? lenis.stop() : lenis.start();
};
menuBtn.addEventListener('click', () => setMenu(true));
document.getElementById('menuClose')!.addEventListener('click', () => setMenu(false));
menu.querySelectorAll('.mobile-link').forEach((a) => a.addEventListener('click', () => setMenu(false)));
addEventListener('keydown', (e) => { if (e.key === 'Escape') setMenu(false); });

/* ---------- Nav: solid after the hero, hidden while scrolling down ---------- */
let lastY = scrollY;
const updateNav = () => {
  const y = scrollY;
  const heroEnd = hero.offsetHeight - 80;
  nav.classList.toggle('is-solid', y > heroEnd);
  if (y > heroEnd + 200 && y > lastY + 2 && !menu.classList.contains('is-open')) nav.classList.add('is-hidden');
  if (y < lastY - 2) nav.classList.remove('is-hidden');
  lastY = y;
};
addEventListener('scroll', updateNav, { passive: true });
updateNav();

/* ---------- Active section highlight ---------- */
const links = [...document.querySelectorAll<HTMLAnchorElement>('.nav-link')];
const spy = new IntersectionObserver((entries) => {
  entries.forEach((en) => {
    if (en.isIntersecting) links.forEach((l) => l.classList.toggle('is-active', l.getAttribute('href') === '#' + en.target.id));
  });
}, { rootMargin: '-45% 0px -50% 0px' });
links.forEach((l) => { const s = document.querySelector(l.getAttribute('href')!); if (s) spy.observe(s); });

/* ---------- Copy enterprise number ---------- */
const copyBtn = document.getElementById('copyReg');
copyBtn?.addEventListener('click', async () => {
  try {
    await navigator.clipboard.writeText(copyBtn.dataset.copy!);
    const msg = document.getElementById('copyMsg')!;
    msg.style.opacity = '1';
    setTimeout(() => (msg.style.opacity = '0'), 1600);
  } catch { /* clipboard blocked: the number stays visible to select */ }
});

/* ---------- Spotlight cards ---------- */
document.querySelectorAll<HTMLElement>('.spot').forEach((card) => card.addEventListener('pointermove', (e) => {
  const r = card.getBoundingClientRect();
  card.style.setProperty('--x', `${e.clientX - r.left}px`);
  card.style.setProperty('--y', `${e.clientY - r.top}px`);
}));

/* ---------- Forms ----------
   With PUBLIC_FORM_ENDPOINT set (e.g. a Formspree URL) submissions are POSTed there as JSON.
   Without it, the site runs in preview mode and says so instead of pretending to send. */
const required: Record<string, string[]> = {
  join: ['given_name', 'surname', 'email'],
  contact: ['name', 'email', 'message'],
};
const isEmail = (v: string) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v);

document.querySelectorAll<HTMLFormElement>('form[data-form]').forEach((form) => {
  const kind = form.dataset.form!;
  const error = form.querySelector<HTMLElement>('[data-error]')!;
  const success = document.querySelector<HTMLElement>(`[data-success="${kind}"]`)!;

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const data = Object.fromEntries(new FormData(form)) as Record<string, string>;
    const missing = required[kind].filter((f) => !(data[f] ?? '').trim() || (f === 'email' && !isEmail(data[f])));
    form.querySelectorAll('.input').forEach((i) => i.removeAttribute('aria-invalid'));
    missing.forEach((f) => form.elements.namedItem(f) instanceof HTMLElement && (form.elements.namedItem(f) as HTMLElement).setAttribute('aria-invalid', 'true'));
    if (missing.length) {
      error.textContent = kind === 'join'
        ? 'Please fill in your name and a valid email address.'
        : 'Please add your name, a valid email address and a message.';
      error.hidden = false;
      return;
    }
    error.hidden = true;
    if (data.website) return; // honeypot

    const endpoint = form.dataset.endpoint;
    const button = form.querySelector('button')!;
    if (endpoint) {
      button.disabled = true;
      try {
        const res = await fetch(endpoint, {
          method: 'POST',
          headers: { 'Content-Type': 'application/json', Accept: 'application/json' },
          body: JSON.stringify({ form: kind, ...data }),
        });
        if (!res.ok) throw new Error(String(res.status));
      } catch {
        error.textContent = 'Something went wrong sending this. Please try again or email info@bsaab.com.';
        error.hidden = false;
        button.disabled = false;
        return;
      }
    } else {
      success.querySelector('[data-success-text]')!.textContent =
        'This is a preview of the new website, so your details were not sent. To reach the committee today, email info@bsaab.com.';
    }
    form.hidden = true;
    success.hidden = false;
    if (!reduce) gsap.fromTo(success, { opacity: 0, y: 20 }, { opacity: 1, y: 0, duration: 0.8, ease: 'expo.out' });
  });
});

/* ---------- Motion ---------- */
if (!reduce) {
  root.classList.add('anim');
  (window as unknown as { __motionReady: boolean }).__motionReady = true;
  try {
    gsap.registerPlugin(ScrollTrigger);

    lenis = new Lenis({ duration: 1.15, easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)) });
    lenis.on('scroll', ScrollTrigger.update);
    gsap.ticker.add((t) => lenis!.raf(t * 1000));
    gsap.ticker.lagSmoothing(0);

    document.querySelectorAll<HTMLAnchorElement>('a[href^="#"]').forEach((a) => a.addEventListener('click', (e) => {
      const id = a.getAttribute('href')!;
      const target = id.length > 1 ? document.querySelector<HTMLElement>(id) : null;
      if (!target || !lenis) return;
      e.preventDefault();
      lenis.scrollTo(target, { offset: id === '#top' ? 0 : -72, duration: 1.4 });
      history.replaceState(null, '', id);
    }));

    // Hero intro
    const tl = gsap.timeline({ defaults: { ease: 'expo.out' } });
    tl.to('.hero-title .line > span', { y: 0, duration: 1.5, stagger: 0.1 }, 0.15)
      .to('[data-hero]', { opacity: 1, y: 0, duration: 1.2, stagger: 0.08 }, 0.55);

    // Fanned founding-team portraits
    const cards = gsap.utils.toArray<HTMLElement>('.fan-card');
    const mid = (cards.length - 1) / 2;
    cards.forEach((c, i) => gsap.set(c, { zIndex: 10 - Math.abs(i - mid) * 2 }));
    tl.fromTo(cards,
      { opacity: 0, y: 220, x: 0, rotate: 0, scale: 0.85 },
      { opacity: 1, scale: 1, duration: 1.8, stagger: 0.07,
        x: (i) => (i - mid) * 66, y: (i) => Math.abs(i - mid) * 20, rotate: (i) => (i - mid) * 6.5 }, 0.3);

    if (cards.length) {
      hero.addEventListener('pointermove', (e) => {
        const dx = e.clientX / innerWidth - 0.5;
        const dy = e.clientY / innerHeight - 0.5;
        cards.forEach((c) => {
          const d = Number(c.dataset.depth) || 1;
          gsap.to(c, { xPercent: dx * 10 * d, yPercent: dy * 8 * d, duration: 1.2, ease: 'power3.out', overwrite: 'auto' });
        });
      });
      cards.forEach((c) => {
        c.addEventListener('pointerenter', () => gsap.to(c, { scale: 1.07, duration: 0.6, ease: 'power3.out' }));
        c.addEventListener('pointerleave', () => gsap.to(c, { scale: 1, duration: 0.6, ease: 'power3.out' }));
      });
    }

    // Scroll reveals
    ScrollTrigger.batch('[data-reveal]', {
      start: 'top 88%',
      once: true,
      onEnter: (batch) => gsap.to(batch, { opacity: 1, y: 0, duration: 1.1, ease: 'expo.out', stagger: 0.07, overwrite: true }),
    });

    // Counters
    gsap.utils.toArray<HTMLElement>('[data-count]').forEach((el) => {
      const target = Number(el.dataset.count);
      const o = { v: 0 };
      el.textContent = '0';
      ScrollTrigger.create({
        trigger: el, start: 'top 92%', once: true,
        onEnter: () => { gsap.to(o, { v: target, duration: 1.8, ease: 'power3.out', onUpdate: () => { el.textContent = String(Math.round(o.v)); } }); },
      });
    });

    // Goals: pinned horizontal scroll on desktop
    gsap.matchMedia().add('(min-width: 1024px)', () => {
      const track = document.querySelector<HTMLElement>('.goals-track')!;
      const bar = document.querySelector<HTMLElement>('.goals-progress');
      const distance = () => Math.max(0, track.scrollWidth - innerWidth);
      gsap.to(track, {
        x: () => -distance(),
        ease: 'none',
        scrollTrigger: {
          trigger: '.goals', start: 'top top', end: () => '+=' + distance(),
          pin: true, scrub: 0.8, invalidateOnRefresh: true,
          onUpdate: (self) => { if (bar) bar.style.width = `${self.progress * 100}%`; },
        },
      });
    });

    gsap.utils.toArray<HTMLElement>('[data-parallax]').forEach((s) =>
      gsap.to(s, { y: -60, ease: 'none', scrollTrigger: { trigger: s.parentElement, scrub: true } }));

    addEventListener('load', () => ScrollTrigger.refresh());
  } catch (err) {
    console.error(err);
    root.classList.remove('anim');
  }
}
