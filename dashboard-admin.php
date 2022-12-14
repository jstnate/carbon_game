<?php
session_start();
if (isset($_SESSION['function']) && $_SESSION['function'] === 'administrateur' || isset($_SESSION['function']) && $_SESSION['function'] === 'autorisé') {
    $autorisation = 1;
}

if($autorisation != 1){
    header('Location: login.php');
}
?>

<!doctype html>
<html lang="en">
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
    <title>Tableau de bord - Admin</title>
</head>
<body class="dashboard_admin">
    <?php require_once 'public/includes/_admin-nav.php'; ?>
    <h1>Demandes de contacts</h1>

    <?php
    require_once 'object/message.php';
    require_once 'object/connection.php';

    $connection = new Connection();
    $messages = $connection->GetMessages();
    ?>

    <div class="all_messages">
        <?php foreach($messages as $message): ?>
            <div class="main_container">
                <div class="infos_container">
                    <div class="demandeur_society">
                        <div class="demandeur">
                            <h3 class="title">Demandeur</h3>
                            <p class="info"><?php echo $message['name'] . ' ' . $message['family_name'];?></p>
                        </div>
                        <div class="society">
                            <h3 class="title">Entreprise</h3>
                            <p class="info"><?php echo $message['society'];?></p>
                        </div>
                    </div>
                    <div class="contact">
                        <h3 class="title">Contact</h3>
                        <p class="info"><?php echo $message['email'];?></p>
                    </div>
                </div>
                <div class="message_container">
                    <div class="message">
                        <div class="subject">
                            <h3><?php echo $message['subject'];?></h3>
                        </div>
                        <div class="description">
                            <p><?php echo $message['description'];?></p>
                        </div>
                    </div>
                    <div class="button_container">
                        <div class="button"> <a href="mailto:">Répondre</a></div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</body>
</html>