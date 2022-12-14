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
<body>
    <img src="<?= $card[0]['image_url'] ?>" alt="">
</body>
</html>