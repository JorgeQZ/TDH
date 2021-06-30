// Header Shrinking

let scrollPosition = window.scrollY;
let header_nav = document.getElementsByClassName('main-header')[0];

window.addEventListener('scroll', function () {
    scrollPosition = window.scrollY;

    if (scrollPosition >= 90) {
        header_nav.classList.add('shrinked');
    } else {
        header_nav.classList.remove('shrinked');
    }
});

let link_empty = document.querySelectorAll('.menu-item-has-children >a[href="#"]');
link_empty.forEach((item) => {
    item.addEventListener('click', (e) => {
        e.preventDefault();

        document.getElementsByClassName('sub-menu').classList.remove('shown');
        item.nextElementSibling.classList.toggle('shown');

        console.log(item.nextElementSibling);
    });
});