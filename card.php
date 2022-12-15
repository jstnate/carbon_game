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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <?php if ($card && $found === true) { ?>
        <title><?= $card[0]['card_name'] ?></title>
    <?php } else { ?>
        <title>Carte inexistante</title>
    <?php } ?>
</head>
<body class="solo-card">
    <?php require_once 'public/includes/navbar_contact.php'; ?>
    <div class="card-img">
    <img src="<?= $card[0]['image_url'] ?>" alt="">
    </div>
    <div class="card-informations">
        <h2><?= $card[0]['card_name']?></h2>
        <h3><?= $card[0]['carbon'] . 'g de Carbone' ?></h3>
    </div>
    <div class="card-description">
        <h2>Description de l'empreinte carbone :</h2>
        <p><?= $card[0]['description']?></p>
    </div>
</body>
</html>