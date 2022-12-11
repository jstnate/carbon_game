'use strict'

let playerCount = localStorage.getItem('PlayerCount')
const objects = []
let others = document.getElementById('others')

window.onload = () => {
    for (let i = 1; i <= playerCount; i++) {
        let player = JSON.parse(localStorage.getItem('Player-' + i))
        objects.push(player)
    }

    objects.sort((a, b) =>
        a.playerScore - b.playerScore
    )

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
        object.appendChild(objectName)
        object.appendChild(objectScore)
        object.appendChild(objectAvatar)
        // console.log(objects[i])
    }

    for (let i = 3; i < objects.length; i++) {
        let objectName = document.createElement('h3')
        objectName.innerHTML = objects[i].playerName
        let objectScore = document.createElement('p')
        objectScore.innerHTML = objects[i].playerScore
        let objectAvatar = document.createElement('img')
        objectAvatar.src = objects[i].playerAvatar
        others.appendChild(objectName)
        others.appendChild(objectScore)
        others.appendChild(objectAvatar)
    }

}
