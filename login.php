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
    <title>Connectez-vous !</title>
</head>
<body>
    <h1>Connectez-vous !</h1>

    <form method="POST">
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

    <?php
    if ($_POST) {
        $user = new User(
            '',
            $_POST['email'],
            $_POST['password'],
            ''
        );

        $connection = new Connection;
        $verify = $connection->loginVerify($user);

        if ($verify === true) {
            if ($_SESSION['function'] === 'admin' || $_SESSION['function'] === 'yes') {
//                header('Location: admin.php');
                echo 'Connecté';
            } else {
//                header('Location: my-account.php');
                echo "Vous n'êtes pas autorisé";
            }
        } else {
            header('Location: login.php?error=1');
        }

    }
    ?>
</body>
</html>
