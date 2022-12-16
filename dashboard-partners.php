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
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=KoHo:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b050931f68.js" crossorigin="anonymous"></script>
    <script src="public/js/main.js" defer></script>
    <title>Tableau de bord - Partenaires</title>
</head>

<?php
if (isset($_SESSION['function']) && $_SESSION['function'] === 'administrateur' || isset($_SESSION['function']) && $_SESSION['function'] === 'autorisé') {
    $verify = 1;
    $connection = new Connection();
    $partners=$connection->GetPartners();
}
if($verify != 1){
    header('Location:login.php');
}
?>

<body class="body-db-partners">
<?php require_once 'public/includes/_admin-nav.php';?>

    <div class="partenaires">
        <h1>Partenaires</h1>
        <a class="add-a-partner" href="add-partner.php">Ajouter un partenaire</a>
    </div>
<div class="all-partners">
    <div class="partners-actions">
        <h2>Partenaires</h2>
        <h2 class="desktop-only">Logo</h2>
        <h2 class="desktop-only">Ajouté le</h2>
        <h2>Actions</h2>
    </div>

    <?php
    foreach($partners as $partner) { ?>
    <div class="solo-partner">
        <div class="group-partner">
        <div class="solo-partner-infos">
            <h2> <?= $partner['partner_name']?></h2>
            <img src="images/<?php echo $partner['logo'] ?>" alt="">
            <p> <?= date("d-m-y", strtotime($partner['created_at']))?></p>
        </div>
        <div>
            <form method="POST" action="dashboard-partners.php">
                <input type="hidden" name="delete_partner" value="<?= $partner["id"]; ?>">
                <input type="submit" name="deletePartner" value="Supprimer" class="delete-partners">
            </form>
        </div>
        </div>
    </div>
    <?php } ?>

    <?php
        if(isset($_POST["deletePartner"])){
            $connection->deletePartner($_POST["delete_partner"]);
            header('Location:dashboard-partners.php'); 
        }
    ?>
</div>

</body>
</html>