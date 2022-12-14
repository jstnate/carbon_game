<?php
session_start();
require_once 'object/user.php';
require_once 'object/connection.php';

if(isset($_SESSION['function']) && $_SESSION['function'] == 'administrateur'){
    $autorisation = 1;
}

if($autorisation != 1){
    header('Location: login.php');
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/style.css">
    <script src="public/js/main.js" defer></script>
    <title>Ajouter un utilisateur</title>
</head>
<body>
    <?php require_once 'public/includes/_admin-nav.php' ?>
    <div class="add-admin">
        <form class="add-admin__form" method="POST">
            <div class="add-admin__form__input">
                <label for="name">Prénom Nom</label>
                <input type="text" name="name" id="name" placeholder="Jogh DOE">
            </div>

            <div class="add-admin__form__input">
                <label for="email">Adresse email</label>
                <input type="email" name="email" id="email" placeholder="mail@gmail.com">
            </div>

            <div class="add-admin__form__input">
                <label for="pass">Mot de passe</label>
                <input type="password" name="password" id="pass" placeholder="Nouveau mot de passe">
            </div>

            <div class="add-admin__form__input">
                <label for="function">Rôle</label>
                <select name="function" id="function">
                    <option value="interdit">Sélectionnez son rôle...</option>
                    <option value="autorisé">Autorisé</option>
                    <option value="administrateur">Administrateur</option>
                </select>
            </div>

            <button class="add-admin__form__submit" type="submit">Ajouter un utilisateur</button>
        </form>
        
        <?php
            if ($_POST) {
                $user = new User(
                    $_POST['name'],
                    $_POST['email'],
                    $_POST['password'],
                    $_POST['function']
                );

                if ($user->VerifyInput() === true) {
                    $connection = new Connection();
                    $verify = $connection->VerifyUser($user);

                    if ($verify === false) {
                        $insert = $connection->InsertUser($user);

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
    </div>

</body>
</html>