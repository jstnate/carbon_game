'use strict'
let turn = localStorage.getItem('TurnCount')
let event = localStorage.getItem('EventFrequency')
let playerCount = localStorage.getItem('PlayerCount')
let currentTurn = 1

let eventName = ['Protocole de Kyoto', 'Tempête Xynthia', 'Ouragan Katrina', 'Méga-feux de brousse australien', 'Gel des récoltes','Sécheresse intense', 'Replantation', 'Dégel du pergilisol', 'Canicule de 2003', 'Tornade', 'Pandémie de COVID-19', 'Hausse du niveau de la mer', 'Économie circulaire', 'Déforestation', 'Agriculture biologique', 'Accord de Paris sur le climat', 'Marée noire','Marée verte'    ]
let eventEffect = ['Tout le monde choisit une carte à défausser  et doit s\'accorder avec les autres joueurs pour s\'assurer que c\'est bien leur carte la plus polluante. La main complète baisse d\'une carte', 'Dès maintenant et jusqu\'à ce que ne soit plus possible, tous les joueurs pioche dans la défausse. Leurs cartes défaussés tant que l\'effet est actif vont dans un tas qui sera mélangé et replacé en haut de la pioche', 'Tous les joueurs piochent une carte et la garde jusqu\'à la fin de la partie, ils ne peuvent ni l\'échanger ni la défausser et sera comptabilisé dans le score final', 'Tous les joueurs pioche une carte, si ils ont une carte de catégorie Alimentation dans leur main, ils doivent la défausser et la remplacer par une autre de la défausse', 'Tous les joueurs se défausse de leur carte la plus à gauche, ainsi que de ses cartes Eau en bouteille et Eau du robinet s\'ils les ont. Ils piochent autant de cartes qu\'il faut pour avoir une main complète.', 'Les joueurs révèlent leur main et passent à leur voisin de droite leur carte la plus haute en C02 après concertation. A la fin du tour, après la phase d\'échange, ils passent leur carte la plus basse en CO2 après concertaton à leur voisin de gauche.', 'La main entière des joueurs est confinée. Les joueurs repiochent une main complète', 'Les cartes des joueurs sont révélés et les autres joueurs choisissent une carte à défausser', 'Les joueurs mélangent leur main et les cartes sont redistribuées', 'Les joueurs choisissent une carte qui est confinée. Elle comptera dans le calcul final', 'Tous les joueurs doivent piocher une carte de plus et leur main complète augmente d\'une carte', 'Chaque joueur choisit une carte à mettre devant lui, elles seront mélangées et redistribuées. Quand les cartes sont récupérées, s\'il s\'agit d\'une carte Biens de consommation, le joueur peut défausser une carte de son choix. Sa main complète est désormais de 3 cartes.', 'Les joueurs piochent une carte dans la défausse et confinent leur carte la plus polluante après concertation', 'Les joueurs peuvent se défausser d\'une de leurs cartes confinées. S\'il n\'en ont pas, ils se défaussent d\'une carte de leur choix', 'Tout le monde pioche 2 cartes puis choisit 2 cartes à défausser et doit s\'accorder avec les autres joueurs pour s\'assurer que c\'est bien leur carte les plus polluante.', 'Pendant ce tour, les cartes ayant un rapport avec le fioul dans les mains des joueurs doivent être confinées. Les joueurs ayant dû retirer des cartes piochent pour avoir une main complète', 'Pendant ce tour, les cartes Alimentation dans les mains des joueurs doivent être confinées. Les joueurs ayant dû retirer des cartes piochent pour avoir une main complète']


let startGame = document.getElementById('game-start')
let showEvent = document.getElementById('event-appear')
let showPlayers = document.getElementById('game-player')

console.log(playerCount)
window.onload = showPlayer()
function showPlayer() {
    for (let i = 0; i < playerCount; i++) {
        let name = document.createElement('h1')
        name.innerHTML = localStorage.getItem('Player-' + i)
        console.log(name)
        showPlayers.appendChild(name)

    }
}


startGame.addEventListener('click', (e) => {
    e.preventDefault()
    startGame.innerHTML = 'Tour suivant'
    if (currentTurn < turn) {
        turnEvent()
        currentTurn += 1
    } else {
        document.getElementById('event-appear').innerHTML = ""
        let showResult = document.createElement('a')
        showResult.innerHTML = "Voir les résultat"
        showResult.href = "end-game.php"
        document.getElementById('event-appear').appendChild(showResult)
    }
})

let eventTitle = document.createElement('h2')
let eventText = document.createElement('p')

function turnEvent() {
    eventTitle.innerHTML = ''
    eventText.innerHTML = ''
    let x = Math.floor(Math.random() * 10/2)
    if(x > event) {
        eventText.innerHTML = 'Aucun évènement pendant ce tour !'
        console.log("pas d'évent")
    } else {
        let i = Math.floor(Math.random() * 18)
        eventTitle.innerHTML = eventName[i]
        eventText.innerHTML = eventEffect[i]
        showEvent.appendChild(eventTitle)
        showEvent.appendChild(eventText)
        console.log(eventName[i])
        console.log(eventEffect[i])
    }
}