<?php
    session_start();
    require_once 'object/user.php';
    require_once 'object/connection.php';
    require_once 'object/card.php';
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
    <title>Tableau de bord - Modifier la carte</title>
</head>
<body class="modify_card">
    <?php require_once 'public/includes/_admin-nav.php'; ?>
    <?php
        $id = $_GET['id'];
        $connection = new Connection();
        $cards = $connection->GetSingleCard($id);
    ?>

    <div class="main_container">
        <h2 id="title">Modifier une carte</h2>
        <div class="sub_container">
            <div class="container_text">
                <h2>Modifier une carte</h2>
                <h3> Infos de la carte</h3>
                <p>Veuillez modifier les informations que vous souhaitez changer.</p>
            </div>
            <?php    foreach($cards as $card): ?>
            <div class="form_container">
                <form method="POST" enctype="multipart/form-data">
                    <div class="info_container">
                        <div class="info">
                            <?php if(!isset($finalcardname)){
                                $finalcardname = $card['card_name'];
                            }?>
                            <label for="car_name">Nom de la carte </label>
                            <input type="text" name="card_name" value="<?php echo $finalcardname ?>">
                        </div>
                        <div class="info">
                            <?php if(!isset($finalcarbon)){
                                $finalcarbon = $card['carbon'];
                            }?>
                            <label for="carbon">Indice Carbone </label>
                            <input type="number" name="carbon" value="<?php echo $finalcarbon ?>">
                        </div>
                        <div class="info">
                            <?php if(!isset($finaltype)){
                                $finaltype = $card['type'];
                            }?>
                            <label for="type">Catégorie </label>
                            <input type="text" name="type" value="<?php echo $finaltype ?>" >
                        </div>
                    </div>

                    <div class="all_img">
                        <div class="container_card">
                            <img src="temporary/<?php echo $card['image_url'] ?>" alt="padimaj">
                        </div>
                        <div class="add_img">
                            <?php if(!isset($finalimage)){
                                $finalimage = $card['image_url'];
                            }?>
                            <img src="images/icons/add_image.png" alt="">
                            <p>PNG ou JPG inférieur à 5MB</p>
                            <div class="button_container">
                                <input id="file" type="file" accept="image/png, image/jpeg" name="image_url" class="inputfile" data-multiple-caption="{count} files selected" multiple >
                                <label for="file" class="custom-file-upload"><span>Selectionner un fichier&hellip;</span></label>
                            </div>
                        </div>
                    </div>

                    <div class="info">
                        <?php if(!isset($finaldescription)){
                            $finaldescription = $card['description'];
                        }?>
                        <label for="type">Description </label>
                        <textarea type="text" name="description" id="textarea_description" rows=1 COLS=40><?php echo $finaldescription ?></textarea>
                    </div>

                    <input type="hidden" name="card_id" value="<?php echo $id ?>">
                    <div class="button_container">
                        <button id="submit" type="Submit">Modifier la carte</button>
                    </div>
                </form>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

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
            $temporary = 'temporary/';
            move_uploaded_file($tmp_img_name,$temporary.$img_name);
            print_r($card);
            $connection = new Connection();
            $modify = $connection->ModifyCard($card);
            if($modify){
                header('Location: dashboard-cards.php');
            }else{
                echo "C'est pas good man";
            }
        }
    ?>

    <script src="public/js/custom-file-input.js"></script>
</body>
</html>
