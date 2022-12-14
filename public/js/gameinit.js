'use strict'

let playerList = []
let selectedAvatar = []
let player = document.getElementById('player')
let turn;
let event;
let avatarList = ["images/avatars/avatar1.png","images/avatars/avatar2.png","images/avatars/avatar3.png","images/avatars/avatar4.png", "images/avatars/avatar5.png", "images/avatars/avatar6.png", "images/avatars/avatar7.png", "images/avatars/avatar8.png", "images/avatars/avatar9.png"]
let avatarNumber = 9

let eventName = ['Protocole de Kyoto', 'Tempête Xynthia', 'Ouragan Katrina', 'Méga-feux de brousse australien', 'Gel des récoltes','Sécheresse intense', 'Replantation', 'Dégel du pergilisol', 'Canicule de 2003', 'Tornade', 'Pandémie de COVID-19', 'Hausse du niveau de la mer', 'Économie circulaire', 'Déforestation', 'Agriculture biologique', 'Accord de Paris sur le climat', 'Marée noire','Marée verte'    ]
let eventEffect = ['Tout le monde choisit une carte à défausser  et doit s\'accorder avec les autres joueurs pour s\'assurer que c\'est bien leur carte la plus polluante. La main complète baisse d\'une carte', 'Dès maintenant et jusqu\'à ce que ne soit plus possible, tous les joueurs pioche dans la défausse. Leurs cartes défaussés tant que l\'effet est actif vont dans un tas qui sera mélangé et replacé en haut de la pioche', 'Tous les joueurs piochent une carte et la garde jusqu\'à la fin de la partie, ils ne peuvent ni l\'échanger ni la défausser et sera comptabilisé dans le score final', 'Tous les joueurs pioche une carte, si ils ont une carte de catégorie Alimentation dans leur main, ils doivent la défausser et la remplacer par une autre de la défausse', 'Tous les joueurs se défausse de leur carte la plus à gauche, ainsi que de ses cartes Eau en bouteille et Eau du robinet s\'ils les ont. Ils piochent autant de cartes qu\'il faut pour avoir une main complète.', 'Les joueurs révèlent leur main et passent à leur voisin de droite leur carte la plus haute en C02 après concertation. A la fin du tour, après la phase d\'échange, ils passent leur carte la plus basse en CO2 après concertaton à leur voisin de gauche.', 'La main entière des joueurs est confinée. Les joueurs repiochent une main complète', 'Les cartes des joueurs sont révélés et les autres joueurs choisissent une carte à défausser', 'Les joueurs mélangent leur main et les cartes sont redistribuées', 'Les joueurs choisissent une carte qui est confinée. Elle comptera dans le calcul final', 'Tous les joueurs doivent piocher une carte de plus et leur main complète augmente d\'une carte', 'Chaque joueur choisit une carte à mettre devant lui, elles seront mélangées et redistribuées. Quand les cartes sont récupérées, s\'il s\'agit d\'une carte Biens de consommation, le joueur peut défausser une carte de son choix. Sa main complète est désormais de 3 cartes.', 'Les joueurs piochent une carte dans la défausse et confinent leur carte la plus polluante après concertation', 'Les joueurs peuvent se défausser d\'une de leurs cartes confinées. S\'il n\'en ont pas, ils se défaussent d\'une carte de leur choix', 'Tout le monde pioche 2 cartes puis choisit 2 cartes à défausser et doit s\'accorder avec les autres joueurs pour s\'assurer que c\'est bien leur carte les plus polluante.', 'Pendant ce tour, les cartes ayant un rapport avec le fioul dans les mains des joueurs doivent être confinées. Les joueurs ayant dû retirer des cartes piochent pour avoir une main complète', 'Pendant ce tour, les cartes Alimentation dans les mains des joueurs doivent être confinées. Les joueurs ayant dû retirer des cartes piochent pour avoir une main complète']

let maximum = document.getElementById('maximum')
let playerForm = document.getElementById('player-form')
let setUpForm = document.getElementById('setup-form')
let start = document.getElementById('start')
let playerAppears = document.getElementById('playerAppears')
let z = 0

playerForm.onsubmit = (e) => {
    e.preventDefault()
    playerList.push(player.value)
    let PlayerName = playerList[z]
    let choice = Math.floor(Math.random() * avatarNumber)
    avatarNumber -= 1
    // console.log(choice)
    let playerAvatar = avatarList[choice]
    selectedAvatar.push(playerAvatar)
    avatarList.splice(choice, 1)
    // console.log(avatarList)
    let playerdiv = document.createElement('div')
    playerdiv.classList.add('player-div')
    let playerImg = document.createElement('img')
    playerImg.src = playerAvatar
    let name = document.createElement("h3")
    name.innerHTML = PlayerName
    playerdiv.appendChild(playerImg)
    playerdiv.appendChild(name)
    playerAppears.appendChild(playerdiv)
    z++
    if(avatarNumber == 0){
        playerForm.style.display = "none"
        maximum.style.display = 'block'
    }
}

let quit = document.getElementById('quit-game')

quit.addEventListener("click", () =>{
    localStorage.clear()
})

let setupdiv = document.getElementById('setup-div')

setUpForm.onsubmit = (e) => {
    e.preventDefault()
    setupdiv.innerHTML = ''
    event = document.getElementById('event').value
    turn = document.getElementById('turn').value
    // console.log(turn, event)
    let setup = document.createElement('p')
    let setup2 = document.createElement('p')
    setup.innerHTML = "Nombre de tours: " + turn
    setupdiv.appendChild(setup)
    setup2.innerHTML = "Fréquence d'évènement: " + (event * 2)+ '0%'
    setupdiv.appendChild(setup2)
}

start.addEventListener('click', () => {
    localStorage.clear()
    for (let i = 1; i <= playerList.length; i++) {
        localStorage.setItem('Player-' + i, playerList[i-1])
        localStorage.setItem('Avatar-' + i, selectedAvatar[i-1])
    }
    localStorage.setItem('TurnCount', turn)
    localStorage.setItem('EventFrequency', event)
    localStorage.setItem('PlayerCount', playerList.length)
    localStorage.setItem('CurrentNumber', 1)
})


