<?php
require_once 'object/card.php';
require_once 'object/connection.php';
?>

<!doctype html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <script src="public/js/endgame.js" defer></script>
        <link rel="stylesheet" href="public/css/style.css">
        <title>Fin du jeu</title>
    </head>
    <body class="endgame">

    <?php require 'public/includes/_ingame-navbar.php'; ?>
        <h1 id="result-title" class="endgame__title">Sélectionnez les cartes que vous avez en main</h1>
        <div class="endgame__player">
        <img src="" alt="" id="current-avatar">
        <h2 id="current-player"></h2>
        </div>
        <div id="action-display" class="endgame__cards">
            <form id="score-count" method="POST" class="endgame__cards__form">
                <?php
                    $connection = new Connection();
                    $cards = $connection->GetCards();
                    $categories = $connection->GetCategory();

                    foreach ($categories as $category): ?>
                        <h2 class="endgame__cards__form__title"><?php echo $category['type']?></h2>
                        <div class="endgame__cards__form__carrousel" id="<?php echo $category['type']?>">
                            <?php foreach ($cards as $card): ?>
                                <?php if($card['type'] == $category['type']){?>
                                    <div class="endgame__cards__form__carrousel__item">
                                        <input type="checkbox" id="<?= $card['id'] ?>" value="<?= $card['carbon'] ?>" >
                                        <label for="<?= $card['id'] ?>">
                                            <img
                                                    src="./images/cards/<?= $card['image_url']?>"
                                                    alt=""
                                            >
                                            <h3><?= $card['card_name']?></h3>
                                        <label>
                                    </div>
                                <?php }?>
                            <?php endforeach; ?>
                        </div>
                    <?php endforeach; ?>
                <div class="endgame__cards__form__button">
                    <button type="submit">Enregistrer</button>
                </div>
            </form>
        </div>
    </body>
</html>