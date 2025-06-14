import './bootstrap';

import Alpine from 'alpinejs';
import { initNavbarScroll } from './navigation';   // solo importa la función, no el módulo completo dos veces
import { initCategoryScroll } from './categories';

window.Alpine = Alpine;
Alpine.start();

// Espera a que Alpine inserte el DOM (después de x-data)
document.addEventListener('DOMContentLoaded', () => {
    const nav = document.getElementById('mainNav');
    if (nav) {initNavbarScroll(nav);}
    initCategoryScroll();
});
