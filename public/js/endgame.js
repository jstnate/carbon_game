'use strict'

let form = document.getElementById('score-count')
let values= []
let score = 0

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
    document.querySelectorAll("input[type='checkbox']:checked").forEach(function (item)  {
        let checked = parseInt(item.value);
        console.log(checked)
        values.push(checked);
    });

    score = values.reduce((acc, val) => {
        return acc + val;
    }, 0)

    if (currentNumber === playerCount) {
        text.innerHTML = ''
        currentPlayer.innerHTML = ''
        actionDisplay.innerHTML = ''
        let a = document.createElement('a')
        a.href = '#'
        a.innerHTML = 'Voir le classement'
        actionDisplay.appendChild(a)
    } else {
        currentNumber = parseInt(currentNumber) + 1
        localStorage.setItem('CurrentNumber', currentNumber)
    }
    console.log(score)
};




