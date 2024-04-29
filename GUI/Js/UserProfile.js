const list_menu = document.querySelectorAll('.user-menu-main li');

const rightContent = document.querySelectorAll('.content-right');
function hideContentRight() {
    rightContent.forEach((current, i) => {
        current.classList.add('display_none');
    })
}
function activeMenu() {
    list_menu.forEach((current, i) => {
        if (current.classList.contains('menu-active')) {
            current.classList.remove('menu-active');
        }
    })
}

list_menu.forEach((current, i) => {
    current.addEventListener('click', () => {
        activeMenu();
        hideContentRight();
        if (i == 0) {
            list_menu[i].classList.add('menu-active');
            rightContent[i].classList.remove('display_none');
        }
        else if (i == 1) {
            list_menu[i].classList.add('menu-active');
            rightContent[i].classList.remove('display_none');
        }
        else if (i == 2) {
            list_menu[i].classList.add('menu-active');
            rightContent[i].classList.remove('display_none');
        }
    })
})

