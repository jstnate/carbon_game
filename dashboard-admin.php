<?php
session_start();
if($_SESSION['function'] == 'admin' || $_SESSION['function'] == 'yes'){
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
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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