<!doctype html>
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
<title>Accueil</title>
</head>
<body class="home">
    <?php
        require_once 'public/includes/_client-navbar.php';
    ?>

    <main class="home__main">
        <section class="home__main__header">
            <div class="home__main__header__content">
                <h1 class="home__main__header__content__title">
                    PRENEZ LE CONTRÔLE DE VOTRE EMPREINTE CARBONE
                </h1>
                <p class="home__main__header__content__description">
                    Envie de jouer tout en apprenant ? Carbon est le jeu qu’il te faut ! 
                    L’empreinte carbone, un sujet important de nos jours, alors quoi de mieux que de s’instruire à ce sujet tout en s’amusant ? 
                </p>
                <a href="game-init.php" class="home__main__header__content__cta">
                    Jouer au jeu
                </a>
            </div>
        </section>

        <section class="home__main__goal">
            <h2 class="home__main__goal__title">
                But du projet carbon
            </h2>

            <div class="home__main__goal__carrousel">
                <div class="home__main__goal__carrousel__content">
                    <div class="home__main__goal__carrousel__content__div">
                        <img src="images/icons/icon-card-1.png" alt="Icon de la carte" class="home__main__goal__carrousel__content__div__pic">
                        <h2 class="home__main__goal__carrousel__content__div__title">
                            Dialogue et débat
                        </h2>
                        <p class="home__main__goal__carrousel__content__div__content">
                            Débattre du soucis écologique qui est primordial à l’heure actuel.
                        </p>
                    </div>
                    <div class="home__main__goal__carrousel__content__div">
                        <img src="images/icons/icon-card-2.png" alt="Icon de la carte" class="home__main__goal__carrousel__content__div__pic">
                        <h2 class="home__main__goal__carrousel__content__div__title">
                            Sensibilisation empreinte carbone
                        </h2>
                        <p class="home__main__goal__carrousel__content__div__content">
                            Tout en s’amusant, en apprendre plus sur notre environnement !
                        </p>
                    </div>
                    <div class="home__main__goal__carrousel__content__div">
                        <img src="images/icons/icon-card-3.png" alt="Icon de la carte" class="home__main__goal__carrousel__content__div__pic">
                        <h2 class="home__main__goal__carrousel__content__div__title">
                            Prise de conscience écologique
                        </h2>
                        <p class="home__main__goal__carrousel__content__div__content">
                            Changer ses habitudes du quotidien de façon écologique
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="home__main__learning">
            <h2 class="home__main__learning__title">
                Apprenez a jouer au jeu Carbon !
            </h2>

            <video class="home__main__learning__video" poster controls>
                <source src="images/carbon-video.mp4" type="video/mp4">
                Votre navigateur ne prend pas en charge l'élément video.
            </video>
        </section>
    </main>

    <?php require_once 'public/includes/_footer-template.php'; ?>

</body>
</html>