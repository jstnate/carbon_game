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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=KoHo:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b050931f68.js" crossorigin="anonymous"></script>
    <script src="public/js/main.js" defer></script>
    <title>Ajout utilisateur</title>
</head>

<body class="add_admin">
    <?php require_once 'public/includes/_admin-nav.php'; ?>
    <div class="main_container">
        <h2>Ajouter un utilisateur</h2>
        <div class="sub_container">
            <div class="container_text">
                <h3> Infos utilisateur</h3>
                <p>Veuillez renseigner les infos nécessaire à la création de l’utilisateur</p>
            </div>
            <form class="add_form" method="POST">
                <div class="first">
                    <div class="info_container">
                        <label for="name">Prénom Nom</label>
                        <input type="text" name="name" id="name" placeholder="Jogh DOE">
                    </div>

                    <div class="info_container">
                        <label for="function">Rôle</label>
                        <div class="select">
                            <select class="function_select" name="function" id="function">
                                <option value="interdit">Sélectionnez son rôle...</option>
                                <option value="autorisé">Autorisé</option>
                                <option value="administrateur">Administrateur</option>
                            </select>
                        </div>

                    </div>
                </div>
                <div class="second">
                    <div class="info_container">
                        <label for="email">Adresse email</label>
                        <input type="email" name="email" id="email" placeholder="mail@gmail.com">
                    </div>

                    <div class="info_container">
                        <label for="pass">Mot de passe</label>
                        <input type="password" name="password" id="pass" placeholder="Nouveau mot de passe">
                    </div>
                </div>

                <div class="button_container">
                    <button id="submit" type="submit">Ajouter un utilisateur</button>
                    <a href="dashboard-users.php"><button id="back">Retour</button></a>
                </div>
            </form>
        </div>
    </div>


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
</body>
</html>