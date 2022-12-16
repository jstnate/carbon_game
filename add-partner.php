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
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=KoHo:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b050931f68.js" crossorigin="anonymous"></script>
    <script src="public/js/main.js" defer></script>
    <title>Tableau de bord - Ajout d'un Partenaire</title>
</head>

<body class="add_partner">
    <?php require_once 'public/includes/_admin-nav.php'; ?>
    <div class="main_container">
        <h2 id="title">Ajouter un partenaire</h2>
        <div class="sub_container">
            <div class="container_text">
                <h2>Ajouter un partenaire</h2>
                <h3> Infos du partenaire</h3>
                <p>Veuillez renseigner les infos nécessaire à la création du partenaire</p>
            </div>
        <div class="form_container">
            <form method="POST" enctype="multipart/form-data">
                <div class="info_container">
                    <div class="info">
                        <label for="partner_name">Nom d'un partenaire</label>
                        <input type="text" name="partner_name" id="partner_name" placeholder="Ex : iim">
                    </div>
                    <div class="info">
                        <label for="partner_mail">Adresse mail du partenaire</label>
                        <input type="text" name="partner_mail" id="partner_mail" placeholder="Ex : iim@school.devinci.fr">
                    </div>
                </div>

                <div class="add-img">
                    <img src="images/icons/add_image.png" alt="">
                    <p>PNG ou JPG inférieur à 5MB</p>
                    <div class="button_container">
                        <input id="file" type="file" accept="image/png, image/jpeg" name="logo" class="inputfile" data-multiple-caption="{count} files selected" multiple >
                        <label for="file" class="custom-file-upload"><span>Selectioner un fichier&hellip;</span></label>
                    </div>
                </div>

                <div class="button_container">
                    <button id="submit" type="Submit">Ajouter un partenaire</button>
                </div>
            </form>
        </div>
        <!-- <a href="dashboard-partners.php">Dashboard des partenaires</a> -->
    </div>


    <?php
    if (isset($_SESSION['function']) && $_SESSION['function'] === 'administrateur' || isset($_SESSION['function']) && $_SESSION['function'] === 'autorisé'){
            $verify = 1;
        } 
        if($verify != 1){
            header('Location:login.php');
        }

        if ($_POST) {
            $partner = new Partner(
                $_POST['partner_name'],
                $_POST['partner_mail'],
                $_FILES['logo']['name'],
            );
            $img_name=$_FILES['logo']['name'];
            $tmp_img_name=$_FILES['logo']['tmp_name'];
            $folder = 'images/partners-logos/';
            move_uploaded_file($tmp_img_name,$folder.$img_name);

            if($partner->verifyInput()){
                $connection = new Connection();
                $result = $connection->insertPartner($partner);
                if($result){
                    echo 'Partenaire ajouté';
                }else{
                    echo 'Echec de l/ajout !';
                }
            }
        }
    ?>
    <script src="public/js/custom-file-input.js"></script>
</body>
</html>