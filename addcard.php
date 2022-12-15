<?php
    session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tableu de bord - Ajout d'une Carte</title>
</head>
<body>
    <h1>Ajout de la carte</h1>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="card_name" placeholder="Nom de la carte">
        <input type="number" name="carbon_number" placeholder="Indice Carbon">
        <input type="textarea" name="card_description" placeholder="Description">
        <input type="file" accept="image/png, image/jpeg" name="image_url">
        <input type="text" name="type" placeholder="catégorie">
        <button type="Submit">Enregistrer la carte</button>
    </form>

    <a href="dashboard-cards.php">Voir les cartes</a>
</body>

<?php

// Sécurité Provisoire //

if (isset($_SESSION['function']) && $_SESSION['function'] === 'administrateur' || isset($_SESSION['function']) && $_SESSION['function'] === 'autorisé') {
    $autorisation = 1;
}

if($autorisation != 1){
    header('Location: login.php');
}



require_once 'object/connection.php';
require_once 'object/user.php';
require_once 'object/card.php';

        if($_POST){
            $card = new Card(
                    $_POST['card_name'],
                    $_POST['carbon_number'],
                    $_POST['card_description'],
                    $_FILES['image_url']['name'],
                    $_POST['type'],
            );
            $img_name = $_FILES['image_url']['name'];
            $tmp_img_name = $_FILES['image_url']['tmp_name'];
            $temporary = 'images/cards/';
            move_uploaded_file($tmp_img_name,$temporary.$img_name);

            print_r($card);
            if($card->verifyInput()){
                $connection = new Connection();
                $result = $connection->insertCard($card);
                if($result){
                    echo 'Votre carte a été ajoutée';
                }else{
                    echo 'Erreur !';
                }
            }
        }


?>
</html>
