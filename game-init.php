<?php
    require_once 'object/card.php';
    require_once 'object/connection.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="public/js/gameinit.js" defer></script>
    <link rel="stylesheet" href="public/css/style.css">
    <title>Document</title>
</head>
<body class="game-init-container">
    <?php require_once 'public/includes/ingame-navbar.php'; ?>
<h1>Configuration de la partie</h1>
    <div id="maximum" style="display: none">
        <h1>Nombre maximum de joueur atteint</h1>
    </div>
    <form class="player-form" id="player-form" action="">
        <div class="name-input">
            <label for="player">Nom du joueur</label>
            <input type="text" name="player" id="player">
        </div>
        <button type="submit"><img src="images/icons/checked-white1.png" alt=""></button>
    </form>

    <form id="setup-form" class="setup-form" action="">
        <div class="setup-input">
        <label for="turn">Nombre de tours</label>
        <select name="turn" id="turn">
            <option value="2">2</option>
            <option value="4">4</option>
            <option value="6">6</option>
            <option value="8">8</option>
            <option value="10">10</option>
        </select>
        </div>

        <div class="setup-input">
        <label for="event">Fréquence d'événements</label>
        <select name="event" id="event">
            <option value="1">1 / 5</option>
            <option value="2">2 / 5</option>
            <option value="3">3 / 5</option>
            <option value="4">4 / 5</option>
            <option value="5">5 / 5</option>
        </select>
        </div>



        <button class="responsive-button" type="submit">Set up le jeu</button>
        <button class="phone-button" type="submit"><img src="images/icons/checked-white1.png" alt=""></button>
    </form>

    <div class="setup-show">
        <div id="playerAppears" class="player-appears">
            <h2>Récapitulatif de la configuration</h2>
        </div>
        <div class="setup-div" id="setup-div">

        </div>
    </div>
    <div class="play">
    <a href="in-game.php" id="start" class="start">Jouer</a>
    </div>
</body>
</html>