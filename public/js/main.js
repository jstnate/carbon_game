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


let burgerBtnClient = document.getElementById('burger-btn')
let clientBg = document.getElementById('client-nav')
let menuClient = document.getElementById('client-menu')

burgerBtnClient.addEventListener('click', () => {
    if (menuClient.classList.contains('client__nav-shown')) {
        burgerBtnClient.classList.remove('client__burger-shown')
        menuClient.classList.remove('client__nav-shown')
        clientBg.classList.remove('show')
    } else {
        burgerBtnClient.classList.add('client__burger-shown')
        menuClient.classList.add('client__nav-shown')
        clientBg.classList.add('show')
    }
})



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

if(window.innerWidth >= 760){
    if(document.querySelectorAll('.phone-link-to-add') != null){
        document.querySelectorAll('.phone-link-to-add').forEach((item) => {
            item.innerHTML = "Ajouter une carte"
        })
    }
}