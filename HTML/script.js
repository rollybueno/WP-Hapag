const toggle = document.querySelector('.menu-toggle');
const nav = document.querySelector('#site-nav');

toggle?.addEventListener('click', () => {
  const isOpen = nav.classList.toggle('open');
  toggle.setAttribute('aria-expanded', String(isOpen));
});

nav?.querySelectorAll('a').forEach((link) => {
  link.addEventListener('click', () => {
    nav.classList.remove('open');
    toggle?.setAttribute('aria-expanded', 'false');
  });
});

document.querySelector('.newsletter form')?.addEventListener('submit', (event) => {
  event.preventDefault();
  const form = event.currentTarget;
  const input = form.querySelector('input');
  form.innerHTML = '<p><strong>You’re on the list.</strong> Save room for something good.</p>';
  input?.blur();
});
