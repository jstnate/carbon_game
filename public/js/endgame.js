'use strict'

let form = document.getElementById('score-count')
let values= []
let playerScore = 0

let playerCount = localStorage.getItem('PlayerCount')
let currentNumber = localStorage.getItem('CurrentNumber')
let currentPlayer = document.getElementById('current-player')
let text = document.getElementById('result-title')

let actionDisplay = document.getElementById('action-display')

class Player
{
    constructor(name, score) {
        this.playerName = name;
        this.playerScore = score;
    }
}

window.onload = () => {
    currentPlayer.innerHTML = localStorage.getItem('Player-' + currentNumber)
}

form.onsubmit = () => {
    document.querySelectorAll("input[type='checkbox']:checked").forEach(function (item) {
        let checked = parseInt(item.value);
        console.log(checked)
        values.push(checked);
    });

    playerScore = values.reduce((acc, val) => {
        return acc + val;
    }, 0)

    let playerName = localStorage.getItem('Player-' + currentNumber)

    let player = new Player(playerName, playerScore)

    localStorage.setItem('Player-' + currentNumber, JSON.stringify(player))

    if (currentNumber === playerCount) {
        text.innerHTML = ''
        currentPlayer.innerHTML = ''
        actionDisplay.innerHTML = ''
        let a = document.createElement('a')
        a.href = 'results.php'
        a.innerHTML = 'Voir le classement'
        actionDisplay.appendChild(a)
    } else {
        currentNumber = parseInt(currentNumber) + 1
        localStorage.setItem('CurrentNumber', currentNumber)
    }
}

// let test = JSON.parse(localStorage.getItem('Player-' + currentNumber))
// console.log(test['playerName'])



