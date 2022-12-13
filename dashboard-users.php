<?php
    session_start();
    require_once 'object/user.php';
    require_once 'object/connection.php';
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tableau de bord - Utilisateurs</title>
</head>
<body>
    <?php
    if (isset($_SESSION['function']) && $_SESSION['function'] === 'administrateur' || isset($_SESSION['function']) && $_SESSION['function'] === 'autorisé') {
            $connection = new Connection();
            $users = $connection->GetUsers();
        ?>
            <div>
                <?php foreach ($users as $user): ?>

                    <div>
                        <h2><?= $user['name'] ?></h2>
                        <h3><?= $user['email']?></h3>
                        <h4><?= date("m/d/Y", strtotime($user['created_at']))?></h4>

                        <?php if (isset($_SESSION['user_id']) && $_SESSION['user_id'] !== $user['id']) { ?>
                            <?php if ($user['function'] === 'admin') { ?>
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                    <input type="submit" name="remove-admin" value="Retirer des admins">
                                    <input type="submit" name="unauthorize" value="Non autoriser">
                                    <input type="submit" name="delete" value="Supprimer">
                                </form>
                            <?php } else if ($user['function'] === 'yes') { ?>
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                    <input type="submit" name="create-admin" value="Ajouter en tant qu'admin">
                                    <input type="submit" name="unauthorize" value="Non autoriser">
                                    <input type="submit" name="delete" value="Supprimer">
                                </form>
                            <?php } else { ?>
                                <form method="POST">
                                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                                    <input type="submit" name="authorize" value="Autoriser">
                                    <input type="submit" name="delete" value="Supprimer">
                                </form>
                            <?php } ?>
                        <?php } ?>
                    </div>

                <?php endforeach; ?>
            </div>
        <?php } else {
            echo "Vous n'êtes pas autorisé à accéder à cette page";
        }

        if (isset($_POST['create-admin'])) {
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