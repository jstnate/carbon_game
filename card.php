<?php 
    require_once "object/connection.php";

    if (isset($_GET['id'])) {
        $connection = new Connection;
        $cardId = $_GET['id'];
        $card = $connection->GetSingleCard($cardId);
        $found = true;
    } else {
        $found = false;
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <?php if ($found === true) { ?>
        <title><?= $card[0]['card_name'] ?></title>
    <?php } else { ?>
        <title>Carte inexistante</title>
    <?php } ?>
</head>
<body class="solo-card">
    <?php require_once 'public/includes/_client-navbar.php'; ?>
    <div class="card-informations">
        <h2><?= $card[0]['card_name']?></h2>
        <h3><?= $card[0]['carbon'] . 'g de Carbone' ?></h3>
    </div>
    <section class="card-section">
        <div class="card-img">
            <img src="./images/cards/<?= $card[0]['image_url'] ?>" alt="">
            <div class="desktop-card-infos">
                <div class="card-infos-v2">
                <h2><?= $card[0]['card_name']?></h2>
                <h3><?= $card[0]['carbon'] . 'g de Carbone' ?></h3>
                <h5>Description de la carte: </h5>
                <p><?= $card[0]['description']?></p>
                </div>
                <div class="how-to-reduce">
                <h4>Comment réduire son empreinte carbone ?</h4>
                <h6>Changer ses habitudes de consommation, réduire sa consommation d'électricité, utilisation des transports, régimes alimentaires et réduction de la production des déchets.
                </h6>
                </div>
            </div>
        </div>
    </section>
    <div class="card-description">
        <h2>Description de l'empreinte carbone :</h2>
        <p><?= $card[0]['description']?></p>
    </div>
</body>
</html>