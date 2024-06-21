let listElements = document.querySelectorAll('.list__button--click');
let hamburger = document.getElementById('hamburger');
let nav = document.getElementById('nav');
let submenus = document.querySelectorAll('.list__show');
let logo = document.querySelector('.logo'); // Seleccionamos el logo

listElements.forEach(listElement => {
    listElement.addEventListener('click', () => {
        listElement.classList.toggle('arrow');

        let height = 0;
        let menu = listElement.nextElementSibling;

        if (menu.clientHeight == "0") {
            height = menu.scrollHeight;
            openMenu(); // Abre el menú antes de expandir el submenú
        }

        menu.style.height = height + 'px';
    });
});

function openMenu() {
    nav.style.width = '240px';
    hamburger.style.left = '250px';
    logo.style.clipPath = 'polygon(0 0, 100% 0, 100% 100%, 0 100%)'; // Mostramos el logo
}

function closeMenu() {
    nav.style.width = '55px';
    hamburger.style.left = '65px';
    submenus.forEach(submenu => {
        submenu.style.height = '0px';
    });
    logo.style.clipPath = 'polygon(0 0, 0 0, 0 98%, 0 100%)'; // Ocultamos el logo
}

hamburger.addEventListener('click', () => {
    if (nav.clientWidth == 240) {
        closeMenu();
    } else if (nav.clientWidth == 55) {
        openMenu();
    }
});
