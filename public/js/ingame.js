'use strict'
let turn = localStorage.getItem('TurnCount')
let event = localStorage.getItem('EventFrequency')
let currentTurn = 1

let startGame = document.getElementById('game-start')
let showEvent = document.getElementById('event-appear')
startGame.addEventListener('click', (e) => {
    e.preventDefault()
    if (currentTurn <= turn) {
        turnEvent()
        currentTurn += 1
    } else {
        console.log('C fini')
    }
})

function turnEvent() {
    let x = Math.floor(Math.random() * 10/2)
    if(x > event) {
        console.log('Pas devent')
    } else {
        console.log('Un event tous a couvert')
    }
}