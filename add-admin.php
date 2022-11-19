<?php
session_start();
require_once 'object/user.php';
require_once 'object/connection.php';
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Ajouter un utilisateur</title>
</head>
<body>
    <div>
        <form method="POST">
            <label for="name">Prénom Nom</label>
            <input type="text" name="name" id="name" placeholder="Jogh DOE">

            <label for="email">Adresse email</label>
            <input type="email" name="email" id="email" placeholder="mail@gmail.com">

            <label for="pass">Mot de passe</label>
            <input type="password" name="password" id="pass" placeholder="Nouveau mot de passe">

            <label for="function">Rôle</label>
            <select name="function" id="function">
                <option value="no">Sélectionnez son rôle...</option>
                <option value="yes">Autorisé</option>
                <option value="admin">Administrateur</option>
            </select>

            <button type="submit">Ajouter un utilisateur</button>
        </form>
    </div>

    <?php
        if ($_POST) {
            $user = new User(
                $_POST['name'],
                $_POST['email'],
                $_POST['password'],
                $_POST['function']
            );

            if ($user->verifyInput() === true) {
                $connection = new Connection();
                $verify = $connection->verifyUser($user);

                if ($verify === false) {
                    $insert = $connection->insertUser($user);

                    if ($insert) { ?>
                        <h2>Création réussie</h2>
                    <?php } else { ?>
                        <h2>Un problème est survenu</h2>
                    <?php }
               } else { ?>
                    <h2>Adresse email déjà utilisée</h2>
                <?php }
            }
        }
    ?>
</body>
</html>