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
    <title>Ajouter un partenaire</title>
</head>
<body>

    <?php
    if (isset($_SESSION['function']) && $_SESSION['function'] === 'administrateur' || isset($_SESSION['function']) && $_SESSION['function'] === 'autorisé'){
            $verify = 1;
        } 
        if($verify != 1){
            header('Location:login.php');
        }
    ?>

    <div class="form-AddPartner>
        <form method="POST" enctype="multipart/form-data">
            <label for="partner_name">Nom d'un partenaire</label>
            <input type="text" name="partner_name" id="partner_name" placeholder="Nom d'un partenaire">
            <label for="logo">Logo</label>
            <input type="file" name="logo" accept="image/png, image/jpeg">

            <button type="submit">Ajouter ce partenaire</button>
        </form>
        <a href="dashboard-partners.php">Dashboard des partenaires</a>
    </div>

    <?php
        if ($_POST) {
            $partner = new Partner(
                $_POST['partner_name'],
                $_FILES['logo']['name'],
            );
            $img_name=$_FILES['logo']['name'];
            $tmp_img_name=$_FILES['logo']['tmp_name'];
            $folder = 'image/';
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
    
</body>
</html>