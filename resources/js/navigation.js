import { gsap } from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

/**
 * Configura el efecto de cambio de color / blur al hacer scroll.
 * Se llama desde Blade cuando Alpine está listo.
 * @param {HTMLElement} nav Elemento #mainNav
 */
export function initNavbarScroll(nav) {
  const st = ScrollTrigger.create({
    start: 'top -40',
    onEnter:     () => nav.classList.add('nav--scrolled'),
    onLeaveBack: () => nav.classList.remove('nav--scrolled'),
  });

  // Congela el estado cuando el drawer móvil está abierto
  window.addEventListener('nav:open',  () => st.disable());
  window.addEventListener('nav:close', () => st.enable());
}
