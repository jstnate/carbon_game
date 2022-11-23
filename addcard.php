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
    <title>Document</title>
</head>
<body>
    <h1>Ajout de la carte</h1>
    <form method="POST">
        <input type="text" name="card_name" placeholder="Nom de la carte">
        <input type="number" name="carbon_number" placeholder="Indice Carbon">
        <input type="textarea" name="card_description" placeholder="Description">
        <button type="Submit">Enregistrer la carte</button>
    </form>

    <a href="dashboard-cards.php">Voir les cartes</a>
</body>

<?php

// Sécurité Provisoire //

if($_SESSION['function'] == 'admin' || $_SESSION['function'] == 'yes'){
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
            );
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
