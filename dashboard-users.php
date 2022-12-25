<?php
    session_start();
    require_once 'object/user.php';
    require_once 'object/connection.php';
    if (isset($_SESSION['function']) && $_SESSION['function'] === 'administrateur' || isset($_SESSION['function']) && $_SESSION['function'] === 'autorisé') {
            $connection = new Connection();
            $users = $connection->GetUsers();
    } else {
        header('Location:login.php');
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
    <title>Tableau de bord - Utilisateurs</title>
</head>
<body class="dashboard">
    <?php
        require_once 'public/includes/_admin-nav.php';
    ?>

            <div class="dashboard__header">
                <h1 class="dashboard__header__title">Utilisateurs</h1>
                <a href="add-admin.php" class="dashboard__header__button">Ajouter un utilisateur</a>
            </div>

            <div class="dashboard__users">
                <div class="dashboard__users__columns">
                    <h3 class="dashboard__users__columns__tag">Utilisateur</h3>
                    <h3 class="dashboard__users__columns__tag fields-not-in-responsive fields-optional">Date d'ajout</h3>
                    <h3 class="dashboard__users__columns__tag fields-not-in-responsive fields-not-optional">Rôle</h3>
                    <h3 class="dashboard__users__columns__tag">Actions</h3>
                </div>
                <?php foreach ($users as $user): ?>

                    <div class="dashboard__users__user">
                        <div class="dashboard__users__user__fields">
                            <div class="dashboard__users__user__fields__name">
                                <h3><?= $user['name'] ?></h3>
                                <h4><?= $user['email']?></h4>
                            </div>
                            <h3 class="user-optional-field"><?= date("m/d/Y", strtotime($user['created_at']))?></h3>
                            <h3><?= $user['function'] ?></h3>
                        </div>

                        <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] !== $user['id']) { ?>
                            <?php if ($user['function'] === 'administrateur') { ?>
                                <form class="dashboard__users__user__actions" method="POST">
                                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                    <input type="submit" name="remove-admin" value="Retirer cet admin" class="dashboard__users__user_actions__remove-admin">
                                    <input type="submit" name="unauthorize" value="Interdire" class="dashboard__users__user_actions__remove-authorized">
                                    <input type="submit" name="delete" value="Supprimer" class="dashboard__users__user_actions__remove">
                                </form>
                            <?php } else if ($user['function'] === 'autorisé') { ?>
                                <form class="dashboard__users__user__actions" method="POST">
                                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                    <input type="submit" name="create-admin" value="Ajouter un admin" class="dashboard__users__user_actions__add-admin">
                                    <input type="submit" name="unauthorize" value="Interdire" class="dashboard__users__user_actions__remove-authorized">
                                    <input type="submit" name="delete" value="Supprimer" class="dashboard__users__user_actions__remove">
                                </form>
                            <?php } else { ?>
                                <form class="dashboard__users__user__actions" method="POST">
                                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                    <input type="submit" name="authorize" value="Autoriser" class="dashboard__users__user_actions__add-authorized">
                                    <input type="submit" name="delete" value="Supprimer" class="dashboard__users__user_actions__remove">
                                </form>
                            <?php } ?>
                        <?php } ?>
                    </div>

                <?php endforeach; ?>
            </div>
        
        <?php if (isset($_POST['create-admin'])) {
            $connection = new Connection();
            $id = $_POST['id'];
            $connection->CreateAdmin($id);
        } else if (isset($_POST['remove-admin']) || isset($_POST['authorize'])) {
            $connection = new Connection();
            $id = $_POST['id'];
            $connection->Authorize($id);
        } else if (isset($_POST['unauthorize'])) {
            $connection = new Connection();
            $id = $_POST['id'];
            $connection->Unauthorize($id);
        } else if (isset($_POST['delete'])) {
            $connection = new Connection();
            $id = $_POST['id'];
            $connection->DeleteUser($id);
        }
    ?>

</body>
</html>