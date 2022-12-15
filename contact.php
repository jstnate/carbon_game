<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/css/style.css">
    <title>Contact</title>
</head>
<body>
    <?php require "public/includes/navbar_contact.php"; ?>
    <main>
        <div class="container_all">
            <div class="container_title">
                <h1 class="title"> Contactez-nous !</h1>
            </div>
            <div class="container_form">
                <form method="POST">
                    <div class="container_input">
                        <div class="container_names">
                            <div class="container_label">
                                <label for="family_name">Nom</label>
                                <input type="text" name="family_name" id="family_name" placeholder="Nom de Famille">
                            </div>
                            <div class="container_label">
                                <label for="name">Prénom</label>
                                <input type="text" name="name" id="name" placeholder="Prénom">
                            </div>
                        </div>
                        <div class="container_label">
                            <label for="email">Adresse e-mail</label>
                            <input type="email" name="email" id="email" placeholder="Adresse e-mail">
                        </div>
                        <div class="container_label">
                            <label for="society">Entreprise/Ecole</label>
                            <input type="text" name="society" id="society" placeholder="Entreprise/Ecole">
                        </div>
                        <div class="container_label">
                            <label for="subject_description">Sujet</label>
                            <input type="text" name="subject" id="subject" placeholder="Sujet">
                            <textarea type="text" name="description" id="description" rows=1 COLS=40 placeholder="Dites-nous tout ?"></textarea>
                        </div>
                    </div>
                    
                    <button type="submit">Contacter</button>

                </form>
            </div>


    <?php

    require_once "object/connection.php";
    require_once "object/message.php";

        if($_POST){
            $message = new Message(
                    $family_name = $_POST['family_name'],
                    $name = $_POST['name'],
                    $email = $_POST['email'],
                    $society = $_POST['society'],
                    $subject = $_POST['subject'],
                    $description = $_POST['description'],
            );
            print_r($message);
            if($message->verifyMessage()){
                $connection = new Connection();
                $result = $connection->insertMessage($message);
                if($result){
                    echo 'Votre message a bien été envoyé !';
                }else{
                    echo 'Erreur du formulaire...';
                }
            }
        }
    ?>
        </div>
    </main>

    <?php require_once 'public/includes/_footer-template.php'; ?>

</body>
</html>