
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="public/js/ingame.js" defer></script>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com/%22%3E">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=KoHo:wght@400;500;700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body class="ingame-bg">

    <?php require_once 'public/includes/ingame-navbar.php'; ?>
    <div class="game-border" id="game-border">
        <img class="logo" id="gm-logo" src="images/logos/logo.png" alt="LOGO ROND">

        <div class='event-hidden' id="event-appear">

        </div>

        <button id="game-start">Lancer la partie</button>

        <div id="game-player">
        </div>
    </div>
</body>
</html>