document.addEventListener("DOMContentLoaded", function () {
    const menuIcon = document.getElementById('menu-icon');
    const mobileMenu = document.getElementById('mobile-menu');

    menuIcon.addEventListener('click', function () {
        mobileMenu.classList.toggle('show');
    });
});