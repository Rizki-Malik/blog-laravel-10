document.addEventListener('DOMContentLoaded', function () {
    var openMenuButton = document.getElementById('openMenuButton');
    var closeMenuButton = document.getElementById('closeMenuButton');
    var mobileMenu = document.getElementById('mobileMenu');

    openMenuButton.addEventListener('click', function () {
        mobileMenu.classList.remove('hidden');
    });

    closeMenuButton.addEventListener('click', function () {
        mobileMenu.classList.add('hidden');
    });
});
