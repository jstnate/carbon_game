'use stict'

let burgerBtn = document.getElementById('burger-btn')
let adminBg = document.getElementById('admin-nav')
let menu = document.getElementById('admin-menu')

if (burgerBtn != null) {
    burgerBtn.addEventListener('click', () => {
        if (menu.classList.contains('admin__nav-shown')) {
            burgerBtn.classList.remove('admin__burger-shown')
            menu.classList.remove('admin__nav-shown')
            adminBg.classList.remove('show')
        } else {
            burgerBtn.classList.add('admin__burger-shown')
            menu.classList.add('admin__nav-shown')
            adminBg.classList.add('show')
        }
    })
}



if (window.innerWidth <= 760) {
    document.querySelectorAll('#message-action').forEach((item) => {
        item.addEventListener('click', () => {
            if (item.classList.contains('message-compact')) {
                item.classList.remove('message-compact')
                item.classList.add('message-full')
            } else {
                item.classList.remove('message-full')
                item.classList.add('message-compact')
            }
        })
    })
    
}