<?php require "require/menu_template.php"; ?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="family_name" placeholder="Nom de Famille">
        <input type="text" name="name" placeholder="Prénom">
        <input type="email" name="email" placeholder="Adresse e-mail">
        <input type="text" name="society" placeholder="Entreprise/Ecole">
        <input type="text" name="subject" placeholder="Sujet">
        <input type="text" name="description" placeholder="Dites-nous tout ?">
        <button type="submit">Contacter</button>
    </form>

<?php

require_once "object/connection.php";
require_once "object/message.php";

    if($_POST){
        $message = new Message(
                $family_name = $_POST['family_name'],
                $name = $_POST['name'],
                $email = $_POST['email'],
                $society = $_POST['society'],
                $subject = $_POST['subject'],
                $description = $_POST['description'],
        );
        print_r($message);
        if($message->verifyMessage()){
            $connection = new Connection();
            $result = $connection->insertMessage($message);
            if($result){
                echo 'Votre message a bien été envoyé !';
            }else{
                echo 'Erreur du formulaire...';
            }
        }
    }





?>
</body>
</html>