<?php
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>Modifier votre carte</h1>

<?php
require_once 'object/card.php';
require_once 'object/connection.php';

$id = $_GET['id'];
$connection = new Connection();
$cards = $connection->GetSingleCard($id);
?>

<?php    foreach($cards as $card): ?>
    <form method="POST">

        <?php if(!isset($finalcardname)){
            $finalcardname = $card['card_name'];
        }?>
        <label>Nom de la carte: </label>
        <input type="text" name="card_name" value="<?php echo $finalcardname ?>">

        <?php if(!isset($finalcarbon)){
            $finalcarbon = $card['carbon'];
        }?>
        <label>Carbon: </label>
        <input type="number" name="carbon" value="<?php echo $finalcarbon ?>">

        <?php if(!isset($finaldescription)){
            $finaldescription = $card['description'];
        }?>
        <label>Description: </label>
        <input type="text" name="description" value="<?php echo $finaldescription ?>">

        <input type="hidden" name="card_id" value="<?php echo $id ?>">

        <button type="submit">Modifier</button>




        <img src="temporary/<?php echo $card['image_url'] ?>" alt="padimaj">
    </form>
<?php endforeach; ?>

<?php
        if($_POST){
            $card = new Card(
                $_POST['card_name'],
                $_POST['carbon'],
                $_POST['description'],
                $card['image_url'],
            );
            print_r($card);
            $connection = new Connection();
            $modify = $connection->ModifyCard($card);
            if($modify){
                echo "c'est good man";
            }else{
                echo "C'est pas good man";
            }
        }


?>


</body>
</html>
