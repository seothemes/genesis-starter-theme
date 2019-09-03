function hide(element) {
    var el = document.getElementsByClassName(element)[0];
    el.style.opacity = 1;

    (function fade() {
        if ((el.style.opacity -= 0.1) < 0) {
            el.style.display = 'none';
        } else {
            requestAnimationFrame(fade);
        }
    })();
}

function show(element, display) {
    var el = document.getElementsByClassName(element)[0];

    el.style.opacity = 0;
    el.style.display = display || 'inline-flex';

    (function fade() {
        var val = parseFloat(el.style.opacity);

        if (!((val += 0.1) > 1)) {
            el.style.opacity = val;
            requestAnimationFrame(fade);
        }
    })();
}

// Hide modal on click outside.
document.addEventListener('click', function (event) {
    var modal = document.getElementsByClassName('modal')[0];

    if (!modal || event.target.closest('.modal')) {
        return;
    }

    if ('1' === modal.style.opacity) {
        hide('modal');
    }
});

