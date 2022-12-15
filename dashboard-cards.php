<?php
    session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tableau de bord - Ressources</title>
</head>
<body>
    <h1>Les Cartes Disponibles</h1>

<?php
    require_once 'object/card.php';
    require_once 'object/connection.php';

    $connection = new Connection();
    $cards = $connection->GetCards();
?>

<?php    foreach($cards as $card): ?>
    <h2><?php echo $card['card_name'];?></h2>
    <h2><?php echo $card['carbon'];?></h2>
    <h2><?php echo $card['description'];?></h2>
    <img src="temporary/<?php echo $card['image_url'] ?>" alt="padimaj">
    <a href="modify-card.php?id=<?php echo $card['id']?>">Modifier La Carte</a>
    <br>
    <a href="delete-card.php?id=<?php echo $card['id']?>">Supprimer La Carte</a>
<?php endforeach; ?>

</body>
</html>
