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

let logout = document.getElementById('logout-btn')
let logoutMessage = document.getElementById('logout-message')
let logoutIcon = document.getElementById('logout-icon')

logout.addEventListener('click', () => { 
    if (logoutMessage.classList.contains('shown')) {
        logoutMessage.classList.remove('shown')
        logoutIcon.classList.remove('shown')
    } else {
        logoutMessage.classList.add('shown')
        logoutIcon.classList.add('shown')
    }
})