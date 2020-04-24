<?php
require './backend/database.php';
require './backend/traitement.php';

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/gif" href="./images/favico.png" />
    <link rel="stylesheet" href="./style/style.css">
    <title>Raccourcisseur d'Url</title>
</head>
<body>
    <header>
        <img id="header-logo" src="./images/logo.png" alt="logo">

        <div id="header-first-div">
            <h1>Une url longue ? raccourcissez-là</h1>

            <p>Largement meilleur et plus court que les autres.</p>
        </div>

        <form action="#" method="post">
            <input id="header-url" type="text" name="url" placeholder="Coller un lien à raccourcir...">
            <input id="header-submit" type="submit" value="Raccourcir">
        </form>

        <?php
            if(isset($_GET['error']) && isset($_GET['message'])) { ?>

                <div id="header-error">
                    <p><? echo $_GET['message'] ?></p>    
                </div>

        <?php } ?>

        <div id="header-last-div">
            <p>url raccourcie : http://localhost/q=<?= htmlspecialchars($_GET['short']); ?></p>
        </div>
    </header>

    <main>
        <div>
            <h2>Ces marques nous font confiance</h2>
        </div>

        <div id="main-images">
            <ul>
                <li><img src="./images/1.png" alt="logo"></li>
                <li><img src="./images/2.png" alt="logo"></li>
                <li><img src="./images/3.png" alt="logo"></li>
                <li><img src="./images/4.png" alt="logo"></li>
            </ul>
        </div>
    </main>

    <footer>
        <div>
            <img src="./images/logo2.png" alt="logo_billy">
            <p>2020 &#169; Billy</p>
            <p>Contact - À Propos</p>
        </div>
    </footer>
</body>
</html>