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
        <script src="public/js/endgame.js" defer></script>
        <link rel="stylesheet" href="public/css/style.css">
        <title>Document</title>
    </head>
    <body>
        <h1 id="result-title">Cochez les cartes que vous avez en main</h1>
        <h2 id="current-player"></h2>
        <img src="" alt="" id="current-avatar">
        <div id="action-display">
            <form id="score-count" method="POST">
                <?php
                $connection = new Connection();
                $cards = $connection->GetCards();
                $categories = $connection->GetCategory();

                foreach ($categories as $category): ?>
                    <div class= "caroussel" id="<?php echo $category['type']?>">
                        <h2><?php echo $category['type']?></h2>
                    <?php foreach ($cards as $card): ?>
                        <?php if($card['type'] == $category['type']){?>
                        <div class="caroussel-cards">
                        <input type="checkbox" id="<?= $card['id'] ?>" value="<?= $card['carbon'] ?>" >
                        <label for="<?= $card['id'] ?>">
                            <img
                                    src="https://upload.wikimedia.org/wikipedia/commons/f/f0/Graphite-and-diamond-with-scale.jpg"
                                    alt="" style="width: 100px; aspect-ratio: 4/3"
                            >
                            <h3><?= $card['card_name']?></h3>
                        <label>
                        </div>
                            <?php }?>
                    <?php endforeach; ?>
                    </div>
                <?php endforeach; ?>
                <button type="submit">Enregistrer</button>
            </form>
        </div>
    </body>
</html>