<?php
require_once 'object/card.php';
require_once 'object/connection.php';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=KoHo:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b050931f68.js" crossorigin="anonymous"></script>
    <script src="public/js/main.js" defer></script>
    <title>Règles du jeu</title>
</head>
<body class="rules">
<?php require_once "public/includes/_client-navbar.php"; ?>
    <div class="first-section">
        <div class="asideR">
            <div class="all-texts">
                <div class="containerR">
                    <div class="title-container">
                        <img src="images/icons/arrow.png" alt="arrow-icon">
                        <h2 class="title">But du jeu</h2>
                    </div>
                    <p class="text">
                        Le but de Carbon est d’avoir l’empreinte carbone la moins importante à la fin du jeu, économisez voscartes à bas coût voire à réduction d’empreinte carbone et essayez de vous débarrasser de vos pirescartes, voire de les passer à vos adversaires.
                    </p>
                    <div class="line">
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="all-texts">
                <div class="containerR">
                    <div class="title-container">
                        <img src="images/icons/wheel.png" alt="wheel-icon">
                        <h2 class="title">Lancement du jeu </h2>
                    </div>
                    <p class="text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sodales orci a ultricies cursus. Morbi ut scelerisque orci. Suspendisse potenti. Nunc gravida sagittis augue in suscipit. Duis lobortis commodo nisi, ac molestie quam luctus at. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In hac habitasse 
                    </p>
                    <div class="line">
                        <span></span>
                    </div>
                </div>
            </div>
            <div class="all-texts">
                <div class="containerR">
                    <div class="title-container">
                        <img src="images/icons/play.png" alt="play-icon">
                        <h2 class="title">Initalisation du jeu</h2>
                    </div>
                    <p class="text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sodales orci a ultricies cursus. Morbi ut scelerisque orci. Suspendisse potenti. Nunc gravida sagittis augue in suscipit. Duis lobortis commodo nisi, ac molestie quam luctus at. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In hac habitasse  Quisque mollis sit amet orci quis gravida. Vestibulum elementum velit felis, vel cursus lectus bibendum non. Fusce et consectetur quam, sit amet feugiat dolor. Pellentesque convallis luctus maximus. Maecenas tellus sem, malesuada a orci vitae, bibendum ultrices enim. Nulla porttitor justo id leo congue aliquam.Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In hac habitasse  Quisque mollis sit amet orci quis gravida. Vestibulum elementum velit felis, vel cursus lectus bibendum non. Fusce et consectetur quam, sit amet feugiat dolor. Pellentesque convallis luctus maximus. Maecenas tellus sem, malesuada a orci vitae, bibendum ultrices enim. Nulla porttitor justo id leo congue aliquam.
                    </p>
                    <div class="line">
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="asideL">
            <div class="img-container">
                <img src="images/icons/cards.png" alt="">
            </div>
            <div class="all-texts">
                <div class="containerR">
                    <div class="title-container">
                        <img src="images/icons/dice.png" alt="dice-icon">
                        <h2 class="title">Déroulé d'un tour</h2>
                    </div>
                    <p class="text">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam sodales orci a ultricies cursus. Morbi ut scelerisque orci. Suspendisse potenti. Nunc gravida sagittis augue in suscipit. Duis lobortis commodo nisi, ac molestie quam luctus at. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; In hac habitasse  Quisque mollis sit amet orci quis gravida. Vestibulum elementum velit felis, vel cursus lectus bibendum non. Fusce et consectetur quam, sit amet feugiat dolor. Pellentesque convallis luctus maximus. Maecenas tellus sem, malesuada a orci vitae, bibendum ultrices enim. Nulla porttitor justo id leo congue aliquam.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="line">
        <span></span>
    </div>
    <div class="second-section">
        <h2 class="title"> Listes des cartes</h2>
        <?php
            $connection = new Connection();
            $cards = $connection->GetCards();
            $categories = $connection->GetCategory();
            ?><div class="mobile">
            <?php foreach ($categories as $category): ?>
                <div class="category-container">
                    <h2 class="category-name"><?php echo $category['type']?></h2>
                    <div class="all-cards">
                        <?php foreach ($cards as $card): ?>
                            <?php if($card['type'] == $category['type']){?>
                                <div class="card-container">
                                    <img src="./images/cards/test-card.png" alt="" >
                                    <h3><?= $card['card_name']?></h3>
                                </div>
                            <?php }?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
            <div class="desktop">
                    <div class="all-cards">
                        <?php foreach ($cards as $card): ?>
                            <div class="card-container">
                                <img src="./images/cards/test-card.png" alt="" >
                                <div class="bottom">
                                    <a href="card.php?id=<?php echo $card['id'] ?>"><button>En savoir plus</button></a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
            </div>
            
    </div>
</body>
</html>