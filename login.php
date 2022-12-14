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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=KoHo:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Connectez-vous !</title>
</head>
<body class="login-bg">
    <div class="login">
        <div class="login__title">
            <h1>Bienvenue !</h1>
            <p>Veuillez vous connecter à votre compte</p>
        </div>

        <form class="login__form" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" placeholder="mail@gmail.com">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Entrez votre mot de passe">

            <?php if(isset($_GET['error']) && $_GET['error'] == 1) { ?>
                <div class="errorLog">
                    <h3>Incorrect mail or password !</h3>
                    <p>Please enter an email address and a corresponding password</p>
                </div>
            <?php } ?>
            <button type="submit">Se connecter</button>
        </form>
    </div>

    <?php
    if ($_POST) {
        $user = new User(
            '',
            $_POST['email'],
            $_POST['password'],
            ''
        );

        $connection = new Connection;
        $verify = $connection->LoginVerify($user);

        if ($verify === true) {
            if ($_SESSION['function'] === 'administrateur' || $_SESSION['function'] === 'autorisé') {
                header('Location: dashboard-admin.php');
            } else {
                header('Location: login.php?error=1');
            }
        } else {
            header('Location: login.php?error=1');
        };

    }
    ?>

    <script type="text/javascript" src="public/js/error.js"></script>
</body>
</html>
