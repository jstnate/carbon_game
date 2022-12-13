<?php
session_start();
if(isset($_SESSION['function']) && $_SESSION['function'] == 'administrateur' || isset($_SESSION['function']) && $_SESSION['function'] == 'autorisé'){
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
    <title>Dashboard-Admin</title>
</head>
<body>
    <?php require_once 'public/includes/_admin-nav.php'; ?>

    <h1>Demandes de contacts</h1>

    <?php
    require_once 'object/message.php';
    require_once 'object/connection.php';

    $connection = new Connection();
    $messages = $connection->GetMessages();
    ?>

    <?php    foreach($messages as $message): ?>
        <h3><?php echo 'Demandeur: ' . $message['name'] . ' ' . $message['family_name'];?></h3>
        <h3><?php echo 'Entreprise: ' . $message['society'];?></h3>
        <h3><?php echo 'Contact: ' . $message['email'];?></h3>
        <h3><?php echo $message['subject'];?></h3> <br>
        <p><?php echo $message['description'];?></p>

    <?php endforeach; ?>
</body>
</html>