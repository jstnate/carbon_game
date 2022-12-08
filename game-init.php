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
    <title>Document</title>
</head>
<body>
    <form id="player-form" action="">
        <label for="player">Créer un joueur</label>
        <input type="text" name="player" id="player">
        <button type="submit">Ajouter un joueur</button>
    </form>

    <form id="setup-form" action="">
        <label for="turn">Nombre de tour</label>
        <input type="text" name="turn" id="turn">

        <label for="event">Fréquence des événements</label>
        <select name="event" id="event">
            <option value="1">1 / 5</option>
            <option value="2">2 / 5</option>
            <option value="3">3 / 5</option>
            <option value="4">4 / 5</option>
            <option value="5">5 / 5</option>
        </select>

<!--        <label for="cards">Choisis tes cartes</label>-->
<!---->
<!--        --><?php
//            $connection = new Connection();
//            $cards = $connection->GetCards();
//
//            foreach ($cards as $card): ?>
<!--                -->
<!--        --><?php //endforeach; ?>

        <button type="submit">Set up le jeu</button>
    </form>

    <a href="in-game.php" id="start">Lancer la partie</a>
</body>
</html>