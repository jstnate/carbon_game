<?php
    session_start();
    require_once 'object/connection.php';
    require_once 'object/user.php';
    require_once 'object/card.php';
    // Sécurité Provisoire //

if (isset($_SESSION['function']) && $_SESSION['function'] === 'administrateur' || isset($_SESSION['function']) && $_SESSION['function'] === 'autorisé') {
    $autorisation = 1;
} else {
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
    <title>Tableu de bord - Ajout d'une Carte</title>
</head>

<body class="add_card">
    <?php require_once 'public/includes/_admin-nav.php'; ?>
    <div class="main_container">
        <h2 id="title">Ajouter une carte</h2>
        <div class="sub_container">
            <div class="container_text">
                <h2>Ajouter une carte</h2>
                <h3> Infos de la carte</h3>
                <p>Veuillez renseigner les infos nécessaire à la création de la carte</p>
            </div>

        <div class="form_container">
            <form method="POST" enctype="multipart/form-data">
                <div class="info_container">
                    <div class="info">
                        <label for="card_name">Nom de la carte </label>
                        <input type="text" name="card_name" placeholder="Ex : voiture thermique">
                    </div>
                    <div class="info">
                        <label for="carbon">Indice Carbone</label>
                        <input type="number" name="carbon" placeholder="Ex : 270g/1km">
                    </div>
                    <div class="info">
                        <label for="type">Catégorie</label>
                        <input type="text" name="type" placeholder="catégorie">
                    </div>
                </div>

                <div class="add-img">
                    <img src="images/icons/add_image.png" alt="">
                    <p>PNG ou JPG inférieur à 5MB</p>
                    <div class="button_container">
                        <input id="file" type="file" accept="image/png, image/jpeg" name="image_url" class="inputfile" data-multiple-caption="{count} files selected" multiple >
                        <label for="file" class="custom-file-upload"><span>Selectionner un fichier&hellip;</span></label>
                    </div>
                </div>
                
                <div class="info">
                    <label for="description">Description</label>
                    <textarea type="text" name="description" id="description" rows=1 COLS=40 placeholder="Ajouter la description de la carte"></textarea>
                </div>
                <div class="button_container">
                    <button id="submit" type="Submit">Ajouter une carte</button>
                </div>
            </form>
        </div>
    <!-- <a href="dashboard-cards.php">Voir les cartes</a> -->
    </div>

    <script src="public/js/custom-file-input.js"></script>
</body>

<?php
    if($_POST){
        $card = new Card(
                $_POST['card_name'],
                $_POST['carbon'],
                $_POST['description'],
                $_FILES['image_url']['name'],
                $_POST['type'],
        );
        $img_name = $_FILES['image_url']['name'];
        $tmp_img_name = $_FILES['image_url']['tmp_name'];
        $temporary = 'images/cards/';
        move_uploaded_file($tmp_img_name,$temporary.$img_name);

        if($card->verifyInput()){
            $connection = new Connection();
            $result = $connection->insertCard($card);
            if($result){
                echo 'Votre carte a été ajoutée';
            }else{
                echo 'Erreur !';
            }
        }
    }   
?>
</html>
