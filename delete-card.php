<?php


require_once 'object/connection.php';

$connection = new Connection();

$pet = $connection->DeleteCard($_GET['id']);

header('Location: dashboard-cards.php');

?>



