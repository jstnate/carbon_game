'use strict'

let playerCount = localStorage.getItem('PlayerCount')
const objects = []
let others = document.getElementById('others')

let quit = document.getElementById('quit-game')

quit.addEventListener("click", () =>{
    localStorage.clear()
})

window.onload = () => {
    for (let i = 1; i <= playerCount; i++) {
        let player = JSON.parse(localStorage.getItem('Player-' + i))
        objects.push(player)
    }

    objects.sort((a, b) =>
        a.playerScore - b.playerScore
    )


    let congrats = document.createElement('h2')
    congrats.innerHTML = objects[0].playerName + " a gagné la partie ! "
    document.getElementById('congrats').appendChild(congrats)
    console.log(congrats)

    showWinners()
    // console.log(objects)
}

function showWinners() {
    for (let i = 0; i < 3; i++) {
        let object = document.getElementById((i + 1))
        let objectName = document.createElement('h2')
        objectName.innerHTML = objects[i].playerName
        let objectScore = document.createElement('p')
        objectScore.innerHTML = objects[i].playerScore
        let objectAvatar = document.createElement('img')
        objectAvatar.src = objects[i].playerAvatar
        let podium = document.createElement('img')
        podium.src = 'images/icons/podium' + (i + 1) + '.png'
        podium.className = 'results__div__winners__players__player__podium' + (i + 1)
        object.appendChild(objectAvatar)
        object.appendChild(objectName)
        object.appendChild(objectScore)
        object.appendChild(podium)
        // console.log(objects[i])
    }

    for (let i = 3; i < objects.length; i++) {
        let objectName = document.createElement('h3')
        objectName.innerHTML = '#' + (i+1) + ' ' + objects[i].playerName
        let objectScore = document.createElement('p')
        objectScore.innerHTML = objects[i].playerScore + ' points'
        let otherdiv = document.createElement('div')
        otherdiv.classList.add('otherplayers')
        otherdiv.appendChild(objectName)
        otherdiv.appendChild(objectScore)
        others.appendChild(otherdiv)
    }

}
