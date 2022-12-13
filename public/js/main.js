'use stict'

let burgerBtn = document.getElementById('burger-btn')
let menu = document.getElementById('admin-menu')

burgerBtn.addEventListener('click', () => {
    if (menu.classList.contains('admin__nav-shown')) {
        burgerBtn.classList.remove('admin__burger-shown')
        menu.classList.remove('admin__nav-shown')
    } else {
        burgerBtn.classList.add('admin__burger-shown')
        menu.classList.add('admin__nav-shown')
    }
})