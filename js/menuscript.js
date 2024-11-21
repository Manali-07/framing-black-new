document.addEventListener('DOMContentLoaded', function () {
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarCollapse = document.querySelector('#navbarNav');

    // Check if the navbar-toggler and navbarCollapse elements exist
    if (navbarToggler && navbarCollapse) {
        // Toggle the menu when the hamburger icon is clicked
        navbarToggler.addEventListener('click', function (e) {
            e.stopPropagation(); // Prevent event bubbling to document click listener

            // Only toggle the menu if the screen width is less than or equal to 991.98px
            if (window.innerWidth <= 991.98) {
                this.classList.toggle('open'); // Toggle the open class for icon (animate it)
                navbarCollapse.classList.toggle('show'); // Toggle the visibility of the menu
            }
        });

        // Close the menu if clicked outside of it
        document.addEventListener('click', function (e) {
            if (window.innerWidth <= 991.98) {
                // Check if the menu is open and the click is outside the menu and toggler
                if (navbarCollapse.classList.contains('show') &&
                    !navbarToggler.contains(e.target) &&
                    !navbarCollapse.contains(e.target)) {
                    navbarCollapse.classList.remove('show'); // Hide the menu
                    navbarToggler.classList.remove('open'); // Reset the hamburger icon
                }
            }
        });
    } else {
        console.log("Navbar toggler or navbar collapse element is missing.");
    }
});
