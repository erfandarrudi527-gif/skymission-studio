(function () {
  'use strict';

  const burger = document.querySelector('.navbar__burger');
  const links = document.querySelector('.navbar__links');
  const cta = document.querySelector('.navbar__cta');

  if (!burger || !links) return;

  burger.addEventListener('click', () => {
    const isOpen = links.classList.toggle('navbar__links--open');
    burger.setAttribute('aria-expanded', String(isOpen));
    if (cta) cta.classList.toggle('navbar__cta--open', isOpen);
  });
})();

(function () {
  'use strict';

  const items = document.querySelectorAll('.faq-item');
  if (!items.length) return;

  items.forEach((item) => {
    const btn = item.querySelector('.faq-item__q');
    const answer = item.querySelector('.faq-item__a');
    if (!btn || !answer) return;

    btn.addEventListener('click', () => {
      const isOpen = item.classList.contains('is-open');

      items.forEach((other) => {
        if (other !== item) {
          other.classList.remove('is-open');
          other.querySelector('.faq-item__q').setAttribute('aria-expanded', 'false');
          other.querySelector('.faq-item__a').style.maxHeight = null;
        }
      });

      if (isOpen) {
        item.classList.remove('is-open');
        btn.setAttribute('aria-expanded', 'false');
        answer.style.maxHeight = null;
      } else {
        item.classList.add('is-open');
        btn.setAttribute('aria-expanded', 'true');
        answer.style.maxHeight = answer.scrollHeight + 'px';
      }
    });
  });
})();
