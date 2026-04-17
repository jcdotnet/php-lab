import './bootstrap';

// nav menu
document.querySelector('.nav-menu-button button').addEventListener('click', (event) => {
  const mobileMenu = document.querySelector('#mobile-menu');
  mobileMenu.toggleAttribute('hidden');
  const button = event.target.closest('button');
  button.setAttribute('aria-expanded', button.getAttribute('aria-expanded') !== 'true');
});