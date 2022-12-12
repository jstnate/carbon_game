<?php
    session_start();
    require_once 'object/user.php';
    require_once 'object/connection.php';
    require_once 'object/partner.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Dashboard - Partenaires</title>
</head>

<body>
    <?php
        if($_SESSION['function'] == 'admin' || $_SESSION['function'] == 'yes'){
            $verify = 1;
            $connection = new Connection();
            $partners=$connection->GetPartners();
        } 
        if($verify != 1){
            header('Location:login.php');
        }
    ?>

    <a class='btn' href="logout.php">Déconnexion</a>
    <h1>Liste des partenaires</h1>
    <a href="add-partner.php">Ajouter un partenaire</a>

    <?php
    foreach($partners as $partner) { ?>
        <h2> <?= $partner['partner_name']?></h2>
        <img src="images/<?php echo $partner['logo'] ?>" alt="">
        <p> <?= date("d-m-y H:i:s", strtotime($partner['created_at']))?></p>
        <form method="POST" action="dashboard-partners.php">
            <input type="hidden" name="delete_partner" value="<?= $partner["id"]; ?>">
            <input type="submit" name="deletePartner" value="supprimer">
        </form>
    <?php } ?>

    <?php
        if(isset($_POST["deletePartner"])){
            $connection->deletePartner($_POST["delete_partner"]);
            header('Location:dashboard-partners.php'); 
        }
    ?>

</body>
</html>