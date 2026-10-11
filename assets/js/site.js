/*!
 * IronCybriq — site.js
 * Vanilla JavaScript, no dependencies. Everything here is progressive
 * enhancement: the site is fully usable if this file never runs.
 */
(function () {
  'use strict';

  var doc = document;
  var root = doc.documentElement;

  /* ---- Header: soft shadow once the page has scrolled ------------------ */
  var header = doc.querySelector('[data-header]');

  if (header) {
    var onScroll = function () {
      header.classList.toggle('is-scrolled', window.scrollY > 8);
    };
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });
  }

  /* ---- Mobile navigation ----------------------------------------------- */
  var toggle = doc.querySelector('[data-nav-toggle]');
  var nav = doc.querySelector('[data-nav]');

  if (toggle && nav) {
    var desktop = window.matchMedia('(min-width: 56em)');

    var setOpen = function (open) {
      toggle.setAttribute('aria-expanded', String(open));
      nav.classList.toggle('is-open', open);
    };

    toggle.addEventListener('click', function () {
      setOpen(toggle.getAttribute('aria-expanded') !== 'true');
    });

    // Close on Escape (and give focus back to the button)
    doc.addEventListener('keydown', function (event) {
      if (event.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') {
        setOpen(false);
        toggle.focus();
      }
    });

    // Close when a link is chosen or the page is tapped outside the menu
    nav.addEventListener('click', function (event) {
      if (event.target.closest('a')) { setOpen(false); }
    });

    doc.addEventListener('click', function (event) {
      if (!header.contains(event.target)) { setOpen(false); }
    });

    // Reset when resizing up to the desktop layout
    var onBreakpoint = function (event) { if (event.matches) { setOpen(false); } };
    if (desktop.addEventListener) { desktop.addEventListener('change', onBreakpoint); }
    else if (desktop.addListener) { desktop.addListener(onBreakpoint); }

    // The collapsed menu must not be reachable by keyboard
    setOpen(false);
  }

  /* ---- Scroll reveal --------------------------------------------------- */
  var items = [].slice.call(doc.querySelectorAll('[data-reveal]'));

  if (items.length && 'IntersectionObserver' in window) {
    // Stagger children of a group
    [].forEach.call(doc.querySelectorAll('[data-stagger]'), function (group) {
      [].forEach.call(group.children, function (child, index) {
        if (child.hasAttribute('data-reveal')) {
          child.style.setProperty('--i', Math.min(index, 5));
        }
      });
    });

    // Anything already on screen is shown straight away (no flash)
    var viewport = window.innerHeight || root.clientHeight;
    var pending = items.filter(function (item) {
      if (item.getBoundingClientRect().top < viewport * 0.92) {
        item.classList.add('is-visible');
        return false;
      }
      return true;
    });

    root.classList.add('js-ready');

    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target);
        }
      });
    }, { rootMargin: '0px 0px -8% 0px', threshold: 0.08 });

    pending.forEach(function (item) { observer.observe(item); });
  }

  /* ---- Contact form ---------------------------------------------------- */
  var form = doc.getElementById('contact-form');

  if (form && window.fetch && window.FormData) {
    var success = doc.getElementById('form-success');
    var failure = doc.getElementById('form-error');
    var submit = form.querySelector('[type="submit"]');

    var show = function (ok) {
      success.hidden = !ok;
      failure.hidden = ok;
      (ok ? success : failure).scrollIntoView({ block: 'nearest', behavior: 'smooth' });
    };

    form.addEventListener('submit', function (event) {
      // Let the browser's built-in validation speak first
      if (!form.checkValidity()) { return; }

      event.preventDefault();
      submit.disabled = true;
      submit.setAttribute('aria-busy', 'true');

      fetch(form.getAttribute('action').split('#')[0], {
        method: 'POST',
        body: new FormData(form),
        headers: { 'Accept': 'application/json' },
        credentials: 'same-origin'
      })
        .then(function (response) { return response.json(); })
        .then(function (result) {
          if (result && result.ok) { form.reset(); }
          show(Boolean(result && result.ok));
        })
        .catch(function () { show(false); })
        .then(function () {
          submit.disabled = false;
          submit.removeAttribute('aria-busy');
        });
    });
  }
})();
