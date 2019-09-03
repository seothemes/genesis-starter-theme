var scrollPosition = window.scrollY,
    siteHeader = document.getElementsByClassName('site-header')[0],
    siteHeaderHeight = siteHeader.offsetHeight;

window.addEventListener('scroll', function () {

    scrollPosition = window.scrollY;

    if (scrollPosition >= siteHeaderHeight) {
        siteHeader.classList.add('sticky');
    } else {
        siteHeader.classList.remove('sticky');
    }

});

