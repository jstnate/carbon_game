<?php
    session_start();


// Sécurité Provisoire //

if (isset($_SESSION['function']) && $_SESSION['function'] === 'administrateur' || isset($_SESSION['function']) && $_SESSION['function'] === 'autorisé') {
    $autorisation = 1;
}

if ($autorisation != 1) {
    header('Location: login.php');
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/style.css">
    <script src="public/js/main.js" defer></script>
    <script src="https://kit.fontawesome.com/b050931f68.js" crossorigin="anonymous"></script>
    <title>Tableau de bord - Ressources</title>
</head>
<body class="dashboard-body">
<?php require 'public/includes/_admin-nav.php'; ?>
    <h1>Gestion des cartes</h1>

<?php
    require_once 'object/card.php';
    require_once 'object/connection.php';
?>


    <div class="second-section2">
        <?php
        $connection = new Connection();
        $cards = $connection->GetCards();
        $categories = $connection->GetCategory();

        foreach ($categories as $category): ?>
            <div class="category-container2">
                <div class="category-class2">
                    <h2 class="category-name2"><?php echo $category['type']?></h2>
                    <div class="plus">
                    <a class="phone-link-to-add" href="addcard.php">+</a>
                    </div>
                </div>
                <div class="all-cards2">
                    <?php foreach ($cards as $card): ?>
                        <?php if($card['type'] == $category['type']){?>
                            <div class="card-container">
                                <img src="./images/cards/test-card.png" alt="" >
                                <h3><?= $card['card_name']?></h3>
                                <div class="edit-icons">
                                <a href="modify-card.php?id=<?php echo $card['id']?>"><img src="images/icons/edit_button.png" alt=""></a>
                                <a href="delete-card.php?id=<?php echo $card['id']?>"><img src="images/icons/trash_button.png" alt=""></a>
                                </div>
                            </div>
                        <?php }?>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>







</body>
</html>
