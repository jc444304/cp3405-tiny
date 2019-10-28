// Author: Yvan Burrie
window.addEventListener('scroll', function (event) {

    const ontop = 'navbar-ontop';
    const navbar = $('.navbar');
    const computedStyle = getComputedStyle(document.documentElement);
    const navbarHeightMin = computedStyle.getPropertyValue('$navbar-height-min');
    const navbarHeightMax = computedStyle.getPropertyValue('$navbar-height-max');

    if (scrollY > 50) {
        if (navbar.hasClass(ontop)) {
            navbar.removeClass(ontop);
            navbar.animate({
                height: navbarHeightMin
            }, 100);
        }
    } else {
        if (navbar.hasClass(ontop) === false) {
            navbar.addClass(ontop);
            navbar.animate({
                height: navbarHeightMax
            }, 500);
        }
    }
});
