<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="public/js/results.js" defer></script>
    <link rel="stylesheet" href="public/css/style.css">
    <title>Résultat de la partie</title>
</head>
<body id="winner-div" class="results">
    <?php require_once 'public/includes/ingame-navbar.php' ?>
    <div class="results__div">
        <div id="congrats" class="results__div__congrats">

        </div>
        <section id="winners" class="results__div__winners">
            <div class="results__div__winners__players">
                <div id="2" class="results__div__winners__players__player results__div__winners__players__second">
                </div>
                <div id="1" class="results__div__winners__players__player results__div__winners__players__first">
                </div>
                <div id="3" class="results__div__winners__players__player results__div__winners__players__third">

                </div>
            </div>
            <div id="others" class="results__div__winners__others">

            </div>
        </section>
    </div>
</body>
</html>