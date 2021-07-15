//Burguer Button
let burguer_button = document.getElementsByClassName('burguer-button')[0];
burguer_button.addEventListener('click', function (e) {
    e.preventDefault();
    this.classList.toggle('active');
    document.getElementsByClassName('header-menu-container')[0].classList.toggle('active');
});

console.log(burguer_button);

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


// Show / hide submenus

let link_empty = document.querySelectorAll('li.menu-item-has-children');
link_empty.forEach((item) => {
    item.addEventListener('click', (e) => {
        e.preventDefault();

        let shown_elements = document.querySelectorAll('.shown');
        for (let i = 0; i < shown_elements.length; i++) {
            if (shown_elements[i] !== item.querySelectorAll('.sub-menu')[0]) {
                shown_elements[i].classList.remove('shown');
            }
        }

        item.querySelector('.sub-menu').classList.toggle('shown');
    });
});