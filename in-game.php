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
    <script src="public/js/ingame.js" defer></script>
    <title>Document</title>
</head>
<body>
    <div id="event-appear">
        <button id="game-start">Démarrer</button>
    </div>

    <div id="game-player">
    </div>

    <div id="cards-input" style="display: none">
    <h1>Cochez les cartes que vous avez en main</h1>
    <form method="POST">
    <?php
        $connection = new Connection();
        $cards = $connection->GetCards();
        foreach ($cards as $card): ?>
                <input type="checkbox" id="choose_cards">
                <label for="choose_cards"> <?php echo $card['card_name']?> <label>
        <?php endforeach; ?>
        <button type="submit">Enregistrer</button>
        </form>
    </div>
</body>
</html>